<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view("dashboard-backup.index");
    }

    public function create(){
        return view("dashboard-backup.create");
    }

    public function edit(){
        return view("dashboard-backup.edit");
    }
}
