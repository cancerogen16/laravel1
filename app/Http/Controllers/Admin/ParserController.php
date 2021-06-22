<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\NewsJob;
use App\Models\Source;
use App\Services\ParserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;

class ParserController extends AdminBaseController
{
    public function index(ParserService $service)
    {
        $start = date('c');

        $sources = $this->getSources();

        foreach ($sources as $source) {
            NewsJob::dispatch($source->url);
        }

        echo $start . ' ' . date('c');
    }

    /**
     * @param ParserService $service
     * @return RedirectResponse
     */
    public function parsing(ParserService $service): RedirectResponse
    {
        $errors = 0;

        $sources = $this->getSources();

        foreach ($sources as $source) {
            $errors += $service->parseChannel($source->url);
        }

        if ($errors) {
            $message = 'Парсинг закончен. Есть ' . $errors. ' ошибок!';
        } else {
            $message = 'Парсинг успешно закончен!';
        }

        return redirect()
            ->route('sources.index')
            ->with(['success' => $message]);
    }

    /**
     * @return Source[]|Collection
     */
    public function getSources()
    {
        return Source::all();
    }
}
