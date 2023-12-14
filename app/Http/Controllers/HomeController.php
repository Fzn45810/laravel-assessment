<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UnionCouncil;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $polioworker = 'polioworker';
        $get_polio_worker = User::with('roles')
        ->whereHas('roles', function ($query) use ($polioworker) {
            return $query->where('name', $polioworker);
        })->get();
        return view('home', compact('get_polio_worker'));
    }

    public function assignment()
    {
        $polioworker = 'polioworker';
        $get_polio_worker = User::with('roles','councils')
        ->whereHas('roles', function ($query) use ($polioworker) {
            return $query->where('name', $polioworker);
        })->get();
        $counciles = UnionCouncil::all();
        return view('unionassignment', compact('get_polio_worker','counciles'));
    }

    public function assignmentProcess(Request $request)
    {
        // dd($request->all());
        $unionCouncil = UnionCouncil::find($request->council);
        $unionCouncil->workers()->sync($request->workers);

        return redirect()->back()->with('status','Polio Worker assigned to the council');
    }
}
