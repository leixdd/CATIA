<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\post;

class PostCommand extends Command implements SelfHandling
{

    public $title;
    public $id;
    public $author;
    public $thumb;
    public $content;

    public function __construct($id, $title, $content, $author, $thumb)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->thumb = $thumb;
    }

    public function handle()
    {
      return post::create([

          'id' => $this->id,
          'post_title' => $this->title,
          'post_content' => $this->content,
          'post_author' => $this->author ,
          'post_thumb' => $this->thumb

      ]);
    }
}
