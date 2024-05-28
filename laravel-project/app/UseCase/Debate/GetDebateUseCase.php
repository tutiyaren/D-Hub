<?php
namespace App\UseCase\Debate;

use App\Models\Debate;

class GetDebateUseCase
{
    public function execute($genreId, $keyword = null)
    {
        $query = Debate::where('genre_id', $genreId)->orderBy('created_at', 'desc');

        if ($keyword) {
            $query->titleSearch($keyword);
        }

        return $query->paginate(5);
    }
}
