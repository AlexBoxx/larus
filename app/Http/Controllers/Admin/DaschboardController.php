<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaschboardController extends Controller
{
    //StartDaschboard
	public function daschboard (Request $request){

		$data['title'] = 'Панель администратора';
		$data['count_cat'] = Category::count();
		$data['count_art'] = Article::count();
		$data['count_user'] = User::count();

		return view ('admin.daschboard', $data);
	}


}
