<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\Cache;

class Post{
    public $title;
    public $date;
    public $body;
    public $excerpt;
    public $slug;

    public function __construct($title, $date, $body, $excerpt, $slug){
        $this->title = $title;
        $this->date = $date;
        $this->body = $body;
        $this->excerpt = $excerpt;
        $this->slug = $slug;
    }


    public static function all(){
        return Cache::rememberForever('post.all', function () {
            return collect(File::files(resource_path("posts")))
                ->map(function ($file) {
                return $document = YamlFrontMatter::parseFile($file);
                })
                ->map(function ($document) {
                    return new Post(
                        $document->title,
                        $document->date,
                        $document->body(),
                        $document->excerpt,
                        $document->slug
                    );
                })->sortByDesc('date');
        });
    }

    public static function find($slug){
        //  of all posts, find the one with a slug that matches the one that was requested
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug){
        $posts = static::find($slug);

        if(! $posts){
            throw new ModelNotFoundException();
        }

        return $posts;
    }

}
