<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\News;
use App\Models\Category;
use App\Models\Status;
use App\Services\FileUploadService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Str;

class NewsController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $news = News::with('category')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.news.index', [
            'newsList' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::all();

        $statuses = Status::all();

        $news = new News();

        return view('admin.news.create', compact('news', 'categories', 'statuses'));
    }

    /**
     * @param NewsCreateRequest $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(NewsCreateRequest $request, FileUploadService $uploadedService): RedirectResponse
    {
        $fields = $request->validated();

        $fields['slug'] = $this->createSlug($fields['title']);

        $fields['image'] = $uploadedService->upload($request);

        $newsInfo = News::create($fields);

        if ($newsInfo) {
            return redirect()
                ->route('news.edit', [$newsInfo->id])
                ->with(['success' => 'Успешно сохранено!']);
        }

        return back()->withInput();
    }

    public function createSlug($title, $id = 0)
    {
        $slug = Str::slug($title);

        $allSlugs = $this->getRelatedSlugs($slug, $id);

        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        $i = 1;
        $is_contain = true;

        do {
            $newSlug = $slug . '-' . $i;

            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }

            $i++;
        } while ($is_contain);
    }

    protected function getRelatedSlugs($slug, $id = 0)
    {
        return News::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $categories = Category::all();

        $statuses = Status::all();

        $newsInfo = News::findOrFail($id);

        return view('admin.news.edit', compact('newsInfo', 'categories', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsUpdateRequest $request
     * @param int $id
     * @param FileUploadService $uploadedService
     * @return RedirectResponse
     * @throws \Exception
     */
    public function update(NewsUpdateRequest $request, int $id, FileUploadService $uploadedService): RedirectResponse
    {
        $news = News::find($id);

        if (empty($news)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $fields = $request->input();

        if (empty($fields['slug'])) {
            $fields['slug'] = Str::slug($fields['title']);
        }

        $fields['image'] = $uploadedService->upload($request);

        $result = $news->update($fields);

        if ($result) {
            return redirect()
                ->route('news.edit', $news->id)
                ->with(['success' => 'Успешно сохранено!']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения!'])
                ->withInput();
        }
    }

    /**
     * @param News $news
     * @return JsonResponse
     */
    public function destroy(News $news): JsonResponse
    {
        if ($news->delete()) {
            $json = ['success' => 'Успешно удалена запись с #ID=' . $news->id];
        } else {
            $json = ['error' => 'Ошибка удаления'];
        }

        return response()->json($json);
    }
}
