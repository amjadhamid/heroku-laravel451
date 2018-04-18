<?php
use Illuminate\Validation\Rule;

namespace App\Http\Controllers;


use Illuminate\Http\Request;
// to talk to the controller you must go to App\Post
// and use it ه, in laravel way
use App\Post;
// the normall way
use DB;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
//    من اجل الا يدخل الشخص الى تعديل المحتوى ويمكنهم الدخول الى البوستات
   public function __construct()
   {
       $this->middleware('auth',['except'=>['index', 'show']]);
   }

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
        //
        $this->validate($request ,[
         'subject'=>'required',
         'firstname'=>'required',
         'lastname'=>'required',
         'body'=>'required',
         'post_image'=>'image|nullable|max:1024',
        ]);


        if($request->hasFile('post_image')){  

    $filenameWithExtention = $request->file('post_image')->getClientOriginalName();
    $fileName = pathinfo($filenameWithExtention,PATHINFO_FILENAME);
    $extension = $request->file('post_image')->getClientOriginalExtension();
    $fileNameStore = $fileName .'_'.time().'.'.$extension;

    $path = $request->file('post_image')->move(base_path() . '/public/images/', $fileNameStore);
  
 
            
        }else{
                $fileNameStore = 'no_image.jfif';
              }
 
// if($request->hasFile('post_image')){
//     $filenameWithExtention = $request->file('post_image')->getClientOriginalName();
//     $fileName = pathinfo($filenameWithExtention,PATHINFO_FILENAME);
//     $extension = $request->file('post_image')->getClientOriginalExtension();
//     $fileNameStore = $fileName .'_'.time().'.'.$extension;
//     $path = $request->file('post_image')->storeAs('public/post_image',$fileNameStore);
// }else{
//     $fileNameStore = 'noImage.jpg';
// }





 
$post = new Post;
$post->subject   = $request->input('subject');
$post->firstname = $request->input('firstname');
$post->lastname  = $request->input('lastname');
$post->body      = $request->input('body');
$post->user_id      =  auth()->user()->id;
$post->post_image      =  $fileNameStore;
$post->save();

        return redirect('/posts')->with('success', 'Done successfully');
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
//     التعريف بالاول
        $post = Post::find($id);

        // for security
        if(auth()->user()->id !== $post->user_id)
        return view('posts')->with('error' , 'Unauthorized');

        
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

        if($request->hasFile('post_image')){  

            $filenameWithExtention = $request->file('post_image')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExtention,PATHINFO_FILENAME);
            $extension = $request->file('post_image')->getClientOriginalExtension();
            $fileNameStore = $fileName .'_'.time().'.'.$extension;
        
            $path = $request->file('post_image')->move(base_path() . '/public/images/', $fileNameStore);
          
         
                    
                }
         
  // find is so important because he will update all the posts
  $post =  post::find($id) ;
  $post->subject = $request->input('subject');
  $post->firstname = $request->input('firstname');
  $post->lastname = $request->input('lastname');
  if($request->hasFile('post_image')){
    $post->post_image = $fileNameStore;
  }
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
//security
        if(auth()->user()->id !== $post->user_id)
        return view('posts')->with('error' , 'Unauthorized');
      if($post->post_image != 'mo_image.jpg'){
          Storage::delete('public/post_image/' . $post->post_image);
      }

        $post->delete();
        $post->save();    
        return redirect('/posts')->with('success' , 'Done successfully');

    }
}
