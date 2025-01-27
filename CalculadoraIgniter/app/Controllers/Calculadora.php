<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Calculadora extends Controller
{
    public function mostrar()
{
    return view(name: 'calculadora');
}

public function calcular()
{
    $expresion = $this->request->getPost('expresion');
    
    if($expresion === ""){
        $resultado = "La operación está vacia";
    }else {
        $resultado = eval("return $expresion;");
    }

    return view('calculadora', ['resultado' => $resultado]);
}
}
