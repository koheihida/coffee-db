<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use App\Models\Tag;
use App\Models\MemoTag;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function test()
    {

    }

    public function index()
    {
        $tags = Tag::where('user_id','=',\Auth::id())->whereNull('deleted_at')->orderBy('id','DESC')->get();
        return view('create',compact('tags'));


    }

    public function store(Request $request)
    {
        $posts =$request->all();
        // $image = $request->file('image');
        // if($request->hasFile('image')){
        //     $path = \Storage::put('/public',$image);
        //     $path = explode('/',$path);
        // }else{
        //     $path = null;
        // }
        $request->validate(['content'=> 'required']);
        $request->validate(['tags'=> 'required']);
        DB::transaction(function() use($posts){
            $memo_id=Memo::insertGetId(['content'=>$posts['content'],'user_id' =>\Auth::id() ]);
            // 'image'=>$posts['image']
            $tag_exists = Tag::where('user_id','=',\Auth::id())->where('name','=',$posts['new_tag'])->exists();
            if(!empty($posts['new_tag'] || $posts['new_tag'] === "0") && !$tag_exists){
                $tag_id = Tag::insertGetId(['user_id' => \Auth::id(), 'name'=> $posts['new_tag']]);
                MemoTag::insert(['memo_id' => $memo_id, 'tag_id' => $tag_id]);
            }
            if(!empty($posts['tags'][0])){
                foreach($posts['tags'] as $tag){
                    MemoTag::insert(['memo_id' => $memo_id, 'tag_id' => $tag ]);
                }
            }
        });
        return redirect(route('home'));
    }

    public function edit($id)
    {
        $edit_memo = Memo::select('memos.*','tags.id AS tag_id')
            ->leftJoin('memo_tags','memo_tags.memo_id','=','memos.id')
            ->leftJoin('tags','memo_tags.tag_id','=','tags.id')
            ->where('memos.user_id','=',\Auth::id())
            ->where('memos.id','=',$id)
            // ->where('memos.image')
            ->whereNull('memos.deleted_at')
            ->get();
            // dd(Memo);
            // $image = Memo::where('user_id','=',\Auth::id())->where('image')->get();
            // dd($image);
        $include_tags = [];
        foreach($edit_memo as $memo){
            array_push($include_tags, $memo['tag_id']);
        }
        $tags = Tag::where('user_id','=',\Auth::id())->whereNull('deleted_at')->orderBy('id','DESC')->get();
        return view('edit',compact('edit_memo','include_tags','tags'));
    }

    public function update(Request $request)
    {
        $posts =$request->all();
        $request->validate(['content'=> 'required']);
        $request->validate(['tags'=> 'required']);
        DB::transaction(function () use($posts){
            Memo::where('id',$posts['memo_id'])->update(['content' => $posts['content']]);
            MemoTag::where('memo_id','=',$posts['memo_id'])->delete();
            foreach($posts['tags'] as $tag){
                MemoTag::insert(['memo_id' => $posts['memo_id'], 'tag_id' => $tag]);
            }
            $tag_exists = Tag::where('user_id','=',\Auth::id())->where('name','=',$posts['new_tag'])->exists();
            if(!empty($posts['new_tag'] || $posts['new_tag'] === "0") && !$tag_exists){
                $tag_id = Tag::insertGetId(['user_id' => \Auth::id(), 'name'=> $posts['new_tag']]);
                MemoTag::insert(['memo_id' => $posts['memo_id'], 'tag_id' => $tag_id]);
            }
        });
        Memo::where('id' ,$posts['memo_id'])->update(['content' => $posts['content'],'user_id' => \Auth::id()]);
        return redirect(route('home'));
    }

    public function destroy(Request $request)
    {
        $posts =$request->all();
        Memo::where('id' ,$posts['memo_id'])->update(['deleted_at' => date("Y-m-d H:i:s",time())]);
        return redirect(route('home'));
    }

    public function draw(){
        $draw = rand(1,5);
        if ($draw == 1){
          $result = "大吉";
          $result_img = "daikichi.png";
        } elseif ($draw == 2){
          $result = "中吉";
          $result_img = "chuukichi.png";
        } elseif ($draw == 3){
          $result = "小吉";
          $result_img = "syoukichi.png";
        } elseif ($draw == 4){
          $result = "凶";
          $result_img = "kyou.png";
        } elseif ($draw == 5){
          $result = "大凶";
          $result_img = "daikyou.png";
        }
        // return view('result',['result'=>$result]);
      }

}
