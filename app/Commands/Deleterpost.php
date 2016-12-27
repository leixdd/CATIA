<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\post;


class Deleterpost extends Command implements SelfHandling
{
    public $id;



    public function __construct($id)
    {
        $this->id = $id;

    }

    public function handle()
    {
        return post::where('id', $this->id)->delete();
    }
}
