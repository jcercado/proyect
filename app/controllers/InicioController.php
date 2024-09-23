<?php

class InicioController extends Controller
{
    public function index()
    {
        // Renderiza la vista correspondiente
        $this->view('inicio/index',[],'Inicio');
    }
}
