<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use App\Models\Comment;
use DB;
use GuzzleHttp\Psr7\Request as Psr7Request;

class CommentsController extends Controller
{
    public function index()
    {
        $items = Memo::all();
        $comments = Comment::all();

        return view('open', compact('items',));
    }

    public function show($id)
    {
        $items = Memo::all();
        $memo_show = Memo::select('id', 'content')
            ->where('memos.id','=',$id)
            ->whereNull('memos.deleted_at')
            ->get();
        $comments = Comment::where('memo_id', '=', $id)
            ->whereNull('comments.deleted_at')
            ->get();
        // $memo_id = $id;
        return view('comment', compact('memo_show', 'items', 'comments'));
    }

    public function create()
    {
        $memo = Memo::select('id', 'content');

        return view('comment');
    }

    public function store(Request $request)
    {
        $comments = $request->all();
        Comment::insert(['content' => $comments['comment'], 'user_id' => \Auth::id(), 'memo_id' => $comments['memo_id']]);

        // return redirect(route('/open/{memo_id}'));
        return redirect()->back();
    }
}
