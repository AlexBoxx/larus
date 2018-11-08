<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['title'] = 'Все статьи';
      $data['articles'] = Article::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.articles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['title'] = 'Добавить статью';
      $data['article'] = [];
      $data['categories'] = Category::with('children')->where('parent_id', 0)->get();
      $data['delimiter'] = '';

        return view('admin.articles.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::create($request->all());

        //Categories
        if($request->input('categories')):
          $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.article.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

      $data['article'] = $article;
      $data['categories'] = Category::with('children')->where('parent_id', 0)->get();
      $data['delimiter'] = '';
      $data['title'] = 'Редактирование - ' .$article['title'];
        return view('admin.articles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->except('slug'));

        //Categories
        $article->categories()->detach();
        if($request->input('categories')):
          $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
      //Categories
      $article->categories()->detach();

      $article->delete();

      return redirect()->route('admin.article.index');
    }

    //main function
    //выборка материалов по разделу

    public function catArticles(Category $category)
    {

      $data['category'] = $category;
      $data['articles'] = $category->articles()->paginate(10);
      $data['title'] = 'Статьи в разделе - '.$category['title'];

      return view('admin.articles.index', $data);
    }

    // выборка материалов по публикации

    public function public(Request $request, $id){

      if ($id == 1){
        $data['title'] = 'Опубликованы';
      }else{
        $data['title'] = 'НЕ Опубликованы';
      }


      $data['articles'] = Article::publisched($id)->paginate(10);
      return view('admin.articles.index', $data);
    }


}
