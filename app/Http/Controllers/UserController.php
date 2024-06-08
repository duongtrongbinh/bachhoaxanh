<?php

namespace App\Http\Controllers;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
class UserController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * UserController constructor.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request): View
    {
        $user = $this->userService->getPaginate($request->all());

        return view('user.index', compact('user'));
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $user = $this->userService->create($request->all());
        return redirect()->route('user.index')->with('thongbao', 'Bạn đã thêm thành công!');
    }
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $this->userService->update($user->id,$request->all());
        return redirect()->route('user.index');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Bạn đã xóa thành công!');
    }
}
