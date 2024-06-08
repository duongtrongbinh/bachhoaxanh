<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PostService;
use App\Models\Post;
use Illuminate\View\View;
class PostController extends Controller
{
    protected $PostService;
    public function __construct(PostService $PostService)
    {
        $this->PostService = $PostService;
    }
    public function index(Request $request)
    {
        $PostService = $this->PostService->getPaginate($request->all());
        return view('post.index', compact('PostService'));
    }
    public function create()
    {
        return view('post.create');
    }
    public function store(Request $request)
    {
        $post = $this->PostService->create($request->all());
        return redirect()->route('post.index')->with('thongbao', 'Bạn đã thêm thành công!');
    }
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }
    public function update(Request $request, Post $post)
    {
        $this->PostService->update($post->id,$request->all());
        return redirect()->route('post.index');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Bạn đã xóa thành công!');
    }
}
