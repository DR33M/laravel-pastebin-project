<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NotesStatus;
use App\Models\NotesSyntax;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:update,note')->only(['update', 'edit', 'destroy']);
        $this->middleware('can:show,note')->only(['show']);
    }

    public function archive()
    {
        $notes = Note::public()->latest()->limit(config('constants.max_notes_archive'))->get();

        return view('notes.archive', compact('notes'));
    }

    public function archiveWithSyntax(NotesSyntax $notesSyntax)
    {
        $notes = $notesSyntax->notes()->public()->latest()->limit(config('constants.max_notes_archive'))->get();

        return view('notes.archive', compact('notes', 'notesSyntax'));
    }

    public function create()
    {
        $syntax = NotesSyntax::all();
        $status = NotesStatus::all();

        return view('notes.create', compact('syntax', 'status'));
    }

    public function store(Request $request)
    {
        $hashId = new Hashids('', config('constants.max_token_length'));

        $attributes = $this->validator($request->all())->validate();
        $attributes['token'] = $hashId->encode(time());
        $attributes['owner_id'] = auth()->id();

        $note = Note::create($attributes);

        flash(__('Note successfully created'));

        return redirect('/' . $note->token);
    }

    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note)
    {
        $syntax = NotesSyntax::all();
        $status = NotesStatus::all();

        return view('notes.edit', compact('note', 'syntax', 'status'));
    }

    public function update(Request $request, Note $note)
    {
        $attributes = $this->validator($request->all())->validate();
        $note->update($attributes);

        flash(__('Note successfully updated'));

        return redirect('/' . $note->token);
    }

    public function destroy(Note $note)
    {
        $note->delete();

        flash(__('Note deleted'), 'warning');

        return redirect('/');
    }

    public function download(Note $note) {
        $fileName = "{$note->title}.txt";
        $content = $note->body;

        $headers = [
            'Content-type' => 'text/plain',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName),
        ];

        return response($content, 200, $headers);
    }

    public function raw(Note $note) {
        return view('notes.raw', compact('note'));
    }

    public function clone(Note $note) {
        $syntax = NotesSyntax::all();
        $status = NotesStatus::all();

        return view('notes.create', compact('note', 'syntax', 'status'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'max:255'],
            'body' => ['required'],
            'syntax_id' => ['required', 'integer'],
            'status_id' => ['required', 'integer'],
        ]);
    }
}
