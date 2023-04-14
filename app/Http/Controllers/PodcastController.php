<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PodcastController extends Controller
{
//    public function index()
//    {
//        $podcasts = Podcast::all();
//        return view('index', ['podcasts' => $podcasts]);
//    }

    public function UserPodcasts()
    {
        $podcasts = Podcast::where('user_id', auth()->user()->id)->get();
        return view('my-podcasts', ['podcasts' => $podcasts]);
    }

    public function show(Podcast $podcast)
    {
        return view('podcast-show', ['podcast' => $podcast]);
    }

    public function create()
    {
        return view('podcast-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'podcast_file' => 'required|file',
            'podcast_img' => 'required|image',
        ]);
        $podcast_url = $request->file('podcast_file')->store('podcasts');

        $podcast_img = $request->file('podcast_img')->store('podcasts');

        $podcast = auth()->user()->podcasts()->create([...$validated, 'url_podcast' => $podcast_url, 'img_podcast' => $podcast_img ]);

        return redirect()->route('podcasts.show', $podcast);
    }


    public function destroy(string $id)
    {
        Podcast::destroy($id);
        return redirect()->route('podcasts.index')->with('message', 'Podcast supprimé');
    }

}
