<?php
namespace App\UseCase\CreateDebate;

use App\Models\Genre;

class GetGenreUseCase
{
    public function __invoke()
    {
        return Genre::get();
    }
}
