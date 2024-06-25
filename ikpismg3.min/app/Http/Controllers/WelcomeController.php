<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Joinedevent;
use App\Event;
use App\User;
use App\Article;
use DB;

class WelcomeController extends Controller
{
    //
    public function index(Request $request, Joinedevent $joinedevent, Event $event, User $user, Article $article)
    {
    	# code...
    	$article = Article::orderBy('id', 'desc')->take(5)->get();

    	return view('welcome', ['articles' => $article]);
    }
}
