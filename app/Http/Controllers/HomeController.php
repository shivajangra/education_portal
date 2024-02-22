<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Repositories\UserRepo;
use App\Repositories\EventRepo;
use App\Http\Requests\Event\EventCreate;
use App\Models\Event;

class HomeController extends Controller
{
    protected $user;
    protected $event;
    public function __construct(UserRepo $user, EventRepo $event)
    {
        $this->user = $user;
        $this->event = $event;
    }


    public function index()
    {
       
        return redirect()->route('dashboard');
    }

    public function privacy_policy()
    {
        $data['app_name'] = config('app.name');
        $data['app_url'] = config('app.url');
        $data['contact_phone'] = Qs::getSetting('phone');
        return view('pages.other.privacy_policy', $data);
    }

    public function terms_of_use()
    {
        $data['app_name'] = config('app.name');
        $data['app_url'] = config('app.url');
        $data['contact_phone'] = Qs::getSetting('phone');
        return view('pages.other.terms_of_use', $data);
    }

    public function createEvent(EventCreate $req){
        $ev = [
            'name' => $req->title,
            'time_from' => $req->time_from,
            "time_to" => $req->time_to,
            "created_by" =>  3,
            "color_code" => $req->color
        ];
        $evRecord = $this->event->create($ev);
    
        $events = Event::all();

        $d=[];
        if(Qs::userIsTeamSAT()){
            $d['users'] = $this->user->getAll();
        }
           $d['events'] = $events;
        return view('pages.support_team.dashboard', $d);
    }

    public function dashboard()
    {
        $events = Event::all();

        $d=[];
        if(Qs::userIsTeamSAT()){
            $d['users'] = $this->user->getAll();
        }
           $d['events'] = $events;
        return view('pages.support_team.dashboard', $d);
    }
}
