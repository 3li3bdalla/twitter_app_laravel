<?php
	
	namespace App\Http\Controllers;
	
	use App\BlockedKeyword;
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
			
			$twits = Twitt::with('user','replies.user','likes')->orderByDesc("id")->paginate(10);
			
			
			$users = User::all();
			
			return view('home',compact('twits','users'));
		}
		
		public function create()
		{
			
			
			$blacklist = BlockedKeyword::all();
			
			
			return view('create',compact('blacklist'));
		}
		
		public function store(Request $request)
		{
			$request->validate([
				"content" => "required|string|max:200"
			]);
			
			
			$isBlocked = $this->check_if_text_within_blocked_list($request->input('content'));
			
			if ($isBlocked)
				return back();
			
			auth()->user()->twits()->create([
				'content' => $request->input("content")
			]);
			
			return redirect('/home');
		}
		
		private function check_if_text_within_blocked_list($text)
		{
			$words = explode(" ",$text);
			
			$blacklist = BlockedKeyword::all();
			
			
			foreach ($words as $word){
				if (in_array($word,$blacklist->pluck('keyword')->toArray())){
					auth()->user()->block_user_ip();
					return true;
				}
			}
			
			return false;
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
			$twit->likes()->where('user_id',auth()->user()->id)->delete();
			
			return back();
		}
		
		public function show(Twitt $twit)
		{
			$twit = $twit->load('replies.user','likes.user');
			
			
			$blacklist = BlockedKeyword::all();
			return view('show',compact('twit','blacklist'));
		}
		
		public function reply(Request $request,Twitt $twit)
		{
			$request->validate([
				"content" => "required|string|max:200"
			]);
			
			
			$isBlocked = $this->check_if_text_within_blocked_list($request->input('content'));
			
			if ($isBlocked)
				return back();
			
			
			$twit->replies()->create([
				'user_id' => auth()->user()->id,
				'content' => $request->input("content")
			]);
			
			return back();
		}
	}
