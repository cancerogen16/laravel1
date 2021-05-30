<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends BaseController
{
    public function index()
    {
        return view('common.feedback');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws FileNotFoundException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:55',
            'message' => 'required|max:255',
        ]);

        $data = $request->only(['name', 'message']);

        $this->saveReview($data);

        return redirect()->route('feedback')
            ->with('success', 'Ваше сообщение успешно отправлено.');
    }

    /**
     * @throws FileNotFoundException
     */
    public function saveReview($data)
    {
        $filename = 'reviews.txt';

        $reviews = [];

        if (Storage::disk('local')->exists($filename)) {
            $jsonContent = Storage::get($filename);

            $reviews = json_decode($jsonContent, true);
        }

        $data = array_merge($reviews, [$data]);

        Storage::put($filename, json_encode($data));
    }
}
