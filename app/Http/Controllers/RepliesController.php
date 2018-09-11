<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;
use App\Like;
use App\Reply;

class RepliesController extends Controller
{

    public function like($id)
    {
       Like::create([
         'reply_id'=>$id,
         'user_id'=>Auth::id()
       ]);

       Session::flash('info','Liked successfully');
       return redirect()->back();
    }


    public function unlike($id)
    {
       $like = Like::where('reply_id',$id)->where('user_id', Auth::id())->first();
       $like->delete();
       Session::flash('success','Reply Unliked successfully');
       return redirect()->back();
    }


}
