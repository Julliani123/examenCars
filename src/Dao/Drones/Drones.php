<?php

namespace Dao\Drones;

use Dao\Table;

class Drones extends Table
{
    public static function getAllDrones()
    {
        $sqlstr = "SELECT * FROM drones";
        return self::obtenerRegistros($sqlstr, array());
    }

    public static function getDroneById($id)
    {
        $sqlstr = "SELECT * FROM drones WHERE id = :id";
        $params = array("id" => $id);
        return self::obtenerUnRegistro($sqlstr, $params);
    }

    public static function insertDrone($nombre, $fabricante, $modelo, $tipo, $precio)
    {
        $sqlstr = "INSERT INTO drones (nombre, fabricante, modelo, tipo, precio) VALUES (:nombre, :fabricante, :modelo, :tipo, :precio)";
        $params = array(
            "nombre" => $nombre,
            "fabricante" => $fabricante,
            "modelo" => $modelo,
            "tipo" => $tipo,
            "precio" => $precio
        );
        return self::executeNonQuery($sqlstr, $params);
    }

    public static function updateDrone($id, $nombre, $fabricante, $modelo, $tipo, $precio)
    {
        $sqlstr = "UPDATE drones SET nombre = :nombre, fabricante = :fabricante, modelo = :modelo, tipo = :tipo, precio = :precio WHERE id = :id";
        $params = array(
            "id" => $id,
            "nombre" => $nombre,
            "fabricante" => $fabricante,
            "modelo" => $modelo,
            "tipo" => $tipo,
            "precio" => $precio
        );
        return self::executeNonQuery($sqlstr, $params);
    }

    public static function deleteDrone($id)
    {
        $sqlstr = "DELETE FROM drones WHERE id = :id";
        $params = array("id" => $id);
        return self::executeNonQuery($sqlstr, $params);
    }
}
