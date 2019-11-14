<?php
	
	namespace App\Http\Controllers\Admin;
	
	use App\BlockedKeyword;
	use App\BlockedList;
	use App\Http\Controllers\Controller;
	use App\Twitt;
	use App\User;
	use Illuminate\Contracts\Support\Renderable;
	use Illuminate\Http\Request;
	use PHPUnit\Util\Blacklist;
	
	class HomeController extends Controller
	{
		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
			$this->middleware('auth:admin');
		}
		
		/**
		 * Show the application dashboard.
		 *
		 * @return Renderable
		 */
		public function index()
		{
			
			$blacklist = BlockedList::all();
			
			
			return view('admin.home',compact('blacklist'));
		}
		
		
		
		public function keywords()
		{
			
			$blacklist = BlockedKeyword::all();
			
			
			return view('admin.keywords',compact('blacklist'));
		}
		
		
		
		public function create()
		{
			
			
			return view('admin.create');
		}
		
		public function store(Request $request)
		{
			$request->validate([
				"keyword" => "required|string|max:200|unique:blocked_keywords"
			]);
			
		
			
			$keyword = new BlockedKeyword();
			$keyword->keyword = $request->input('keyword');
			$keyword->save();
			
			
			return redirect('/admin/keywords');
		}
		
	
		
	
	
		public function unblock(BlockedList $blocked)
		{
			$blocked->delete();
			
			return back();
		}
		
		public function delete(BlockedKeyword $keyword)
		{
			$keyword->delete();
			
			return back();
		}
	}
