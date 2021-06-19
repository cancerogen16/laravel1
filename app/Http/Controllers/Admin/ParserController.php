<?php

namespace App\Http\Controllers\Admin;

use App\Services\ParserService;
use Illuminate\Http\RedirectResponse;

class ParserController extends AdminBaseController
{
    /**
     * @param ParserService $service
     * @return RedirectResponse
     */
    public function parse(ParserService $service): RedirectResponse
    {
        $errors = $service->parseNews();

        if ($errors) {
            return redirect()
                ->route('sources.index')
                ->with(['success' => 'Парсинг закончен. Есть ' . $errors. ' ошибок!']);
        } else {
            return redirect()
                ->route('sources.index')
                ->with(['success' => 'Парсинг успешно закончен!']);
        }
    }
}
