<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professeur = new Professeur();
        $profs = $professeur->orderBy('created_at','DESC')->paginate(4);

        return view('professeur.index', compact('profs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('professeur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom_complet' => 'required',
            'address' => 'required',
            'date_naissence' => 'required',
            'genre' => 'required',
            'email' => 'required',
            'tele' => 'required',
        ]);
        $professeur = Professeur::create($data);
        return redirect()->route('professeur.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prof = Professeur::findOrFail($id);
        return view('professeur.show', compact('prof'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prof = Professeur::findOrFail($id);
        return view('professeur.edit', compact('prof'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nom_complet' => 'required',
            'address' => 'required',
            'date_naissence' => 'required',
            'genre' => 'required',
            'email' => 'required',
            'tele' => 'required',
        ]);
        $matiere = Matiere::findOrFail($request->input('matiere'));
        $professeur = Professeur::findOrFail($id);

        $professeur->nom_complet = $data['nom_complet'];
        $professeur->address = $data['address'];
        $professeur->date_naissence = $data['date_naissence'];
        $professeur->genre = $data['genre'];
        $professeur->email = $data['email'];
        $professeur->tele = $data['tele'];
        $professeur->matiere_id = $matiere->id;

        $professeur->save();
        return redirect()->route('professeur.list')->with('success','proffesseur a ete modifie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $professeur = Professeur::findOrFail($id);
        $professeur->delete();
        return redirect()->route('professeur.list')->with('success','proffesseur a ete supprime');
    }
}
