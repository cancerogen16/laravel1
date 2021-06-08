<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FeedbackRequest;
use App\Models\Message;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class FeedbackController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $messages = Message::paginate(10);

        return view('admin.feedback.index', [
            'messages' => $messages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $message = new Message();

        return view('admin.feedback.create', compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FeedbackRequest $request
     * @return RedirectResponse
     */
    public function store(FeedbackRequest $request): RedirectResponse
    {
        $data = $request->input();

        $message = new Message($data);

        $message->save();

        return redirect()
            ->route('feedback.edit', [$message->id])
            ->with(['success' => 'Успешно сохранено!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $message = Message::findOrFail($id);

        return view('admin.feedback.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FeedbackRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(FeedbackRequest $request, int $id): RedirectResponse
    {
        $message = Message::find($id);

        if (empty($message)) {
            return back()
                ->withErrors(['msg' => "Сообщение id=[{$id}] не найдено"])
                ->withInput();
        }

        $data = $request->input();

        $result = $message->update($data);

        if ($result) {
            return redirect()
                ->route('feedback.edit', $message->id)
                ->with(['success' => 'Успешно сохранено!']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения!'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Message::destroy($id);

        return redirect()
            ->route('feedback.index')
            ->with(['success' => 'Успешно удалено!']);
    }
}
