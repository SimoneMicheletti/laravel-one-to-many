<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typology;

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
 
}
