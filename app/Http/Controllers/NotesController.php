<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Note;
use App\User;

class NotesController extends Controller
{
    public function __construct()
    {
		$this->middleware('auth', []);
    }

	public function fetchNotes(Request $request)
	{
		$user = $request->user();		
		$notes = DB::table('notes')->where('created_by', $user->id)->get();
		return view('notes', ['notesList' => $notes, 'userId' => $user->id, 'userName' => $user->name]);
	}
	
	public function deleteNote(Request $request)
	{
		if ($request->has('noteId'))
		{
			DB::table('notes')
				->where('id', $request->input('noteId'))
				->delete();
		}
	}
	
	public function saveNote(Request $request)
	{
		if ($request->has('noteId') && $request->has('title') && $request->has('body'))
		{
			//Should also set the 'updated_at' timestamp
			DB::table('notes')
				->where('id', $request->input('noteId'))
				->update([
					'title' => $request->input('title'),
					'body' => $request->input('body')
				]);
		}
	}
	
	public function addNote(Request $request)
	{
		if ($request->has('id') && $request->has('title') && $request->has('body'))
		{
			$newNoteId = DB::table('notes')->insertGetId([
				'title' => $request->input('title'), 
				'body' => $request->input('body'),
				'created_by' => $request->input('id')
			]);
			
			$note = Note::where('id', $newNoteId)->first();
			$user = User::where('id', $request->input('id'))->first();
			return view('note', ['note' => $note, 'name' => $user->name]);
		}
	}
    //
}
