<?php

namespace App\Http\Controllers\Admin;

use App\Models\Source;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'url' => 'required',
        ]);

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
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'url' => 'required',
        ]);

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
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Source::destroy($id);

        return redirect()
            ->route('sources.index')
            ->with(['success' => 'Успешно удалено!']);
    }
}
