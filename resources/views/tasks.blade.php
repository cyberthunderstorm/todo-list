@extends('layouts.app')

@section('content')

<div class="panel-body">
	@include('common.errors')

	<form class="form-horizontal" method="POST" action="/task">
		<h2 class="form-header">Add Task</h2>
		{{ csrf_field() }}
		<div class="form-group">
			<label class="col-sm-3 control-label" for="task">Task</label>

			<div class="col-sm-6">
				<input type="text" name="name" id="task-name" class="form-control"/>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button class="btn btn-default" type="submit" style="display: flex;align-items: center; padding: 5px;">
					<i style="font-size: large;display: flex;align-items: center">+</i>Add Task
				</button>
			</div>
		</div>
	</form>
</div>

<style>
	.task {
		padding: 10px 0px 5px 0px;
	}

	.task button {
		border: none;
		padding: 5px;
		margin-left: 10px;
		border-radius: 4px;
	}
	.not-completed-tasks, .completed-tasks{
		display: flex;
		flex-flow: column;
		min-height: 50px;
		justify-content: center;
	}
	.not-completed-tasks{
		background: lightblue;
		margin-bottom: 10px;
	}
	.completed-tasks {
		background: lightgreen;
		margin-bottom: 10px;
	}

	.btn-primary {
		background: purple;
	}

	.btn-danger {
		background: darkred;
	}

	.forms {
		display: flex;
		flex-flow: row;
	}
	.task-container {
		display: flex;
		flex-flow: row;
		justify-content: space-between;
	}
	.div-left, .div-right {
		width: 48%;
	}
</style>
<div class="task-container">
<div class="div-left">
	<h2>Pending tasks</h2>
@if (count($not_completed) > 0)
	<div>

		@foreach($not_completed as $task)
				<div class="not-completed-tasks">
					<div class="task">
						<div>
							<span>{{$task->name}}</span>
						</div>
						<div class="forms">
							<form action="/task/complete/{{$task->id}}" method="POST">
								{{ csrf_field() }}
								<button type="submit" class="btn-primary">Mark complete</button>
							</form>
							<form action="/task/{{$task->id}}" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE')}}
								<button type="submit" class="btn-danger">Delete</button>
							</form>
						</div>
					</div>
				</div>
		@endforeach
	</div>
@else
<div style="padding: 50px;border: solid 1px lightgray; max-width: 300px;border-radius: 10px;margin: auto; margin-bottom: 20px">
	<span><strong>
		No pending tasks
	</strong></span>
</div>
@endif
</div>

<div class="div-right">	
<h2>Completed</h2>
@if (count($completed) > 0)
	<div>
		@foreach($completed as $task)
				<div class="completed-tasks">
					<div class="task">
						<div>
							<span>{{$task->name}}</span>
						</div>
						<div class="forms">
							<form action="/task/incomplete/{{$task->id}}" method="POST">
								{{ csrf_field() }}
								<button type="submit" class="btn-primary">Mark as incomplete</button>
							</form>
							<form action="/task/{{$task->id}}" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE')}}
								<button type="submit" class="btn-danger">Delete</button>
							</form>
						</div>
					</div>
				</div>
		@endforeach
	</div>
@else
<div style="padding: 50px;border: solid 1px lightgray; max-width: 300px;border-radius: 10px;margin: auto; margin-bottom: 20px">
	<span><strong>
		No completed tasks
	</strong></span>
</div>
@endif
</div>
</div>
@endsection