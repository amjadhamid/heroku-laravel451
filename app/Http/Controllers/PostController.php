<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// to talk to the controller you must go to App\Post
// and use it ه, in laravel way
use App\Post;
// the normall way
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
        // تمرير البوست كمتغير وتضمينه داخل الصفحةي
        $posts = Post::orderBy('created_at' ,'desc')->get();
        // $posts = DB::select('select * from posts');
        // $posts = Post::orderBy('created_at' ,'desc')->take(1)->get();
        $posts = Post::orderBy('created_at' ,'desc')->paginate(2);

        return view('posts.index')->with('posts' , $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // first validate for seceurity

        $this->validate($request,[
         'subject'=>'required',
         'firstname'=>'required',
         'lastname'=>'required',
         'body'=>'required'
     ]);

        //  then send the inbut as a new object 
        $post = new post ;
        $post->subject = $request->input('subject');
        $post->firstname = $request->input('firstname');
        $post->lastname = $request->input('lastname');
        $post->body  = $request->input('body');
        $post->save();
        //  then come back to the posts page with new massege
     return redirect('/posts')->with('success' , 'Done successfully');
      ;
     
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
        return view('posts.show')->with('post' , $post);
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post' , $post);
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
        $this->validate($request,[
            'subject'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'body'=>'required'
        ]);


  // find is so important because he will update all the posts
  $post =  post::find($id) ;
  $post->subject = $request->input('subject');
  $post->firstname = $request->input('firstname');
  $post->lastname = $request->input('lastname');
  $post->body  = $request->input('body');
  $post->save();
  //  then come back to the posts page with new massege
return redirect('/posts')->with('success' , 'Done successfully');
;    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  post::find($id) ;
        $post->delete();
        $post->save();    
        return redirect('/posts')->with('success' , 'Done successfully');

    }
}
