<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{

	public function index() {
		$employees = Employee::All();
		return view('pages.employees', compact('employees'));
	}

	public function show($id) {
		$employee = Employee::findOrFail($id);
		return view('pages.employee', compact('employee'));
	}
	
	public function create() {
		return view('pages.employee-create');
	}

	public function store(Request $request) {
		Employee::create($request -> All());
		return redirect() -> route('employees-index');
	}

	public function edit($id) {
		$employee = Employee::findOrFail($id);
		return view('pages.employee-edit', compact('employee'));
	}

	public function update(Request $request, $id) {
		Employee::findOrFail($id) -> update($request -> All());
		return redirect() -> route('employee-show', $id);
	}

}
