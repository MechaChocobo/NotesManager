<!-- resources/views/notes.blade.php -->

<html>  
	<head>
		<title>ChocoNote</title>
		<link href="/css/style.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>  
	<body>
		<script src="notes.js"></script>
		<div class="container">  
			<header>
				<h1>ChocoNote</h1>
				<h3>A Superior Notes Management System</h3>
				<p>For certain (inaccurate) definitions of the word "Superior"</p>
			</header>			
			<div class="session-control">
				<form action="logout" method="post" class="control">
					<input type="hidden" id="user-id" value="{{$userId}}" name="id"/>
					<button type="button" data-toggle="modal" data-target="#addNoteModal" class="btn btn-primary">+New Note</button>
					<button type="submit" name="Logout" class="btn btn-default">Logout</button>
				</form>
			</div>
			<div class="container pre-scrollable bordered" id="notes-list">
				@forelse ($notesList as $note)
					@include('noteEmpty', ['hide' => 1])
					@include('note', [
						'note' => $note,
						'name' => $userName
					])
				@empty
					@include('noteEmpty', ['hide' => 0])
				@endforelse
			</div>
		</div>  
	</body>  
</html>  

<div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="addNoteLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="addNoteLabel">Add A New Note</h4>
			</div>
			<div class="modal-body">
					<form class="form-horizontal">
						<input type="text" id="new-note-title" class="form-control" placeholder="Title"></input>
						<textarea class="form-control" id="new-note-body" rows="5" placeholder="Insert note contents here."></textarea>
					</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" onclick="addNote()" class="btn btn-primary">Add Note</button>
			</div>
		</div>
	</div>
</div>
<script>
$('.modal').on('hidden.bs.modal', function(){
	$(this).find('form')[0].reset();
});
</script>