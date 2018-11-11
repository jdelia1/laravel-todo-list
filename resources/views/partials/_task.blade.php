<div class="card">
	<div class="card-header" id="heading-{{ $task->id }}">
		<h5 class="mb-0">
			<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{ $task->id }}" aria-expanded="true" aria-controls="collapse-{{ $task->id }}">
				{{ $task->name }}
			</button>
			<span class="float-right"><small>{{ $task->due_date }}</small></span>
		</h5>
	</div>

	<div id="collapse-{{ $task->id }}" class="collapse" aria-labelledby="heading-{{ $task->id }}" data-parent="#task-list">
		<div class="card-body">
			<p>{{ $task->description }}</p>
			{!! Form::open(['route' => ['task.destroy', $task->id], 'method' => 'DELETE']) !!}
				<a href="{{ route('task.edit', $task->id) }}" class="btn btn-small btn-primary">Edit</a>
				<button type="submit" class="btn btn-small btn-danger">Delete</button>
			{!! Form::close() !!}
			<p class="float-right"><small>{{ $task->created_at }}</small></p>
		</div>
	</div>
</div>
