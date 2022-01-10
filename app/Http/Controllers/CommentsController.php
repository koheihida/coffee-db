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
        $memos = Memo::all();
        // $memos = Memo::where('content',$request->keyword)->simplePaginate(13);
        // $memos = Memo::orderBy('created_at', 'desc')->get();

        // $memo_show = Memo::select('memos.*')
        //     ->where('memos.id','=',$id)
        //     ->whereNull('memos.deleted_at')
        //     ->get();

        return view('open', compact('memos'));
    }

    public function show($id)
    {
        $memo_show = Memo::select('id', 'content')
            ->where('memos.id','=',$id)
            ->whereNull('memos.deleted_at')
            ->get();

        return view('comment', compact('memo_show'));
    }

    public function create()
    {
        return view('comment');
    }

    public function store(Request $request)
    {
        Comment::new($request->all());
        return redirect()->route('comment')->with('success', '新規登録完了しました');
        // $comment_model = new Comment();
        //     // $memos = $memo_model -> getMyMemo();
        // return view('comment_model', compact('memo_model'));
    }
}
