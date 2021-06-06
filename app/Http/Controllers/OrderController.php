<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrderController extends BaseController
{
    public function create()
    {
        return view('sources.create');
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

        $newsInfo = new News($data);

        $newsInfo->save();

        if ($newsInfo) {
            return redirect()
                ->route('news.edit', [$newsInfo->id])
                ->with(['success' => 'Успешно сохранено!']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения!'])
                ->withInput();
        }
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
