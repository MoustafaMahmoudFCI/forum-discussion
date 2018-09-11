<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Discussion;
use App\Reply;
use Auth;
use Session;

class DiscussionController extends Controller
{
    public function index()
    {
       return view('admin.discussions.discussion');
    }

    public function store(Request $request)
    {
       $this->validate($request, [
         'title'=>'required',
         'question'=>'required',
         'channel_id'=>'required'
       ]);

       $discussion = Discussion::create([
         'user_id'=>Auth::id(),
         'channel_id'=>$request->channel_id,
         'title'=>$request->title,
         'content'=>$request->question,
         'slug'=>str_slug($request->title)
       ]);

       Session::flash('success','Discussion created successfully');
       return redirect()->route('discussion.show',['slug'=>$discussion->slug]);
    }

    public function show($slug)
    {
      $discussion = Discussion::where('slug',$slug)->first();
      $best_answer= $discussion->replies->where('best_answer',1)->first();

      return view('admin.discussions.show')->with('d', $discussion)
                                           ->with('best_answer', $best_answer);
    }

    public function reply(Request $request , $id)
    {
      $d=Discussion::find($id);

      $this->validate($request,[
          'reply'=>'required'
      ]);

      $reply = Reply::create([
        'discussion_id'=>$id,
        'user_id'=>Auth::id(),
        'content'=>$request->reply
      ]);

      $reply->user->points +=25;
      $reply->user->save();

      Session::flash('success','Replied to dicussion successfully');
      return redirect()->back();
    }

    public function best_answer($id)
    {
       $reply = Reply::find($id);
       $reply->best_answer=1;
       $reply->save();
       $reply->user->points +=100;
       $reply->user->save();
       Session::flash('success','Marked as the best answer');
       return redirect()->back();
    }


    public function edit($id)
    {

      return view('admin.discussions.edit')->with('d', Discussion::find($id));
    }

    public function update(Request $request , $id)
    {
      $d = Discussion::find($id);
      $this->validate($request, [
        'title'=>'required',
        'question'=>'required',
      ]);
      $d->title=$request->title;
      $d->content=$request->question;
      $d->slug=str_slug($request->title);
      $d->save();
      Session::flash('success','Discussion updated successfully');
      return redirect()->back();
    }

}
