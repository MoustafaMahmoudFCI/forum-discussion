<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Discussion;
use Auth;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{

    public function index()
    {

      switch (request('filter')) {
        case 'me':
          $results=Discussion::where('user_id',Auth::id())->paginate(3);
          break;

        case 'solved':
          $answered=array();
          foreach (Discussion::all() as $d) {
            if($d->isHasBestAnswer())
            {
              array_push($answered, $d);
            }
          }
          $results=new Paginator($answered,3);
          break;

        case 'unsolved':
            $un_solved=array();
            foreach (Discussion::all() as $d) {
              if(!$d->isHasBestAnswer())
              {
                array_push($un_solved, $d);
              }
            }
            $results=new Paginator($un_solved,3);
          break;

        default:
          $results=Discussion::orderBy('created_at' , 'desc')->paginate(3);
          break;
      }

       return view('forums',['discussion'=> $results]);
    }


}
