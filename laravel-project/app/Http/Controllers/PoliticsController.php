<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debate;
use App\Models\Genre;

class PoliticsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($keyword) {
            $debates = Debate::where('genre_id', 1)->titleSearch($keyword)->paginate(5);
        }
        if (!$keyword) {
            $debates = Debate::where('genre_id', 1)->paginate(5);
        }
        $genre = Genre::find(1);
        return view('politics.index', compact('debates', 'genre'));
    }

    public function show()
    {
        return view('politics.show');
    }
}
