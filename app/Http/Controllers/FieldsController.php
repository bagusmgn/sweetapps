<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Species;
use Illuminate\Http\Request;
use Validator;

class FieldsController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = Field::all();
        $species = Species::all();

        return view("admin.lahans", compact('fields','species'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = array(
            'species_id' => 'required',
            'names.*'  => 'required',
            'phone.*'  => 'required',
            'address.*'  => 'required',
            'coordinate.*'  => 'required',
            'coordinate_description.*'  => 'required',
            'description_of_land_type.*'  => 'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json([
                'error'  => $error->errors()->all()
            ]);
        }

        // foreach ($request->addmore as $key => $value) {
        //     ProductStock::create($value);
        // }
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
                'names' => $name[$count],
                'phone' => $phone[$count],
                'address' => $address[$count],
                'coordinate' => $coordinate[$count],
                'coordinate_description' => $coordinate_description[$count],
                'description_of_land_type' => $description_of_land_type[$count]
                // 'proposal' => $proposal[$count]     //already change 'proposal[]' but not work
            );
            Field::create($data);
        }

        return back()->with('success', 'Record Created Successfully.');
    }

    public function edit($id)
    {
        $fields = Field::find($id);
        return view("admin.lahansEdit", compact('fields'));
    }

    public function update(Request $request,$id)
    {

        $rules = array(
            'species_id' => 'required',
            'names.*'  => 'required',
            'phone.*'  => 'required',
            'address.*'  => 'required',
            'coordinate.*'  => 'required',
            'coordinate_description.*'  => 'required',
            'description_of_land_type.*'  => 'required'
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
            return response()->json([
                'error'  => $error->errors()->all()
            ]);
        }

        // foreach ($request->addmore as $key => $value) {
        //     ProductStock::create($value);
        // }
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
                'names' => $name[$count],
                'phone' => $phone[$count],
                'address' => $address[$count],
                'coordinate' => $coordinate[$count],
                'coordinate_description' => $coordinate_description[$count],
                'description_of_land_type' => $description_of_land_type[$count]
                // 'proposal' => $proposal[$count]     //already change 'proposal[]' but not work
            );
            Field::where('id', $id)->update($data);
        }

        return back()->with('success', 'Record Created Successfully.');
    }
}
