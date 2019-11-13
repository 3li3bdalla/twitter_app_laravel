<?php
	
	namespace App\Http\Middleware;
	
	use App\User;
	use Closure;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Response;
	
	class isBlockedMiddleware
	{
		/**
		 * Handle an incoming request.
		 *
		 * @param Request $request
		 * @param Closure $next
		 *
		 * @return mixed
		 */
		public function handle($request,Closure $next)
		{
			$isBlocked = User::isBlocked();
			if ($isBlocked != null){
				
				return Response::view('blocked',compact('isBlocked'));
			}
			
			
			return $next($request);
		}
	}
