<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

use App\Day;

class EventController extends Controller
{
    function index(){
        $events=Event::all();
        $days=Day::all();
        return response([
            'events'=>$events,
            'days'=>$days
        ]);
    }
    function test(Request $request){
        Event::create([
            'event_content'=>'content',
            'day_id'=>3,
            'user_id'=>1
        ]);
    }
    function store(Request $request){
        // $this->validate($request, [
        //     'event_content' => 'required|min:5',
        //     'day_id' => 'required',
        // ]);
        Event::create([
            'event_content'=>$request->input('event_content'),
            'day_id'=>$request->input('day_id'),
            'user_id'=>1
        ]);
        return response([
                'event_content' => $request->input('event_content'),
                'day_id' => $request->input('day_id'),
                'user_id'=>1
             ]);
    }
}
