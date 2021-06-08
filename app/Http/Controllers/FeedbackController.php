<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
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
     * @param FeedbackRequest $request
     * @return RedirectResponse
     */
    public function store(FeedbackRequest $request): RedirectResponse
    {
        $data = $request->only(['name', 'message']);

        $message = new Message($data);

        $message->save();

        return redirect()
            ->route('success')
            ->with(['success' => 'Сообщение успешно отправлено!']);
    }
}
