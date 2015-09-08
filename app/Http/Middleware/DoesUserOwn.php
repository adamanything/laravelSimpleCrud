<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class DoesUserOwn {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */

	public function handle($request, Closure $next)
	{
		if($request->ArticleUserId == Auth::User()->id ) {
            return $next($request);
        }

        return redirect('article/create');
	}

}
