<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Typology;
use App\Task;

class TypologyController extends Controller
{

    public function index() {
		$typologies = Typology::All();
		return view('pages.typologies', compact('typologies'));
	}

	public function show($id) {
		$typology = Typology::findOrFail($id);
		return view('pages.typology', compact('typology'));
	}

	public function create() {
		$tasks = Task::All();
		return view('pages.typology-create', compact('tasks'));
	}

	public function store(Request $request) {

		$data = $request -> All();

		Validator::make($request -> all(), [
			'name' => 'required|max:20',
			'description' => 'required|min:5|max:200',
		]) -> validate();


		$typology = Typology::create($data);

		if (array_key_exists('tasks', $data)) {
			$tasks = Task::findOrFail($data['tasks']);
		} else {
			$tasks = [];
		}
		$typology -> tasks() -> attach($tasks);

		return redirect() -> route('typologies-index');
	}

	public function edit($id) {
		$typology = Typology::findOrFail($id);
		$tasks = Task::All();
		return view('pages.typology-edit', compact('typology', 'tasks'));
	}

	public function update(Request $request, $id) {

		$data = $request -> All();

		Validator::make($request -> all(), [
			'name' => 'required|max:20',
			'description' => 'required|min:5|max:200',
		]) -> validate();

		$typology = Typology::findOrFail($id);
		$typology -> update($data);

		if (array_key_exists('tasks', $data)) {
			$tasks = Task::findOrFail($data['tasks']);
		} else {
			$tasks = [];
		}
		$typology -> tasks() -> sync($tasks);

		return redirect() -> route('typology-show', $id);
	}
 
}