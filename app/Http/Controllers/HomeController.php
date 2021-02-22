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
        $profs = Professeur::orderBy('created_at', 'DESC')
            ->latest()
            ->paginate();
        $matieres = Matiere::with('etudiants')
            ->latest()
            ->paginate();

        return view('home', [
            'profs' => $profs,
            'matieres' => $matieres
        ]);
    }

    public function search()
    {
        $matieres = Matiere::with(['etudiants'])
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
            ->latest()
            ->paginate();

        $profs = Professeur::when(request('search'), function ($query)
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
