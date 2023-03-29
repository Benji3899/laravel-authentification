<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PodcastController extends Controller
{
    public function index(){
        $podcasts = Podcast::all();
        return view('index', ['podcasts' => $podcasts]);
    }

    public function show(Podcast $podcast){
        return view('podcast-show', ['podcast' => $podcast]);
    }

}
