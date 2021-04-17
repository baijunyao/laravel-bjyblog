<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Note\Store;
use App\Models\Note;
use Illuminate\Http\Request;

/**
 * @deprecated This will be removed.
 */
class NoteController extends Controller
{
    public function index(Note $noteModel)
    {
        $data = $noteModel
            ->orderBy('created_at', 'desc')
            ->withTrashed()
            ->paginate(50);
        $assign = compact('data');

        return view('admin.note.index', $assign);
    }

    public function create()
    {
        return view('admin.note.create');
    }

    public function store(Store $request)
    {
        Note::create($request->only('content'));

        return redirect(url('admin/note/index'));
    }

    public function edit($id)
    {
        $data   = Note::withTrashed()->where('id', $id)->firstOrFail();
        $assign = compact('data');

        return view('admin.note.edit', $assign);
    }

    public function update(Request $request, $id)
    {
        Note::withTrashed()->where('id', $id)->firstOrFail()->update($request->except('_token'));

        return redirect()->back();
    }

    public function destroy($id)
    {
        Note::destroy($id);

        return redirect(url('admin/note/index'));
    }

    public function restore($id)
    {
        Note::onlyTrashed()->where('id', $id)->firstOrFail()->restore();

        return redirect(url('admin/note/index'));
    }

    public function forceDelete($id)
    {
        Note::onlyTrashed()->where('id', $id)->firstOrFail()->forceDelete();

        return redirect(url('admin/note/index'));
    }
}
