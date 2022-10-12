<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Species;
use App\Models\Biodiversitas;
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

        return view("admin.fields.lahans", compact('fields','species'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Function validasi field
        $this->validate($request,
            [
                'names' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'coordinate' => 'required',
                'coordinate_description' => 'required',
                'description_of_land_type' => 'required',
                // 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]
        );

        // $rules = array(
        //     'species_id' => 'required',
        //     'names.*'  => 'required',
        //     'phone.*'  => 'required',
        //     'address.*'  => 'required',
        //     'coordinate.*'  => 'required',
        //     'coordinate_description.*'  => 'required',
        //     'description_of_land_type.*'  => 'required',
        //     'image.*' => 'required'
        // );
        // $error = Validator::make($request->all(), $rules);
        // if($error->fails())
        // {
        //     return response()->json([
        //         'error'  => $error->errors()->all()
        //     ]);
        // }

        if($request->hasFile("image")){
            $file=$request->file("image");
            $imageName=date('YmdHis') . uniqid() . $file->getClientOriginalName();
            $file->move(public_path("uploads/fields_photo/"),$imageName);

            $input = new Field([
                "names" => $request->names,
                "phone" => $request->phone,
                "address" => $request->address,
                "coordinate" => $request->coordinate,
                "coordinate_description" => $request->coordinate_description,
                "description_of_land_type" => $request->description_of_land_type,
                "image" =>$imageName,
            ]);

            $input->save();

            $species_id=$request->species_id;
            $names=$request->local_name;
            $category=$request->category;
            $age=$request->age;
            $amount=$request->amount;

            for($i=0; $i<count($names); $i++){
                $data = array(
                    'field_id' => $input->id,
                    'species_id' => $species_id[$i],
                    'local_name' => $names[$i],
                    'category' => $category[$i],
                    'age' => $age[$i],
                    'amount' => $amount[$i]
                );
                Biodiversitas::create($data);
                // if($files[$i] != null){
                //     $request['field_id']=$input->id;
                //     $request['species_id']=$species_id[$i];
                //     $request['local_name']=$files[$i];
                //     $request['category']=$category[$i];
                //     $request['age']=$age[$i];
                //     $request['amount']=$amount[$i];
                //     Biodiversitas::create($request->all());
                // }
            }
        }



        // foreach ($request->addmore as $key => $value) {
        //     ProductStock::create($value);
        // }
        // $proposal = $request->file('proposal');
        // foreach ($proposal as $file) {
        //     $file->store('proposals');
        // }

        // $species_id = $request->species_id;
        // $name = $request->names;
        // $phone = $request->phone;
        // $address = $request->address;
        // $coordinate = $request->coordinate;
        // $coordinate_description = $request->coordinate_description;
        // $description_of_land_type = $request->description_of_land_type;

        // for ($count = 0; $count < count($name); $count++) {
        //     $data = array(
        //         'species_id' => $species_id[$count],
        //         'names' => $name[$count],
        //         'phone' => $phone[$count],
        //         'address' => $address[$count],
        //         'coordinate' => $coordinate[$count],
        //         'coordinate_description' => $coordinate_description[$count],
        //         'description_of_land_type' => $description_of_land_type[$count]
        //         // 'proposal' => $proposal[$count]     //already change 'proposal[]' but not work
        //     );
        //     Field::create($data);
        // }

        return back()->with('success', 'Record Created Successfully.');
    }

    public function edit($id)
    {
        $fields = Field::find($id);

        return view("admin.lahansEdit", compact('fields'));
    }

    // Fetch records
    public function getUsers(){
        // Call getuserData() method of Page Model
        $userData['data'] = Biodiversitas::getuserData();

        echo json_encode($userData);
        exit;
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
