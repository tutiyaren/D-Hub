<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debate;
use App\Models\Genre;

class SocialController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($keyword) {
            $debates = Debate::where('genre_id', 4)->titleSearch($keyword)->paginate(5);
        }
        if (!$keyword) {
            $debates = Debate::where('genre_id', 4)->paginate(5);
        }
        $genre = Genre::find(4);
        return view('social.index', compact('debates', 'genre'));
    }

    public function show()
    {
        return view('social.show');
    }
}
