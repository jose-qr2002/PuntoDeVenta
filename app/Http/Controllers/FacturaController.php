<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utils\LogHelper;

class FacturaController extends Controller
{
    public function index() {
        return view('ventas');
    }
}
