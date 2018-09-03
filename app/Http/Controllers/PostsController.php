<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // for deleting from storage image noimage.jpg
use App\Post; // for using Post model

// for using the database DB library
//use DB;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
      * Create a new controller instance.
      *
      * @return void
      */
     public function __construct()  // this function added for access control or authentication
     {
              //  $this->middleware('auth',['except'=> ['index', 'show']]); // giving excepton only to index and show
                  $this->middleware('auth',['except'=> ['show']]);  // index has no authentication but show has
     }
    public function index()
    {
      //$pe = Post::all(); // return all from model by Eloquent
        //$pe = Post::orderBy('title','desc')->get(); // return title from in descending order by Eloquent
        $pe = Post::orderBy('created_at','asc')->paginate(10); // for pagination
        //$pe = DB::select('SELECT * FROM posts'); // using the DB database mysql way
        return view('posts.index')->with('po',$pe ); // sending $post variable as po
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
      $this->validate($request,[
        'title' => 'required',
        'body' => 'required',
        'cover_image' => 'image|nullable|max:1999',
        ]);
      // upload file handeler
      if($request->hasFile('cover_image')){
          $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
          $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          $extension = $request->file('cover_image')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$extension;
          $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

      }
      else {
        $fileNameToStore = 'noimage.jpg';
      }
      // now post title and body manually
      $post = new Post;
      $post->title = $request->input('title');
      $post->body = $request->input('body');
      $post->cbody = $request->input('cbody');
      $post->user_id = auth()->user()->id;
      $post->cover_image = $fileNameToStore;
      $post->save();
      return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $po = Post::find($id); // je id ta return korche ta $po niye show te view kora
        return view('posts.show')->with('pe',$po);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $po = Post::find($id); // je id ta return korche ta $po niye show te view kora
      // check post correct user
      // $post->user_id = auth()->user()->id;
      if(auth()->user()->id !== $po->user_id) // manullay stop editing uding /posts/edit
      {
        return redirect('/posts')->with('error', 'Unauthorized Page');
      }

      return view('posts.edit')->with('pe', $po);
    }
    public function cedit($id)
    {
      $po = Post::find($id); // je id ta return korche ta $po niye show te view kora
      // check post correct user
      // $post->user_id = auth()->user()->id;
      if(auth()->user()->id !== $po->user_id) // manulay stop editing uding /posts/edit
      {
        return redirect('/posts')->with('error', 'Unauthorized Page');
      }

      return view('posts.cedit')->with('pe', $po);
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
        'title' => 'required',
        'body' => 'required'

      ]);
      // upload file handeler or replace images
      if($request->hasFile('cover_image')){
          $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
          $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          $extension = $request->file('cover_image')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$extension;
          $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

      }
      $post = Post::find($id);
      $post->title = $request->input('title');
      $post->body = $request->input('body');
      $post->cbody = $request->input('cbody');
      if($request->hasFile('cover_image')){ // replace image
        $post->cover_image = $fileNameToStore;
      }
      $post->save();
      return redirect('/posts')->with('success','Post Updated' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      if(auth()->user()->id !== $post->user_id) // manullay stop editing uding /posts/edit
      {
        return redirect('/posts')->with('error', 'Unauthorized Page');
      }
      if($post->cover_image != 'noimage.jpg'){
        Storage::delete('public/cover_images/.$post->cover_image');
      }
      $post->delete();
      return redirect('/posts')->with('success','Post Deleted');

    }
}
