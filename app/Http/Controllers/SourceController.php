<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SourceController extends BaseController
{
    public function input()
    {
        return view('sources.input');
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
            'phone' => 'required|max:20',
            'email' => 'required|email:rfc,dns',
            'info' => 'required|max:255',
        ]);

        $data = $request->only(['name', 'phone', 'email', 'info']);

        $this->saveSource($data);

        return redirect()->route('sources.input')
            ->with('success', 'Ваше сообщение успешно отправлено.');
    }

    /**
     * @throws FileNotFoundException
     */
    public function saveSource($data)
    {
        $filename = 'orders.txt';

        $orders = [];

        if (Storage::disk('local')->exists($filename)) {
            $jsonContent = Storage::get($filename);

            $orders = json_decode($jsonContent, true);
        }

        $data = array_merge($orders, [$data]);

        Storage::put($filename, json_encode($data));
    }
}
