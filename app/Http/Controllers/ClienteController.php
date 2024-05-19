<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
    $clientes = Cliente::all();
    return view('Clientes', compact('clientes'));
    }

    public function create() {
        return view('rClientes');
    }
}