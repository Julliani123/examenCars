<?php

namespace Controllers\Drones;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Drones\Drones as DAODrones;
use Utilities\Site;
use Utilities\Validators;

class DronesForm extends PublicController
{
    private $id;
    private $nombre;
    private $fabricante;
    private $modelo;
    private $tipo;
    private $precio;
    private $drones = [
        "id" => -1,
        "nombre" => "",
        "fabricante" => "",
        "modelo" => "",
        "tipo" => "",
        "precio" => 0
    ];
    private $url = "index.php?page=Drones_Drones";
    private $mode = 'INS';
    private $viewData = [];
    private $error = [];

    private $modes = [
        "INS" => "Ingresando nuevo dron",
        "UPD" => "Editando dron",
        "DEL" => "Eliminando dron",
        "DSP" => "Detalle de dron"
    ];

    public function run(): void
    {
        $this->init();
        if ($this->isPostBack()) {
            if ($this->validateFormData()) {
                $this->drones['id'] = $_POST['id'];
                $this->drones['nombre'] = $_POST['nombre'];
                $this->drones['fabricante'] = $_POST['fabricante'];
                $this->drones['modelo'] = $_POST['modelo'];
                $this->drones['tipo'] = $_POST['tipo'];
                $this->drones['precio'] = $_POST['precio'];
                $this->processAction();
            }
        }
        $this->prepareViewData();
        $this->render();
    }

    private function init()
    {
        if (isset($_GET["mode"])) {
            if (isset($this->modes[$_GET["mode"]])) {
                $this->mode = $_GET["mode"];
                if ($this->mode !== "INS") {
                    if (isset($_GET["id"])) {
                        $this->drones = DAODrones::getDroneById(strval($_GET["id"]));
                    }
                }
            } else {
                $this->handleError("Oops, el programa no encuentra el modo solicitado, intente de nuevo");
            }
        } else {
            $this->handleError("Oops, el programa falló, intente de nuevo.");
        }
    }

    private function handleError($errMsg)
    {
        Site::redirectToWithMsg($this->url, $errMsg);
    }

    private function validateFormData()
    {
        if (Validators::IsEmpty($_POST["nombre"])) {
            $this->error["nombre_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["fabricante"])) {
            $this->error["fabricante_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["modelo"])) {
            $this->error["modelo_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["tipo"])) {
            $this->error["tipo_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["precio"])) {
            $this->error["precio_error"] = "Campo es requerido";
        }

        return count($this->error) == 0;
    }

    private function processAction()
    {
        switch ($this->mode) {
            case 'INS':
                if (DAODrones::insertDrone(
                    $this->drones["nombre"],
                    $this->drones["fabricante"],
                    $this->drones["modelo"],
                    $this->drones["tipo"],
                    $this->drones["precio"]
                )) {
                    Site::redirectToWithMsg($this->url, "Dron creado exitosamente.");
                } else {
                    Site::redirectToWithMsg($this->url, "Hubo un error.");
                }
                break;
            case 'UPD':
                if (DAODrones::updateDrone(
                    $this->drones["id"],
                    $this->drones["nombre"],
                    $this->drones["fabricante"],
                    $this->drones["modelo"],
                    $this->drones["tipo"],
                    $this->drones["precio"]
                )) {
                    Site::redirectToWithMsg($this->url, "Dron actualizado exitosamente.");
                } else {
                    Site::redirectToWithMsg($this->url, "Hubo un error.");
                }
                break;
            case 'DEL':
                if (DAODrones::deleteDrone(
                    $this->drones["id"]
                )) {
                    Site::redirectToWithMsg($this->url, "Dron eliminado exitosamente.");
                } else {
                    Site::redirectToWithMsg($this->url, "Hubo un error.");
                }
                break;
        }
    }

    private function prepareViewData()
    {
        $this->viewData["mode"] = $this->mode;
        $this->viewData["drones"] = $this->drones;
        if ($this->mode == "INS") {
            $this->viewData["modedsc"] = $this->modes[$this->mode];
        } else {
            $this->viewData["modedsc"] = sprintf(
                $this->modes[$this->mode]
            );
        }

        foreach ($this->error as $key => $error) {
            if ($error !== null) {
                $this->viewData["drones"][$key] = $error;
            }
        }
        $this->viewData["readonly"] = in_array($this->mode, ["DSP", "DEL"]) ? 'readonly' : '';
        $this->viewData["showConfirm"] = $this->mode !== "DSP";
    }

    private function render()
    {
        Renderer::render("drones/dronesform", $this->viewData);
    }
}
