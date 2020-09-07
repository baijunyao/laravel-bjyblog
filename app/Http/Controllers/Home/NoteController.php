<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $notes   = Note::orderBy('created_at', 'desc')->get();
        $assign  = [
            'category_id'  => 'note',
            'notes'        => $notes,
            'title'        => translate('Note'),
        ];

        return view('home.index.note', $assign);
    }
}
