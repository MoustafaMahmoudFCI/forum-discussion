<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Channel;
use Session;

class ChannelsController extends Controller
{


  public function __construct()
  {
    $this->middleware('admin');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.channels.index')->with('channels',Channel::all());
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
      $this->validate($request ,[
        'title'=>'required'
      ]);
      Channel::create([
        'title'=>$request->title,
        'slug'=>str_sulg($request->title)
      ]);
      Session::flash('success','Channel created successfully');
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($channels)
    {
        $channel=Channel::where('slug',$channels)->first();
        return view('admin.channels.channel')->with('discussion',$channel->discussions()->paginate(5));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admin.channels.edit')->with('channel', Channel::find($id));
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
        $this->validate($request , [
          'title'=>'required'
        ]);
        $channel=Channel::find($id);
        $channel->title=$request->title;
        $channel->save();
        Session::flash('success','Channel updated successfully');
        return redirect()->route('channels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$channel=Channel::find($id);
        //$channel->delete();
        Channel::destroy($id);
        Session::flash('success','Channel deleted successfully');
        return redirect()->back();
    }
}
