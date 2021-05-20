<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Professeur;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $matieres = Matiere::with(['etudiants' => function ($query)
        {
            return $query->select('etudiant_id', 'full_name');
        }])
            ->when(request('search'), function ($query)
            {
                $search = request('search');
                $query->orWhere('nom', 'LIKE', "%{$search}%")
                    ->orWhere('prix', 'LIKE', "%{$search}%")
                    ->orWhereHas('etudiants', function ($query) use ($search)
                    {
                        $query->where('full_name', 'LIKE', "%{$search}%");
                    });
            })
            ->select('id', 'nom')
            ->latest()
            ->paginate();

        $profs = Professeur::with(['matiere' => function ($query)
        {
            return $query->select('id', 'nom');
        }])
            ->when(request('search'), function ($query)
            {
                $search = request('search');
                $query->orWhere('nom_complet', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate();
        return view('home', [
            'profs' => $profs,
            'matieres' => $matieres
        ]);
    }
}
