<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Services\CommentService;
use Illuminate\View\View;
use App\Models\Comment;
class CommentController extends Controller
{
    //
    protected $CommentService;
    public function __construct(CommentService $CommentService)
    {
        $this->CommentService = $CommentService;
    }
    public function index(Request $request):View
    {
        $CommentService = Comment::with('product')->get();

        return view('comment.index', compact('CommentService'));
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comment.index')->with('success', 'Bạn đã xóa thành công!');
    }
}
