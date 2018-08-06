<?php

  require_once dirname( __DIR__ ) . "/bdd/Conection.php";

  class Products
  {

    function Select()
    {
      $parametros = func_get_args();
      $pdo = new Conection();
      if(count($parametros) == 0)
      {
        $select = $pdo->prepare("SELECT * FROM productos");
        if($select->execute())
        {
          $res = $select->fetchAll(PDO::FETCH_ASSOC);
          return json_encode($res);
        }
        else
        {
          $error = array('error' => "Error al obtener la informacion");
          return json_encode($error);
        }
      }
      elseif (count($parametros) == 1) {
        if(is_numeric($parametros[0]))
        {
          $select = $pdo->prepare("SELECT * FROM productos WHERE codigo_barras = ?");
          $select->bindparam(1, $parametros[0]);
          if($select->execute())
          {
            $res = $select->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($res);
          }
          else
          {
            $error = array('error' => "Error al ejecutar la sentencia sql");
            return json_encode($error);
          }
        }
        else
        {
          $error = array('error' => "Error, verifique la informacion enviada");
          return json_encode($error);
        }
      }
      else
      {
        $error = array('error' => "Error, verifique que la informacion enviada sea correcta");
        return json_encode($error);
      }
    }

    function Insert($datos = null)
    {
      if($datos != null)
      {
        $pdo = new Conection();

        $insert = $pdo->prepare("INSERT INTO productos VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->bindparam(1, $datos["codigo_barras"]);
        $insert->bindparam(2, $datos["producto"]);
        $insert->bindparam(3, $datos["marca"]);
        $insert->bindparam(4, $datos["stock"]);
        $insert->bindparam(5, $datos["stock_control"]);
        $insert->bindparam(6, $datos["_id_medida"]);
        $insert->bindparam(7, $datos["_id_departamento"]);
        $insert->bindparam(8, $datos["costo_compra"]);
        $insert->bindparam(9, $datos["costo_venta"]);
        $insert->bindparam(10, $datos["status"]);

        if($insert->execute())
        {
          $status = array('Message' => 'Operacion exitosa');
          return json_encode($status);
        }
        else
        {
          $error = array('error' => 'No se pudo insertar el registro');
          return json_encode($error);
        }
      }
    }

    function Update($datos = null)
    {
      if($datos != null)
      {
        $pdo = new Conection();

        $insert = $pdo->prepare("UPDATE productos SET producto=?, marca=?, stock=?, stock_control=?, ".
                  "_id_medida=?, _id_departamento=?, costo_compra=?, costo_venta=?, status=? ".
                  "WHERE codigo_barras=?");
        $insert->bindparam(1, $datos["producto"]);
        $insert->bindparam(2, $datos["marca"]);
        $insert->bindparam(3, $datos["stock"]);
        $insert->bindparam(4, $datos["stock_control"]);
        $insert->bindparam(5, $datos["_id_medida"]);
        $insert->bindparam(6, $datos["_id_departamento"]);
        $insert->bindparam(7, $datos["costo_compra"]);
        $insert->bindparam(8, $datos["costo_venta"]);
        $insert->bindparam(9, $datos["status"]);
        $insert->bindparam(10, $datos["codigo_barras"]);

        if($insert->execute())
        {
          $status = array('Message' => 'Operacion exitosa');
          return json_encode($status);
        }
        else
        {
          $error = array('error' => 'No se pudo actualizar el registro');
          return json_encode($error);
        }
      }
    }

    function Delete($id = null)
    {
      if($id != null)
      {
        $pdo = new Conection();

        $select = $pdo->prepare("UPDATE productos SET status=0 WHERE codigo_barras = ?");
        $select->bindparam(1, $id);
        if($select->execute())
        {
          $status = array('Message' => 'Operacion exitosa');
          echo json_encode($status);
        }
        else
        {
          $error = array('error' => 'No se pudo deshabilitar el registro');
          $error_json = json_encode($error);
          echo $error_json;
        }
      }
    }
  }
