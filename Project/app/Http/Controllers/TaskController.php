<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Task;
use App\Employee;
use App\Typology;

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
		$typologies = Typology::All();
		return view('pages.task-create', compact('employees', 'typologies'));
	}

	public function store(Request $request) {

		$data = $request -> All();

		Validator::make($request -> all(), [
			'title' => 'required|max:20',
			'description' => 'required|min:5|max:200',
		]) -> validate();

		$task = Task::make($data);
		$employee = Employee::findOrFail($request -> get('employee_id'));
		$task -> employee() -> associate($employee);
		$task -> save();

		if (array_key_exists('tasks', $data)) {
			$typologies = Typology::findOrFail($data['typologies']);
		} else {
			$typologies = [];
		}
		$task -> typologies() -> attach($typologies);

		return redirect() -> route('tasks-index');
	}

	public function edit($id) {
		$task = Task::findOrFail($id);
		$typologies = Typology::All();
		$employees = Employee::All();
		return view('pages.task-edit', compact('task','employees', 'typologies'));
	}

	public function update(Request $request, $id) {

		$data = $request -> All();

		Validator::make($request -> all(), [
			'title' => 'required|max:20',
			'description' => 'required|min:5|max:200',
		]) -> validate();

		$task = Task::findOrFail($id);
		$employee = Employee::findOrFail($data['employee_id']);
		$task -> update($data);
		$task -> employee() -> associate($employee);
		$task -> save();

		if (array_key_exists('tasks', $data)) {
			$typologies = Typology::findOrFail($data['typologies']);
		} else {
			$typologies = [];
		}
		$task -> typologies() -> sync($typologies);

		return redirect() -> route('task-show', $id);
	}

}
