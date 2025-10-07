<?php

namespace App\Http\Controllers;

use App\Models\Ninja;
use App\Models\Dojo;
use Illuminate\Http\Request;

class NinjaController extends Controller
{
    public function index() {
      // route --> /ninjas/ 
      $ninjas = Ninja::with('dojo')->orderBy('created_at', 'desc')->paginate(10);

      return view('ninjas.index', ['ninjas' => $ninjas]);
    }

    public function show($id) {
      // route --> /ninjas/{id}
      $ninja = Ninja::with('dojo')->findOrFail($id);

      return view('ninjas.show', ['ninja' => $ninja]);
    }

    public function create() {
      $dojos = Dojo::all();
      
      return view('ninjas.create', ["dojos" => $dojos]);
    }

    public function store() {
      // --> /ninjas/ (POST)
      // hanlde POST request to store a new ninja record in table
    }

    public function destroy($id) {
      // --> /ninjas/{id} (DELETE)
      // handle delete request to delete a ninja record from table
    }

    // edit() and update() for edit view and update requests
    // we won't be using these routes
}
