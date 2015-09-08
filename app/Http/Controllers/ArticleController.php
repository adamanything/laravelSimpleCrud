<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\createEditArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Tests\Fixtures\RedirectableUrlMatcher;
use Auth;

class ArticleController extends Controller {

    public function __construct(){
        $this->middleware('doesUserOwn', ['only' => ['update', 'destroy']]);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $articles = Article::all();
		return view('pages.article', compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(createEditArticleRequest $request)
	{
        //Article::create($request->all());//the request namespace above had to be edited
        //above is shorthand but does'nt get passed the user id so needs work

		$article = new Article;
		$article->title = $request->title;
        $article->body =  $request->body;
        $article->user_id = Auth::User()->id;
        $article->save();

        return redirect('article');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = Article::findOrFail($id);
        return view('pages.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$article = Article::findOrFail($id);
        return view('pages.edit', compact('article'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(createEditArticleRequest $request, $id)
	{
		$article = Article::findOrFail(2);
        $article->title = $request->title;
        $article->body  = $request->body;
        $article->save();

        return redirect('/article/')->with('flash_message', 'Article successfully changed.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Article::destroy($id);
		return redirect('/article/')->with('flash_message', 'Article successfully deleted.');
	}

    public function userArticle(){
        $articles = Article::where('user_id', Auth::user()->id)->get();
        return view('pages.userArticles', compact('articles'));
    }

}
