<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class ListaController extends Controller
{
    public function index()
    {
        session(); 
        $data['lista'] = session()->get('lista') ?? [];
        return view('lista_view', $data);
    }

    public function agregar()
    {
        session();
        $lista = session()->get('lista') ?? [];

        $texto = $this->request->getPost('texto');

        if (!empty($texto)) {
            $lista[] = $texto; 
            session()->set('lista', $lista);
        }

        return $this->response->setJSON($lista);
    }

    public function eliminar($index)
    {
        session();
        $lista = session()->get('lista') ?? [];

        if (isset($lista[$index])) {
            unset($lista[$index]); // Eliminar el elemento
            $lista = array_values($lista); // Reindexar el array
            session()->set('lista', $lista);
        }

        return $this->response->setJSON($lista); // Enviar la lista actualizada
    }
}
