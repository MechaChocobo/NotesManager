/*
Javascript for the notes page. Handles AJAX calls to the controllers
*/
function addNote()
{
	var userId = $('#user-id').val();
	var noteTitle = $('#new-note-title').val();
	var noteBody = $('#new-note-body').val();
	$.ajax({
		type: 'GET',
		url: 'addNote',
		data:{
			id: userId,
			title: noteTitle,
			body: noteBody
		},
		success:function(noteEl) 
		{
			$('#notes-list').append($(noteEl));
			$('#empty-list').hide();
			$('.modal').modal('hide');
		}
	});
}

function onSave(noteId)
{
	var userId = $('#user-id').val();
	var noteBody = $('#note-'+noteId+'-body').val();
	var noteTitle = $('#note-'+noteId+'-title').val();
	$.ajax({
		type: 'GET',
		url: 'saveNote',
		data:{
			id: userId,
			noteId: noteId,
			title: noteTitle,
			body: noteBody
		}
	});
}

function onDelete(noteId)
{
	var userId = $('#user-id').val();
	$.ajax({
		type: 'GET',
		url: 'deleteNote',
		data:{
			id: userId,
			noteId: noteId
		},
		success:function() 
		{
			$("#note-"+noteId+"-container").remove();
			if ($('#notes-list .note-container').length <= 0)
				$('#empty-list').show();
		}
	});
}