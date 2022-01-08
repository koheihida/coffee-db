<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use App\Models\Comment;
use DB;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // $memos = Memo::all();
        $memos = Memo::where('content',$request->keyword)->simplePaginate(13);
        // $memos = Memo::orderBy('created_at', 'desc')->get();

        return view('open', compact('memos'));
    }

    public function show(Request $request, $id)
    {
        $memo = Memo::findOrFail($id);

        return view('open', compact('memo'));
    }
}
