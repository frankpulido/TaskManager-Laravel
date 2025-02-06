<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create(){
        return Task::all();
    }

    public function show() {
        return Task::all();
    } 
}
