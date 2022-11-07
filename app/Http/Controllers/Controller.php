<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;

use App\Models\Country;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
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
        $users = User::where('created_at', '>=', Carbon::now()->subMinutes(5)->toDateTimeString())->whereNotNull('email_verified_at')->with("country")->get();
        return view("users", ['users' => $users]);
    }
}
