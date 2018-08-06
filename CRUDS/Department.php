<?php

  require_once dirname( __DIR__ ) . "/bdd/Conection.php";

  class Department
  {

    function Select()
    {
      $parametros = func_get_args();
      $pdo = new Conection();
      if(count($parametros) == 0)
      {
        $select = $pdo->prepare("SELECT * FROM departamento");
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
          $select = $pdo->prepare("SELECT * FROM departamento WHERE id_departamento = ?");
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

        $insert = $pdo->prepare("INSERT INTO departamento VALUES (?, ?, ?)");
        $insert->bindparam(1, $datos["id_departamento"]);
        $insert->bindparam(2, $datos["departamento"]);
        $insert->bindparam(3, $datos["status"]);

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

        $update = $pdo->prepare("UPDATE departamento SET nombre=?, status=? WHERE id_departamento=?");
        $update->bindparam(1, $datos["nombre"]);
        $update->bindparam(2, $datos["status"]);
        $update->bindparam(3, $datos["id_departamento"]);

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

    function Delete($id = null)
    {
      if($id != null)
      {
        $pdo = new Conection();

        $select = $pdo->prepare("UPDATE departamento SET status=0 WHERE id_departamento = ?");
        $select->bindparam(1, $id);
        if($select->execute())
        {
          $status = array('Message' => 'Operacion exitosa');
          return json_encode($status);
        }
        else
        {
          $error = array('Error' => 'No se pudo deshabilitar el departamento');
          return json_encode($error);
        }
      }
    }
  }
