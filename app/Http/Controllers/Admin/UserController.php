<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class UserController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $user = new User();

        return view('admin.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $data = $request->input();

        $user = new User($data);

        $user->save();

        return redirect()
            ->route('users.edit', [$user->id])
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
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UserRequest $request, int $id): RedirectResponse
    {
        $user = User::find($id);

        if (empty($user)) {
            return back()
                ->withErrors(['msg' => "Пользователь id=[{$id}] не найден"])
                ->withInput();
        }

        $data = $request->input();

        $result = $user->update($data);

        if ($result) {
            return redirect()
                ->route('users.edit', $user->id)
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
        if (User::destroy($id)) {
            $json = ['success' => 'Успешно удален пользователь с #ID=' . $id];
        } else {
            $json = ['error' => 'Ошибка удаления'];
        }

        return response()->json($json);
    }
}
