<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debate;
use App\Models\Genre;

class InternationalController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($keyword) {
            $debates = Debate::where('genre_id', 3)->titleSearch($keyword)->paginate(5);
        }
        if (!$keyword) {
            $debates = Debate::where('genre_id', 3)->paginate(5);
        }
        $genre = Genre::find(3);
        return view('international.index', compact('debates', 'genre'));
    }

    public function show($id)
    {
        $debate = Debate::find($id);
        $genre = Genre::find(3);
        return view('international.show', compact('debate', 'genre'));
    }
}
