<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
