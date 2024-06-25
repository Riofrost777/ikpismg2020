<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use File;
// use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
    
    // index function
    public function index()
        {
            $articles = Article::orderby('id', 'desc')->paginate(10);
            return view('articles.index', compact('articles'));
        }

    // create function
    public function create()
    {
        return  view ('articles.create');
    }

    // store function
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title'=>'required|max:225',
            'photo'=>'required|image',
            'short_description'=>'required|max:255',
        ));
        $article = new Article;

        //get info file path
        // $doc_path = public_path('storage/article/'.$article->photo);
        
        // //check if old file exist, then delete it
        // if (File::exists($doc_path)){
        //     File::delete($doc_path);
        // }


        $article->title = $request->input('title');
        $article->short_description = $request->input('short_description');
        if($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = 'article' . '_' . time() . '.' . $photo->getClientOriginalExtension();
            $location = public_path('storage/article/');
            $request->file('photo')->move($location, $filename);

            $article->photo = $filename;
        }

        $article->save();

        return redirect()->route('articles.index')->withStatus('Article Successfully Created');
    }

    public function edit($id)
    {
      $article = Article::findOrFail($id);
      return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $this->validate($request, array(
            'title'=>'required|max:225',
            'photo'=>'image',
            'short_description'=>'required|max:255',
        ));

        $article = Article::where('id',$id)->first();

        $article->title = $request->input('title');
        $article->short_description = $request->input('short_description');

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = 'article' . '_' . time() . '.' . $photo->getClientOriginalExtension();
            $location = public_path('storage/article/');
            $request->file('photo')->move($location, $filename);

            // get info file path
            $doc_path = public_path('storage/article/'.$article->photo);
            
            //check if old file exist, then delete it
            if (File::exists($doc_path)){
                File::delete($doc_path);
            }

            // $oldFilename = $article->photo;
            $article->photo = $filename;
            // if(!empty($article->photo)){
            //   Storage::delete($oldFilename);
            // }
        }
        $article->save();

      return redirect()->route('articles.index')->withStatus('Article "'. $article->title.'" updated');
    }

    public function destroy($id)
    {
      $article = Article::findOrFail($id);
      $doc_path = public_path('storage/article/'.$article->photo);
      File::delete($doc_path);
      $article->delete();

      return back()->withStatus('Slide successfully deleted');
    }
}