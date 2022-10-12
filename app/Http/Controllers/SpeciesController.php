<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Alert;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    public function index(Request $request)
    {
        //Function sorting ascending & descending

        $species = Species::all();

        return view('admin.species.index',
                compact('species'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.species.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'local_name' => 'required',
            'latin_name' => 'required',
            'recording_location' => 'required',
            'description' => 'required',
            'image' => 'required',
        ],
        [
            'local_name.required' => 'Nama Lokal Wajib Diisi',
            'latin_name.required' => 'Nama Latin Wajib Diisi',
            'recording_location.required' => 'Lokasi Pencatatan Wajib Diisi',
            'description.required' => 'Deskripsi Wajib Diisi',
            'image.required' => 'Gambar Wajib Diisi',
        ]
        );

        if($request->hasFile("image")){
            $file=$request->file("image");
            $imageName=date('YmdHis') . uniqid() . $file->getClientOriginalName();
            $file->move(public_path("uploads/species_photo/cover/"),$imageName);

            $post = new Species([
                "local_name" => $request->local_name,
                "latin_name" => $request->latin_name,
                "recording_location" => $request->recording_location,
                "description" => $request->description,
                "image" =>$imageName,
            ]);

            $post->save();
        }

        Alert::toast('Create Successfully', 'success');

        return redirect()->route('species.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function show(Species $species)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function edit(Species $species)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Species $species)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $culture = Species::find($id)->delete();
        Alert::toast('Delete Successfully', 'success');

        return redirect()->route('cultures.index')
                        ->with('success','Product deleted successfully');
    }
}
