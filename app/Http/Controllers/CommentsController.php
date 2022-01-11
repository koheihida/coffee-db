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

        $item = Memo::all();
        // $memos = Memo::all();

        // dd($memos);
        // $memos = Memo::where('content',$request->keyword)->simplePaginate(13);
        // $memos = Memo::orderBy('created_at', 'desc')->get();

        // $memo_show = Memo::select('memos.*')
        //     ->where('memos.id','=',$id)
        //     ->whereNull('memos.deleted_at')
        //     ->get();

        return view('open', compact('item'));
    }

    public function show($id)
    {
        $item = Memo::all();
        $memo_show = Memo::select('id', 'content')
            ->where('memos.id','=',$id)
            ->whereNull('memos.deleted_at')
            ->get();

        $memo_id = $id;
        return view('comment', compact('memo_show', 'item', 'memo_id'));
    }

    public function create()
    {
        $memo = Memo::select('id', 'content');

        return view('comment');
    }

    public function store(Request $request)
    {
        // $memo_show = Memo::select('id', 'content')
        // ->where('memos.id','=',$id)
        // ->whereNull('memos.deleted_at')
        // ->get();
        // dd($memo_show);
        // $memo_show = Memo::select('id', 'content');
        // dd($memo_show);
            // ->where('memos.id','=',$id)
            // ->whereNull('memos.deleted_at')
            // ->get();

        $comments = $request->all();

        // ->where('memos.id','=',$id)
        // ->get();


        Comment::insert(['content' => $comments['comment'], 'user_id' => \Auth::id(), 'memo_id' => $comments['memo_id']]);


        // return view('comment', compact('comments'));
        // return redirect()->route('comment')->with('success', '新規登録完了しました');
        // $comment_model = new Comment();
        //     // $memos = $memo_model -> getMyMemo();
        // return view('comment_model', compact('memo_model'));
    }
}
