<?php

namespace Controllers\Drones;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Drones\Drones as DAODrones;
use Utilities\Site;

class DronesList extends PublicController
{
    private $id;
    private $nombre;
    private $fabricante;
    private $modelo;
    private $tipo;
    private $precio;

    public function run(): void
    {
        $viewData = [];

        $viewData['id'] = 'id';
        $viewData['nombre'] = 'nombre';
        $viewData['fabricante'] = 'fabricante';
        $viewData['modelo'] = 'modelo';
        $viewData['tipo'] = 'tipo';
        $viewData['precio'] = 'precio';

        $viewData['drones'] = DAODrones::getAllDrones();
        Renderer::render("drones/droneslist", $viewData);
    }
}
