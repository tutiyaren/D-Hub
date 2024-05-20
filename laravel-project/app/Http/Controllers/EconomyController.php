<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debate;
use App\Models\Genre;

class EconomyController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($keyword) {
            $debates = Debate::where('genre_id', 2)->titleSearch($keyword)->paginate(5);
        }
        if (!$keyword) {
            $debates = Debate::where('genre_id', 2)->paginate(5);
        }
        $genre = Genre::find(2);
        return view('economy.index', compact('debates', 'genre'));
    }

    public function show()
    {
        return view('economy.show');
    }
}
