<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;
use App\EventUser;
use Illuminate\support\Facades\Mail;
use App\mail\notifyUser;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class EventController extends Controller
{
    private $userType;

    //send data to database

    public function store(Request $request)
    {
        $sdate=$request->get('sdate');
        $event=Event::create($request->all());
    }

    public function dateCheck(){
        $isExist= Event::select("*")
                ->where("sdate",$sdate)
                ->doesntExist();

        if($isExist){
            return response('isexist');
        }
        else{
            return response('else');
        }
        return response()->json(['message'=>
        "Event created successfully"]);
    }

    //get data by id
    public function getEventById($id)
    {
       $event=event::find($id);
       if(is_null($event)){
        return response()->json(['message'=>'Event Not Found'],404); 
    }
        return response()->json($event::find($id),200);
    }
    
    //save updated data to database
    public function updateEvent(Request $request,$id)
    {   
        $event=event::find($id);
        if(is_null($event)){
            return response()->json(['message'=>'Event Not Found'],404); 
        }
        $event->update($request->all());
        return response()->json(['message'=>
        "Event updated successfully"]);
        //return response ($event,200);
        
    }

    //delete event
    public function deleteEvent(Request $request,$id)
    {
        $event = Event::find($id);
        if(is_null($event)){
            return response()->json(['message'=>'Event Not Found'],404);
        }
        $event->delete();
        return response()->json(['message'=>
        "Event deleted successfully"]);
        //return response()->json(null,204);
        //echo "successfully deleted.";
        //return redirect()->to('/viewEvent');

        //return back;
    }

    public function getAllEvents()
    {
        $event = event::get()->toJson(JSON_PRETTY_PRINT);
        return response($event, 200);
    }

    /*public function getUserEmail(Request $req){
        $userType=$req.u_type;
        dd($userType);
    }*/

    public function mail()
    {
        
        Mail::to('dilki@gmail.com')->send(new notifyUser());
        return response()->json(['message'=>
        "Email sent successfully"]);
    }
    
    public function getPollEvents(){
        $poll=DB::table('events')
                ->where('isPoll','=','1')
                ->get()->toJson(JSON_PRETTY_PRINT);
        return response($poll,200);
    }    

    public function getAllPoll()
    {
        $poll = EventUser::get()->toJson(JSON_PRETTY_PRINT);
        return response($poll, 200);
    }
}
