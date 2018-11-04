{{ Form::label('name', 'Task Name', ['class' => 'control-label']) }}
{{ Form::text('name', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Task Name']) }}

{{ Form::label('description', 'Description', ['class' => 'control-label mt-3']) }}
{{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Task Description']) }}

{{ Form::label('due_date', 'Due Date', ['class' => 'control-label mt-3']) }}
{{ Form::date('due_date', null, ['class' => 'form-control']) }}

<div class="row justify-content-center">
	<div class="col-sm-4">
		<a href="{{ route('task.index') }}" class="btn btn-block btn-secondary mt-3">Go Back</a>
	</div>
	<div class="col-sm-4">
		<button class="btn btn-block btn-primary mt-3" type="submit">Save Task</button>
	</div>
</div>