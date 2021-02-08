<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Employee;

class TaskController extends Controller
{

	public function index() {
		$tasks = Task::All();
		return view('pages.tasks', compact('tasks'));
	}

	public function show($id) {
		$task = Task::findOrFail($id);
		return view('pages.task', compact('task'));
	}

	public function create() {
		$employees = Employee::All();
		return view('pages.task-create', compact('employees'));
	}

	public function store(Request $request) {
		$newTask = Task::make($request -> All());
		$employee = Employee::findOrFail($request -> get('employee_id'));
		$newTask -> employee() -> associate($employee);
		$newTask -> save();
		return redirect() -> route('tasks-index');
	}

	public function edit($id) {
		$task = Task::findOrFail($id);
		$employees = Employee::All();
		return view('pages.task-edit', compact('task','employees'));
	}

	// Non aggiorna employee_id
	public function update(Request $request, $id) {
		// dd($request -> All());
		Task::findOrFail($id) -> update($request -> All());
		// dd(Task::findOrFail($id));
		return redirect() -> route('task-show', $id);
	}

}
