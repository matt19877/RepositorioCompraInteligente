<?php

include 'db.conf.inc';

function ObtenerCategoria($idProducto,$idPublicacion)
    {
    $success = false;
    $datos = array();
    $cantidad = 0;
    $db = connect_db();
    if ($db) {
        try {

            $query = "select * from categoria where pu1_id=$idProducto and pu2_id=$idPublicacion;";
            $db->query("SET CHARACTER SET utf8");
            $result = $db->query($query);
            while (is_object($result) && $row = $result->fetch_assoc()) {
                $dato = new stdClass();
                $dato->id = $row["cat_id"];
                $dato->nombre = $row['cat_nombre'];
                array_push($datos, $dato);
            }

            $result->free();
            $success = true;
            $db->close();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    $res = array(
        'success' => $success,
        'total' => $cantidad,
        'datos' => $datos
    );

    return $res;
}

function ObtenerPublicacion($idProducto)
    {
    $success = false;
    $datos = array();
    $cantidad = 0;
    $db = connect_db();
    if ($db) {
        try {

            $query = "select * from publicar2 where pu1_id=$idProducto;";
            $db->query("SET CHARACTER SET utf8");
            $result = $db->query($query);
            while (is_object($result) && $row = $result->fetch_assoc()) {
                $dato = new stdClass();
                $dato->id = $row["pu2_id"];
                $dato->nombre = $row['pu2_nombre'];
                array_push($datos, $dato);
            }

            $result->free();
            $success = true;
            $db->close();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    $res = array(
        'success' => $success,
        'total' => $cantidad,
        'datos' => $datos
    );

    return $res;
}
  

function ObtenerProductos() {
    $success = false;
    $datos = array();
    $cantidad = 0;
    $db = connect_db();
    if ($db) {
        try {

            $query = "select * from publicar1;";
            $db->query("SET CHARACTER SET utf8");
            $result = $db->query($query);
            while (is_object($result) && $row = $result->fetch_assoc()) {
                $dato = new stdClass();
                $dato->id = $row["pu1_id"];
                $dato->nombre = $row['pu1_nombre'];
                array_push($datos, $dato);
            }

            $result->free();
            $success = true;
            $db->close();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    $res = array(
        'success' => $success,
        'total' => $cantidad,
        'datos' => $datos
    );

    return $res;
}

function get_url_var($varname, $default = null) {
    $var = $default;
    if (isset($_POST[$varname]))
        $var = $_POST[$varname];

    if (isset($_GET[$varname]))
        $var = $_GET[$varname];
    return $var;
}

$operacion = get_url_var('operacion', '');
$json = new stdClass();
switch ($operacion) {
    case "consultarTipodeProducto":
        $json = ObtenerProductos();
        break;
    case "obtenerPublicaciones":
        $idProducto = get_url_var('idProducto', '');
        $json = ObtenerPublicacion($idProducto);
        break;
    case "obtenerCategoria":
        $idProducto = get_url_var('idTipo', '');
        $idPublicacion = get_url_var('idPublicacion', '');
        $json = ObtenerCategoria($idProducto,$idPublicacion);
        break;
     case "registrarArticculo":
         session_start('info');
         $idProducto = get_url_var('idTipo', '');
         $idPublicacion = get_url_var('idPublicacion', '');
         $json = ObtenerCategoria($idProducto,$idPublicacion);
        break;
}

if ($json != "") {
    header("Content-Type: application/json charset=utf-8");
    echo json_encode($json);
}
?>
