<?php

namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\msg;


class Storemsg extends Command implements SelfHandling
{
    public $id;
    public $title;
    public $msg;
    public $time_e;
    public $email;


    public function __construct($id, $title, $msg, $time_e, $email)
    {
        $this->id = $id;
        $this->title = $title;
        $this->msg = $msg;
        $this->time_e = $time_e;
        $this->email = $email;
    }

    public function handle()
    {
        return msg::create([

            'id' => $this->id,
            'title' => $this->title,
            'messagez' => $this->msg,
            'time_e' => $this->time_e,
            'email' => $this->email

        ]);
    }
}
