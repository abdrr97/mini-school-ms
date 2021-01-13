<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Professeur;
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
        $professeur = new Professeur();
        $profs = $professeur->orderBy('created_at','DESC')->get();
        $matiere = Matiere::all();

        $data = [
            'profs'=>$profs,
            'matiere'=>$matiere
        ];
        return view('home',compact('data'));
    }
}
