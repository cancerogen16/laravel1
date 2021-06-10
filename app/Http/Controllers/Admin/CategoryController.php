<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class CategoryController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::paginate(5);

        return view('admin.categories.index',[
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $category = new Category();

        return view('admin.categories.create', compact('category'));
    }

    /**
     * @param CategoryCreateRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryCreateRequest $request): RedirectResponse
    {
        $fields = $request->input();

        $fields['slug'] = $this->createSlug($fields['title']);

        $category = Category::create($fields);

        if ($category) {
            return redirect()
                ->route('categories.edit', [$category->id])
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
        return Category::select('slug')->where('slug', 'like', $slug.'%')
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
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CategoryUpdateRequest $request, int $id): RedirectResponse
    {
        $category = Category::find($id);

        if (empty($category)) {
            return back()
                ->withErrors(['msg' => "Категория id=[$id] не найдена"])
                ->withInput();
        }

        $data = $request->input();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $result = $category->update($data);

        if ($result) {
            return redirect()
                ->route('categories.edit', $category->id)
                ->with(['success' => 'Успешно сохранено!']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения!'])
                ->withInput();
        }
    }

    /**
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category): JsonResponse
    {
        if ($category->delete()) {
            $json = ['success' => 'Успешно удалена категория с #ID=' . $category->id];
        } else {
            $json = ['error' => 'Ошибка удаления'];
        }

        return response()->json($json);
    }
}
