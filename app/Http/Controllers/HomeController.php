<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Professeur;
use Illuminate\Database\Eloquent\Collection;
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
        $profs = $professeur->orderBy('created_at', 'DESC')->paginate(10);
        $matiere = Matiere::with('etudiants')->paginate(10);

        $data = [
            'profs' => $profs,
            'matiere' => $matiere,
        ];
        return view('home', compact('data'));
    }

    public function search(Request $request)
    {
        $search_key =  $request->search;
        $profs = new Collection([]);
        $mq = new Collection([]);

        if (!empty($search_key))
        {
            $mq = Matiere::where('nom', 'LIKE', '%' . $search_key . '%')
                ->orWhere('prix', 'LIKE', '%' . $search_key . '%')
                ->paginate(10);
            $profs = Professeur::where('nom_complet', 'LIKE', '%' . $search_key . '%')
                ->orWhere('email', 'LIKE', '%' . $search_key . '%')
                ->paginate(10);
        }
        $data = [
            'profs' => $profs,
            'matiere' => $mq
        ];
        return view('home', compact('data'));
    }
}
