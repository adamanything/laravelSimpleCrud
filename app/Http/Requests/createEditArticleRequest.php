<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class createEditArticleRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        $isLoggedIn = false;

		if(Auth::check()){
            $isLoggedIn = true;
        }

//        if(Request::input('ArticleUserId')){
//            if(Request::input('ArticleUserId') != Auth::User()->id){
//                $isLoggedIn = false;
//            }
//        }

        return $isLoggedIn;

	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' => 'required|min:3|max:255',
			'body'  => 'required|min:5',
		];
	}

}
