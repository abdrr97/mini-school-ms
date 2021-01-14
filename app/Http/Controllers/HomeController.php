<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Professeur;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

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
        $profs = $professeur->orderBy('created_at', 'DESC')->get();
        $matiere = Matiere::all();

        $data = [
            'profs' => $profs,
            'matiere' => $matiere
        ];
        return view('home', compact('data'));
    }

    public function search(Request $request)
    {
        $matiere = Matiere::all();
        $search_key =  $request->search;
        if (isset($search_key))
        {
            $mq = Matiere::where('nom', 'LIKE', '%' . $search_key . '%')
                ->orWhere('prix', 'LIKE', '%' . $search_key . '%')
                ->get();
            $profs = Professeur::where('nom_complet', 'LIKE', '%' . $search_key . '%')
                ->orWhere('email', 'LIKE', '%' . $search_key . '%')
                ->get();

            $data = [
                'profs' => $profs,
                'matiere' => $mq
            ];
            return view('home', compact('data'));
        }
        $data = [
            'profs' => [],
            'matiere' => $matiere
        ];
        return view('home', compact('data'));
    }
}
