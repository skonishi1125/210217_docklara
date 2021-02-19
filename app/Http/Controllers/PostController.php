<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
// クエリビルダの使用
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = DB::table('posts')
        ->orderBy('id','desc')
        ->get();
        $members = DB::table('members')
        ->orderBy('id','desc')
        ->get();
        // dd($posts,$members);
        return view('post.index',compact('posts','members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 使っていない
        $posts = DB::table('posts')->get();
        return view('post.create',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DBインスタンス化
        $post = new Post;

        $post->message = $request->input('message');
        $post->user_id = $request->input('user_id');
        $post->reply_post_id = $request->input('reply_post_id');

        $post->save();
        // dd($post);
        return redirect('post/index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
