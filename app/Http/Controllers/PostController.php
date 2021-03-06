<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //raw sql
        // $posts = DB::select('SELECT * FROM posts ORDER BY id DESC');

        // query builder
        $posts = DB::table('posts')->orderBy('id','DESC')->get();
        // dd($posts);
        return view('post.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // DB::insert('INSERT INTO posts(title,content,created_at,updated_at)VALUES(?,?,?,?)',[
        //     $request->title,
        //     $request->content,
        //     now(),
        //     now()
        // ]);

        //query builder
        DB::table('posts')->insert([
            'title' => $request->title,
            'content'=>$request->content,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $post = DB::select('SELECT * FROM posts WHERE id = ?',[$id]);

        // $post = DB::table('posts')->where('id',$id)->first();
        $post = DB::table('posts')->find($id);
        // dd( $post );
        // return view('post.show',['post' => $post]);
        // return view('post.show')->with(['post' => $post]);
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
        $post = DB::table('posts')->find($id);
        return view('post.edit',compact('post'));
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
        // DB::update('UPDATE posts SET title = ?, content = ?, updated_at = ? WHERE id = ?',[
        //     $request->title,
        //     $request->content,
        //     now(),
        //     $id
        // ]);

        DB::table('posts')->where('id',$id)->update([
            'title'     => $request->title,
            'content'   => $request->content,
            'updated_at'=> now()
        ]);

        return redirect()->back();
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
        // DB::delete('DELETE FROM posts WHERE id = ?' ,[$id]);

        DB::table('posts')->delete($id);

        return redirect()->route('post.index');
    }
    public function test($id,$test){
        return view('post.edit',[
            'tid'=>$id,
            't_test'=>$test
        ]);
    }
}
