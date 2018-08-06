<?php

  require_once "CRUDS/Products.php";

  class Manager
  {
    public function productos()
    {
        header('Content-Type: application/JSON');
        $method = $_SERVER['REQUEST_METHOD'];
        $products = new Products();

        switch ($method)
        {
          case 'GET':
            if (isset($_GET['value']))
            {
              echo $products->Select($_GET['value']);
            }
            else
            {
              echo $products->Select();
            }
            break;
          case 'POST':
            $json = json_decode(file_get_contents('php://input')); //obtener json por post
            $array = (array)$json;
            if(empty($array))
            {
              $error = array('Error' => 'Error, no se recibio informacion ah agregar');
              echo json_encode($error);
            }
            elseif(
              isset($json->codigo_barras) and isset($json->producto) and isset($json->marca) and
              isset($json->stock) and isset($json->stock_control) and isset($json->_id_medida) and
              isset($json->_id_departamento) and isset($json->costo_compra) and isset($json->costo_venta) and
              isset($json->status)
              )
              echo $products->Insert($array);
            else
            {
              $error = array('Error' => 'Error, no se recibio informacion ah agregar');
              echo json_encode($error);
            }
            break;
          case 'PUT':
            $json = json_decode(file_get_contents('php://input')); //obtener json por post
            $array = (array)$json;
            if(empty($array))
            {
              $error = array('Error' => 'Error, no se recibio informacion ah agregar');
              echo json_encode($error);
            }
            elseif(
              isset($json->codigo_barras) and isset($json->producto) and isset($json->marca) and
              isset($json->stock) and isset($json->stock_control) and isset($json->_id_medida) and
              isset($json->_id_departamento) and isset($json->costo_compra) and isset($json->costo_venta) and
              isset($json->status)
              )
              echo $products->Update($array);
            else
            {
              $error = array('Error' => 'Error, no se recibio informacion ah agregar');
              echo json_encode($error);
            }
            break;
          case 'DELETE':
            if (isset($_GET['value']))
              echo $products->Delete($_GET['value']);
            else
            {
              $error = array('error' => 'Error, verifique parametros de entrada');
              echo json_encode($error);
            }
            break;
          default:
            $error = array('error' => 'La operacion que usted quiere realizar no existe');
            echo json_encode($error);
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
          if (isset($_GET['value']))
          {
            $select = $pdo->prepare("SELECT * FROM empleados WHERE id_empleados = ?");
            $select->bindparam(1, $_GET['value']);
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
          if (isset($_GET['value']))
          {
            $select = $pdo->prepare("UPDATE empleados SET status=0 WHERE id_empleados = ?");
            $select->bindparam(1, $_GET['value']);
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
          if (isset($_GET['value']))
          {
            $select = $pdo->prepare("SELECT * FROM departamento WHERE id_departamento = ?");
            $select->bindparam(1, $_GET['value']);
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
            $select = $pdo->prepare("SELECT * FROM departamento");
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
          if (isset($_GET['value']))
          {
            $select = $pdo->prepare("UPDATE departamento SET status=0 WHERE id_departamento = ?");
            $select->bindparam(1, $_GET['value']);
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

    public function impuestos()
    {
      // code...
    }

    public function privilegios()
    {
      // code...
    }

    public function medida()
    {
      // code...
    }

    public function usuarios()
    {
      // code...
    }

    public function ventas()
    {
      // code...
    }

    public function ventas_detalles()
    {
      // code...
    }

  }
