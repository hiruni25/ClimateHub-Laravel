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
use Illuminate\Support\Facades\Auth;




class EventController extends Controller
{
    private $userType;

    //send data to database
    public function store(Request $request)
    {
        //$sdate=$request->get('sdate');
        $event=Event::create($request->all());
        // $userType=$request->get('partcipantType');
        $this->sendEmail($event);

}

//get email address of the user and send email notification
public function sendEmail($event){
        $email=User::select('email')
        ->pluck('email');
    
        \Mail::to($email)
            ->send(new \App\Mail\eventCreatedMail($event));
    
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
    
    }

    //retrieve all events
    public function getAllEvents()
    {
        $event = event::orderBy('created_at', 'desc')->get()->toJson(JSON_PRETTY_PRINT);
        return response($event, 200);
    } 

   //save vote in eventuser table
    public function saveVote(Request $req){
        $event=$req->get('event_id');
        $email=$req->get('email');
        $participant=Event::select('partcipantType')
            ->where('id','=','$event')
            ->get();
        
        if (EventUser::where('email','=',$email)->exists()) {
            return response()->json(['message'=>'It seems you have already voted or not logged in! '],500);

        }
        elseif ($participant=='REGISTERED USERS') {
            $poll=EventUser::create($req->all());
            return response($poll, 200);
        }
        $poll=EventUser::create($req->all());
            return response($poll, 200);

}

    public function getVoteResult($event_id){
    $no_of_votes = DB::table('event_users')
             ->select(DB::raw('count(*) as no_of_votes, event_id'))
             ->where('event_id', '=', $event_id)
             ->groupBy('event_id')
             ->get();
    return response()->json($no_of_votes,200);
    }


}
