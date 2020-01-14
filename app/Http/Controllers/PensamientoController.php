<?php

namespace App\Http\Controllers;

use App\Pensamiento;
use Illuminate\Http\Request;

class PensamientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return Pensamiento::where('user_id',auth()->user()->id)->get();
    }

    public function store(Request $request)
    {
        $pensamiento = new Pensamiento;
        $pensamiento->user_id = auth()->user()->id;
        $pensamiento->description = $request['description'];
        $pensamiento->save();

        return $pensamiento;
    }

    public function update(Request $request, $id)
    {
        $pensamiento = Pensamiento::findOrFail($id);
        $pensamiento->description = $request['description'];
        $pensamiento->save();

        return $pensamiento;
    }

    public function destroy($id)
    {
        $pensamiento = Pensamiento::findOrFail($id);
        $pensamiento->delete();
    }
}
