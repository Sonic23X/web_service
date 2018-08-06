<?php

  require_once dirname( __DIR__ ) . "/bdd/Conection.php";

  class Tax
  {

    function Select()
    {
      $parametros = func_get_args();
      $pdo = new Conection();
      if(count($parametros) == 0)
      {
        $select = $pdo->prepare("SELECT * FROM impuestos");
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
          $select = $pdo->prepare("SELECT * FROM impuestos WHERE id_impuestos = ?");
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

        $insert = $pdo->prepare("INSERT INTO impuestos VALUES (?, ?)");
        $insert->bindparam(1, $datos["id_impuestos"]);
        $insert->bindparam(2, $datos["impuesto"]);

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

        $update = $pdo->prepare("UPDATE impuestos SET impuesto=? WHERE id_impuestos=?");
        $update->bindparam(1, $datos["impuesto"]);
        $update->bindparam(2, $datos["id_impuestos"]);

        if($update->execute())
        {
          $status = array('Message' => 'Operacion exitosa');
          return json_encode($status);
        }
        else
        {
          $error = array('Error' => 'No se pudo actualizar el registro');
          return json_encode($error);
        }
      }
    }


  }
