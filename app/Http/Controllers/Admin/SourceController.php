<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SourceRequest;
use App\Models\Source;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class SourceController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $sources = Source::paginate(10);

        return view('admin.sources.index', [
            'sources' => $sources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $source = new Source();

        return view('admin.sources.create', compact('source'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SourceRequest $request
     * @return RedirectResponse
     */
    public function store(SourceRequest $request): RedirectResponse
    {
        $data = $request->input();

        $source = new Source($data);

        $source->save();

        return redirect()
            ->route('sources.edit', [$source->id])
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
        $source = Source::findOrFail($id);

        return view('admin.sources.edit', compact('source'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SourceRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(SourceRequest $request, int $id): RedirectResponse
    {
        $source = Source::find($id);

        if (empty($source)) {
            return back()
                ->withErrors(['msg' => "Источник id=[{$id}] не найден"])
                ->withInput();
        }

        $data = $request->input();

        $result = $source->update($data);

        if ($result) {
            return redirect()
                ->route('sources.edit', $source->id)
                ->with(['success' => 'Успешно сохранено!']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения!'])
                ->withInput();
        }
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        if (Source::destroy($id)) {
            $json = ['success' => 'Успешно удален источник с #ID=' . $id];
        } else {
            $json = ['error' => 'Ошибка удаления'];
        }

        return response()->json($json);
    }
}
