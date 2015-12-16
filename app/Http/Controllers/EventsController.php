<?php namespace App\Http\Controllers;

use App\Sport;
use Illuminate\Http\Request;

class EventsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function post(Request $request)
    {
        $title = $request->input("title");
        $type = $request->input("special");
        $content = htmlentities($request->input("content"));
        $date = strtotime($request->input("date"));

        Sport::create(['uid'=>"1", 'title'=>$title, 'type'=>$type, 'content'=>$content, 'date'=>$date]);
        return view('eventmin');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function admin(Request $request)
    {

        return view('eventmin');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $events = Sport::paginate(9);

        return view('events',['events'=>$events]);
    }

}
