<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Watcher;
use Auth;
use Session;

class WatchersController extends Controller
{


      public function watch($id)
      {
        Watcher::create([
          'discussion_id' => $id,
          'user_id' => Auth::id()
        ]);

        Session::flash('info','You are watching this discussion');
        return redirect()->back();
      }


      public function stop_watch($id)
      {
        $watch=Watcher::where('discussion_id' , $id)->where('user_id' , Auth::id());
        $watch->delete();
        Session::flash('info','You are unwatching this dicussion');
        return redirect()->back();
      }

}
