<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use App\Models\Comment;
use DB;

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
        $memo_show = Memo::select('id','content')
            ->where('memos.id','=',$id)
            ->whereNull('memos.deleted_at')
            ->get();

        return view('open', compact('memo_show'));
    }
}
