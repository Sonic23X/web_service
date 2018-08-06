<?php

  require_once "bdd/Conection.php";

  class Manager
  {
    public function productos()
    {
        header('Content-Type: application/JSON');
        $method = $_SERVER['REQUEST_METHOD'];
        $pdo = new Conection();

        switch ($method)
        {
          case 'GET':
            if (isset($_GET['id']))
            {
              $select = $pdo->prepare("SELECT * FROM productos WHERE codigo_barras = ?");
              $select->bindparam(1, $_GET['id']);
              if($select->execute())
              {
                $res = $select->fetchAll(PDO::FETCH_ASSOC);
                $json = json_encode($res);
                echo $json;
              }
              else
              {
                $erroy = array('error' => 'No se puede acceder a la base de datos');
                echo json_encode($erroy);
              }
            }
            else
            {
              $select = $pdo->prepare("SELECT * FROM productos");
              $select->setFetchMode(PDO::FETCH_ASSOC);
              if($select->execute())
              {
                $json = $select->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($json);
              }
              else
              {
                $erroy = array('error' => 'No se puede acceder a la base de datos');
                echo json_encode($erroy);
              }
            }
            break;
          case 'POST':

            break;
          case 'PUT':

              break;
          case 'DELETE':
            if (isset($_GET['id']))
            {
              $select = $pdo->prepare("DELETE FROM productos WHERE codigo_barras = ?");
              $select->bindparam(1, $_GET['id']);
              if($select->execute())
              {
                $status = array('Message' => 'Operacion exitosa');
              }
              else
              {
                $error = array('error' => 'No se pudo deshabilitar el registro');
                $error_json = json_encode($error);
                echo $error_json;
              }
            }
            break;
          default:
            $error = array('error' => 'La operacion que usted quiere realizar no existe');
            $error_json = json_encode($error);
            echo $error_json;
            break;
        }
    }

    public function empleados()
    {
      header('Content-Type: application/JSON');
      $method = $_SERVER['REQUEST_METHOD'];
      $pdo = new Conection();

      switch ($method)
      {
        case 'GET':
          if (isset($_GET['id']))
          {
            $select = $pdo->prepare("SELECT * FROM empleados WHERE id_empleados = ?");
            $select->bindparam(1, $_GET['id']);
            if($select->execute())
            {
              $res = $select->fetchAll(PDO::FETCH_ASSOC);
              $json = json_encode($res);
              echo $json;
            }
            else
            {
              $erroy = array('error' => 'No se puede acceder a la base de datos');
              echo json_encode($erroy);
            }
          }
          else
          {
            $select = $pdo->prepare("SELECT * FROM empleados");
            $select->setFetchMode(PDO::FETCH_ASSOC);
            if($select->execute())
            {
              $json = $select->fetchAll(PDO::FETCH_ASSOC);
              echo json_encode($json);
            }
            else
            {
              $erroy = array('error' => 'No se puede acceder a la base de datos');
              echo json_encode($erroy);
            }
          }
          break;
        case 'POST':

          break;
        case 'PUT':

            break;
        case 'DELETE':
          if (isset($_GET['id']))
          {
            $select = $pdo->prepare("DELETE FROM empleados WHERE id_empleados = ?");
            $select->bindparam(1, $_GET['id']);
            if($select->execute())
            {
              $status = array('Message' => 'Operacion exitosa');
            }
            else
            {
              $error = array('error' => 'No se pudo deshabilitar el registro');
              $error_json = json_encode($error);
              echo $error_json;
            }
          }
          break;
        default:
          $error = array('error' => 'La operacion que usted quiere realizar no existe');
          $error_json = json_encode($error);
          echo $error_json;
          break;
      }
    }

    public function departamento()
    {
      header('Content-Type: application/JSON');
      $method = $_SERVER['REQUEST_METHOD'];
      $pdo = new Conection();

      switch ($method)
      {
        case 'GET':
          if (isset($_GET['id']))
          {
            $select = $pdo->prepare("SELECT * FROM empleados WHERE id_empleados = ?");
            $select->bindparam(1, $_GET['id']);
            if($select->execute())
            {
              $res = $select->fetchAll(PDO::FETCH_ASSOC);
              $json = json_encode($res);
              echo $json;
            }
            else
            {
              $erroy = array('error' => 'No se puede acceder a la base de datos');
              echo json_encode($erroy);
            }
          }
          else
          {
            $select = $pdo->prepare("SELECT * FROM empleados");
            $select->setFetchMode(PDO::FETCH_ASSOC);
            if($select->execute())
            {
              $json = $select->fetchAll(PDO::FETCH_ASSOC);
              echo json_encode($json);
            }
            else
            {
              $erroy = array('error' => 'No se puede acceder a la base de datos');
              echo json_encode($erroy);
            }
          }
          break;
        case 'POST':

          break;
        case 'PUT':

            break;
        case 'DELETE':
          if (isset($_GET['id']))
          {
            $select = $pdo->prepare("UPDATE empleados SET status=084 WHERE id_empleados = ?");
            $select->bindparam(1, $_GET['id']);
            if($select->execute())
            {
              $status = array('Message' => 'Operacion exitosa');
            }
            else
            {
              $error = array('error' => 'No se pudo deshabilitar el registro');
              $error_json = json_encode($error);
              echo $error_json;
            }
          }
          break;
        default:
          $error = array('error' => 'La operacion que usted quiere realizar no existe');
          $error_json = json_encode($error);
          echo $error_json;
          break;
      }
    }

  }
