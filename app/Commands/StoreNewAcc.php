<?php
namespace CATIA\Commands;

use CATIA\Commands\Commands;
use Illuminate\Contracts\Bus\SelfHandling;
use CATIA\User;

class StoreNewAcc extends Command implements SelfHandling
{
    // 'username','password','timelogin','timelogout'

    public $manpower_id;
    public $username;
    public $password;

    public function __construct($manpower_id, $username, $password)
    {
        $this->manpower_id = $manpower_id;
        $this->username = $username;
        $this->password = $password;
    }

    public function handle()
    {
        return User::create([

            'manpower_id' => $this->manpower_id,
            'username' => $this->username,
            'password' => bcrypt($this->password),
            
        ]);
    }
}
