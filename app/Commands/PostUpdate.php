<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\post;

class PostUpdate extends Command implements SelfHandling
{

    public $title;
    public $id;
    public $author;
    public $thumb;
    public $content;
    public $isa;

    public function __construct($id, $title, $content, $author, $thumb, $isa )
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->thumb = $thumb;
        $this->isa = $isa;

    }

    public function handle()
    {
      return post::where('id', $this->id)->update(array(
        'post_title' => $this->title,
        'post_content' => $this->content,
        'post_author' => $this->author,
        'post_thumb' => $this->thumb,
        'is_main' => $this->isa

      ));
    }
}
