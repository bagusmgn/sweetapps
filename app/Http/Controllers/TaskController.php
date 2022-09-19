<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.task');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'cost' => 'required'
         ]);

         $count = count($request->task_name);

         for ($i=0; $i < $count; $i++) {
           $task = new Task();
           $task->task_name = $request->task_name[$i];
           $task->cost = $request->cost[$i];
           $task->save();
         }

         return redirect()->back();
    }
}
