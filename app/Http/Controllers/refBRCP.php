<?php

namespace CATIA\Http\Controllers;

use Illuminate\Http\Request;
use CATIA\Http\Requests;
use CATIA\cityDB;
use CATIA\bgryDB;
use CATIA\regionDB;
use CATIA\provDB;

class refBRCP extends Controller
{
    public function __construct()
    {
    }


    public function city()
    {
        $cities = cityDB::get();
        return $cities;
    }

    public function brgy()
    {
        $b = bgryDB::select('brgyDesc')->get();
        return $b;
    }

    public function region()
    {
        $r = regionDB::select('regDesc')->get();
        return $r;
    }

    public function prov()
    {
        $p = provDB::select('provDesc')->get();
        return $p;
    }
}
