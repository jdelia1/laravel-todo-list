@extends('layouts.main')

@section('title', 'Tasks Home')

@section('content')

	@if ($tasks->count() == 0)
		<h1 class="text-center">You have no assigned tasks left!</h1>
	@else
		<div class="row">
			<div class="accordion" id="task-list">
				@foreach ($tasks as $task)
					{!! View::make('partials._task')->with('task', $task); !!}
				@endforeach
			</div>
		</div>	
	@endif

	<div class="row justify-content-center">
		<div class="col-6 text-center">
			{{ $tasks->links() }}
		</div>
	</div>

@endsection