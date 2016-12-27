<?php
namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\User2;

class upuser extends Command implements SelfHandling
{

    public $id;
    public $name;
    public $email;
    public $pass;

    public function __construct($id, $name, $email, $pass)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
    }

    public function handle()
    {
        return User2::where('id', $this->id)->update(array(
          'name' => $this->name,
          'email' => $this->email,
          'password' => $this->pass
        ));
    }
}
