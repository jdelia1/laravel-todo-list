@extends('layouts.main')

@section('title', 'Tasks Home')

@section('content')

	@if ($tasks->count() == 0)
		<h1 class="text-center">There are no tasks for you to complete. Congratulations!</h1>
	@else
		@foreach ($tasks as $task)
			<div class="row">
				<div class="col-sm-12">
					<h3>
						{{ $task->name }}
						<span class="float-right"><small>{{ $task->created_at }}</small></span>
					</h3>
					<p>{{ $task->description }}</p>
					<h4>Due Date: <small>{{ $task->due_date }}</small></h4>
					{!! Form::open(['route' => ['task.destroy', $task->id], 'method' => 'DELETE']) !!}
						<a href="{{ route('task.edit', $task->id) }}" class="btn btn-small btn-primary">Edit</a>
						<button type="submit" class="btn btn-small btn-danger">Delete</button>
					{!! Form::close() !!}
				</div>
			</div>	
			<hr>	
		@endforeach
	@endif

	<div class="row justify-content-center">
		<div class="col-6 text-center">
			{{ $tasks->links() }}
		</div>
	</div>

@endsection