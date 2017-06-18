<!-- resources/views/note.blade.php -->

<!-- Contains logic for a single row of the notes list -->
<div class="empty-container">
	@if ($hide == 1)
		<label id="empty-list" style="display: none;">No notes found for this user.</label>
	@else
		<label id="empty-list" >No notes found for this user.</label>
	@endif
</div>