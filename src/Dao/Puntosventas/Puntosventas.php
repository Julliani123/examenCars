<?php

namespace Dao\Puntosventas;

use Dao\Table;

class Puntosventas extends Table
{

    private $idpuntoventa;
    private $nombrefranquicia;
    private $nombrepuntoventa;
    private $pais;
    private $ciudad;
    private $codigopostal;
    private $direccion;
    private $telefono;
    private $email;
    private $responsablenombre;
    private $responsabletelefono;
    private $fecharegistro;


    public static function getPuntosventa()
    {
        $sqlstr = "SELECT * FROM puntosventa";
        $params = [];
        return self::obtenerRegistros($sqlstr, $params);
    }

    public static function insertPuntosventa($nombrefranquicia, $nombrepuntoventa, $pais, $ciudad, $codigopostal, $direccion, $telefono, $email, $responsablenombre, $responsabletelefono)
    {

        $sqlstr = "INSERT INTO puntosventa (nombrefranquicia, nombrepuntoventa, pais, ciudad, codigopostal, direccion, telefono, email, responsablenombre, responsabletelefono) VALUES (:nombrefranquicia , :nombrepuntoventa , :pais , :ciudad , :codigopostal , :direccion , :telefono , :email , :responsablenombre , :responsabletelefono)";
        $params = ['nombrefranquicia' => $nombrefranquicia, 'nombrepuntoventa' => $nombrepuntoventa, 'pais' => $pais, 'ciudad' => $ciudad, 'codigopostal' => $codigopostal, 'direccion' => $direccion, 'telefono' => $telefono, 'email' => $email, 'responsablenombre' => $responsablenombre, 'responsabletelefono' => $responsabletelefono];
        return self::executeNonQuery($sqlstr, $params);
    }

    public static function updatePuntosventa($idpuntoventa, $nombrefranquicia, $nombrepuntoventa, $pais, $ciudad, $codigopostal, $direccion, $telefono, $email, $responsablenombre, $responsabletelefono)
    {

        $sqlstr = "UPDATE puntosventa SET nombrefranquicia = :nombrefranquicia, nombrepuntoventa = :nombrepuntoventa, pais = :pais, ciudad = :ciudad, codigopostal = :codigopostal, direccion = :direccion, telefono = :telefono, email = :email, responsablenombre = :responsablenombre, responsabletelefono = :responsabletelefono WHERE idpuntoventa = :idpuntoventa";
        $params = ['idpuntoventa' => $idpuntoventa, 'nombrefranquicia' => $nombrefranquicia, 'nombrepuntoventa' => $nombrepuntoventa, 'pais' => $pais, 'ciudad' => $ciudad, 'codigopostal' => $codigopostal, 'direccion' => $direccion, 'telefono' => $telefono, 'email' => $email, 'responsablenombre' => $responsablenombre, 'responsabletelefono' => $responsabletelefono];
        return self::executeNonQuery($sqlstr, $params);
    }

    public static function obtenerPorId($id)
    {
        $sqlstr = "SELECT * FROM puntosventa WHERE idpuntoventa = :id";
        $params = ['id' => $id];
        return self::obtenerUnRegistro($sqlstr, $params);
    }

    public static function deletePuntosventa($id)
    {
        $sqlstr = "DELETE  FROM puntosventa WHERE idpuntoventa = :id";
        $params = ['id' => $id];
        return self::executeNonQuery($sqlstr, $params);
    }
}
