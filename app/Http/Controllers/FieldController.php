<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.fields');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $species_id = $request->species_id;
        $name = $request->names;
        $phone = $request->phone;
        $address = $request->address;
        $coordinate = $request->coordinate;
        $coordinate_description = $request->coordinate_description;
        $description_of_land_type = $request->description_of_land_type;

        // $proposal = $request->file('proposal');
        // foreach ($proposal as $file) {
        //     $file->store('proposals');
        // }

        for ($count = 0; $count < count($name); $count++) {
            $data = array(
                'species_id' => $species_id[$count],
                'name' => $name[$count],
                'phone' => $phone[$count],
                'address' => $address[$count],
                'coordinate' => $coordinate[$count],
                'coordinate_description' => $coordinate_description[$count],
                'description_of_land_type' => $description_of_land_type[$count]
                // 'proposal' => $proposal[$count]     //already change 'proposal[]' but not work
            );
            Field::create($data);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit(Field $field)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Field $field)
    {
        //
    }
}
