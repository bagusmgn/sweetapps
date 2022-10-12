<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;

class PageController extends Controller
{

    public function index(){
       return view('dropzo');
    }

    // Upload file
    public function uploadFile(Request $request){

       $data = array();

       $validator = Validator::make($request->all(), [
          'file' => 'required|mimes:png,jpg,jpeg,pdf|max:2048'
       ]);

       if ($validator->fails()) {

          $data['success'] = 0;
          $data['error'] = $validator->errors()->first('file');// Error response

       }else{
          if($request->file('file')) {

             $file = $request->file('file');
             $filename = time().'_'.$file->getClientOriginalName();

             // File upload location
             $location = 'uploads/images';

             // Upload file
             $file->move($location,$filename);

             // Response
             $data['success'] = 1;
             $data['message'] = 'Uploaded Successfully!';

          }else{
             // Response
             $data['success'] = 0;
             $data['message'] = 'File not uploaded.';
          }
       }

       return response()->json($data);
    }

    // Read files
    public function readFiles(){
       $directory = 'uploads/images';
       $files_info = [];
       $file_ext = array('png','jpg','jpeg','pdf');

       // Read files
       foreach (File::allFiles(public_path($directory)) as $file) {
          $extension = strtolower($file->getExtension());

          if(in_array($extension,$file_ext)){ // Check file extension
             $filename = $file->getFilename();
             $size = $file->getSize(); // Bytes
             $sizeinMB = round($size / (1000 * 1024), 2);// MB

             if($sizeinMB <= 2){ // Check file size is <= 2 MB
                 $files_info[] = array(
                       "name" => $filename,
                       "size" => $size,
                       "path" => url($directory.'/'.$filename)
                 );
             }
          }
       }
       return response()->json($files_info);
    }
}
