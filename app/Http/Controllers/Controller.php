<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller as BaseController;



class Controller extends BaseController
{

    public function Home()
    {

        $countries = Country::get();
        return view("home", ['countries' => $countries]);
    }

    public function Users()
    {
        $users = User::with("country")->get();
        return view("users", ['users' => $users]);
    }
}
