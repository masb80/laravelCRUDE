<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // for using Post model class
use App\User; // for using User model class
use App\Comments; // for using Comments model class

class CommentsController extends Controller
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
                   $this->middleware('auth');  // index has no authentication but show has
      }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        'cbody' => 'required'
        ]);
        // now post  cbody manually
        $com = new Comments;
        $com->cbody = $request->input('cbody');
        //$com->user_id = auth()->user()->id;
        $com->save();
        return redirect('/posts')->with('success','Comments Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //  $po = Post::find($id); // je id ta return korche ta $po niye show te view kora
    //  return view('posts.show')->with('pe',$po);
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
