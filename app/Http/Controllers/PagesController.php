<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
      $title = 'Well come to my laravelAPP';
    //  return view('pages.index', compact('title'));
      return view('pages.index')->with('title',$title);
    }
    public function about()
    {
        $title = 'Well come to my laravelAPP from About';
      //return view('pages.about', compact('title'));
      return view('pages.about')->with('title', $title);
    }
    public function service()
    {
    //  $title = 'Well come to my laravelAPP from Service';
      //return view('pages.service', compact('title'));
      $data = array(
        'title' => 'Well come to my laravelAPP from Service',
        'Myservices' => ['Full stack Web Development', 'Coding', 'Real time data analysis']
        );
      return view('pages.service')->with($data);
    }
}
