<!-- resources/views/note.blade.php -->

<!-- Contains logic for a single row of the notes list -->
<div id="note-{{$note->id}}-container" class="note-container">
	<input type="hidden" value="{{$note->id}}"/>
	<div class="form-inline">
		<input type="text" id="note-{{$note->id}}-title" class="form-control" style="width: 50%" value="{{$note->title}}"></input>
		<label>(Created by {{$name}}, {{$note->created_at}})</label>
		<button type="button" onclick="onSave({{$note->id}})" class="btn btn-default">Save</button>
		<button type="button" onclick="onDelete({{$note->id}})" class="btn btn-danger">Delete</button>
	</div>
	<textarea class="form-control" id="note-{{$note->id}}-body" rows="5">{{$note->body}}</textarea>
</div>