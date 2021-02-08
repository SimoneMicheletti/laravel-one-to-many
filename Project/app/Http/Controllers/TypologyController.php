<?php

namespace App\Http\Controllers;

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
		$typology = Typology::create($data);
		$tasks = Task::findOrFail($data['tasks']);
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
		$typology = Typology::findOrFail($id);
		$typology -> update($data);
		$tasks = Task::findOrFail($data['tasks']);
		$typology -> tasks() -> sync($tasks);
		return redirect() -> route('typology-show', $id);
	}
 
}
