<?php

namespace App\Http\Controllers;

use App\Twitt;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {

        $twits = Twitt::with('user', 'replies.user', 'likes.user')->orderByDesc("id")->paginate(10);

        $users = User::all();

        return view('home', compact('twits', 'users'));
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "content" => "required|string|max:200"
        ]);

        auth()->user()->twits()->create([
            'content' => $request->input("content")
        ]);

        return redirect('/home');
    }


    public function like(Twitt $twit)
    {
        $twit->likes()->create([

            'user_id' => auth()->user()->id
        ]);

        return back();
    }

    public function dislike(Twitt $twit)
    {
        $twit->likes()->where('user_id', auth()->user()->id)->delete();

        return back();
    }


    public function show(Twitt $twit)
    {
        $twit =  $twit->load('replies.user','likes.user');

        return view('show',compact('twit'));
    }



    public function reply(Request $request,Twitt $twit)
    {
        $request->validate([
            "content" => "required|string|max:200"
        ]);

        $twit->replies()->create([
            'user_id' => auth()->user()->id,
            'content' => $request->input("content")
        ]);

        return back();
    }
}
