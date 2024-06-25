<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Artikel 1
        $article1 = new Article;
        $article1->title = "Judul Artikel Pertama";
        $article1->body = "Isi Artikel Pertama";
        $article1->save();
		
		//Artikel 2
		$article2 = new Article;
        $article2->title = "Judul Artikel Kedua";
        $article2->body = "Isi Artikel Kedua";
        $article2->save();
		
		//Artikel 3
		$article3 = new Article;
        $article3->title = "Judul Artikel Ketiga";
        $article3->body = "Isi Artikel Ketika";
        $article3->save();
    }
}