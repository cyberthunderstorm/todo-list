<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;


/*
@description: Display all tasks
*/
Route::get('/', function() {
	//$tasks = Task::orderBy('created_at', 'asc')->get();
	$completed = Task::whereColumn('completed', true)->orderByDesc('created_at')->get();
	$not_completed = Task::whereColumn('completed', 0)->orderByDesc('created_at')->get();
	return view('tasks', [
		'not_completed' => $not_completed,
		'completed' => $completed
	]);
});

/*
@description: Add new task
*/
Route::post('/task', function(Request $request) {
	$validator = Validator::make($request->all(), [
		'name' => 'required|max:255',
	]);

	if($validator->fails()) {
		return redirect('/')
			->withInput()
			->withErrors($validator);
	}

	$task = new Task;
	$task->name = $request->name;
	$task->save();

	return redirect('/');
});

/*
@description: Delete an existing task
*/

Route::delete('/task/{id}', function ($id) {
	Task::findOrFail($id)->delete();

	return redirect('/');
});

Route::post('/task/complete/{id}', function($id) {
	$task = Task::findOrFail($id);
	$task->completed = true;
	$task->save();

	return redirect('/');
});
Route::post('/task/incomplete/{id}', function($id) {
	$task = Task::findOrFail($id);
	$task->completed = 0;
	$task->save();

	return redirect('/');
});