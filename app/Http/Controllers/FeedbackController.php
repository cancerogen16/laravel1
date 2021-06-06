<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeedbackController extends BaseController
{
    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('feedback.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:55',
            'message' => 'required|max:255',
        ]);

        $data = $request->only(['name', 'message']);

        $message = new Message($data);

        $message->save();

        return redirect()
            ->route('success')
            ->with(['success' => 'Сообщение успешно отправлено!']);
    }
}
