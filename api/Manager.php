<?php

  //clases de las tablas
  require_once "CRUDS/Products.php";
  require_once "CRUDS/Staff.php";
  require_once "CRUDS/Department.php";
  require_once "CRUDS/Tax.php";

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
              echo $products->Select($_GET['value']);
            else
              echo $products->Select();
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
              $error = array('Error' => 'Error, no se recibio informacion ah actualizar');
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
      $staff = new Staff();

      switch ($method)
      {
        case 'GET':
          if (isset($_GET['value']))
            echo $staff->Select($_GET['value']);
          else
            echo $staff->Select();
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
            isset($json->id_empleados) and isset($json->nombre) and isset($json->apellidos) and
            isset($json->direccion) and isset($json->telefono) and isset($json->status)
            )
            echo $staff->Insert($array);
          else
          {
            $error = array('Error' => 'Error, no se recibio informacion a insertar');
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
            isset($json->id_empleados) and isset($json->nombre) and isset($json->apellidos) and
            isset($json->direccion) and isset($json->telefono) and isset($json->status)
            )
            echo $staff->Update($array);
          else
          {
            $error = array('Error' => 'Error, no se recibio informacion ah actualizar');
            echo json_encode($error);
          }
          break;
        case 'DELETE':
          if (isset($_GET['value']))
            echo $staff->Delete($_GET['value']);
          else
          {
            $error = array('error' => 'Error, verifique parametros de entrada');
            echo json_encode($error);
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
      $department = new Department();

      switch ($method)
      {
        case 'GET':
          if (isset($_GET['value']))
            echo $department->Select($_GET['value']);
          else
            echo $department->Select();
          break;
        case 'POST':
          $json = json_decode(file_get_contents('php://input')); //obtener json por post
          $array = (array)$json;
          if(empty($array))
          {
            $error = array('Error' => 'Error, no se recibio informacion ah agregar');
            echo json_encode($error);
          }
          elseif(isset($json->id_departamento) and isset($json->departamento) and isset($json->status))
            echo $department->Insert($array);
          else
          {
            $error = array('Error' => 'Error, no se recibio informacion a insertar');
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
          elseif(isset($json->id_departamento) and isset($json->departamento) and isset($json->status))
            echo $department->Update($array);
          else
          {
            $error = array('Error' => 'Error, no se recibio informacion ah actualizar');
            echo json_encode($error);
          }
          break;
        case 'DELETE':
          if (isset($_GET['value']))
            echo $department->Delete($_GET['value']);
          else
          {
            $error = array('error' => 'Error, verifique parametros de entrada');
            echo json_encode($error);
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
      header('Content-Type: application/JSON');
      $method = $_SERVER['REQUEST_METHOD'];
      $tax = new Tax();

      switch ($method)
      {
        case 'GET':
          if (isset($_GET['value']))
            echo $tax->Select($_GET['value']);
          else
            echo $tax->Select();
          break;
        case 'POST':
          $json = json_decode(file_get_contents('php://input')); //obtener json por post
          $array = (array)$json;
          if(empty($array))
          {
            $error = array('Error' => 'Error, no se recibio informacion ah agregar');
            echo json_encode($error);
          }
          elseif(isset($json->id_impuestos) and isset($json->impuesto))
            echo $tax->Insert($array);
          else
          {
            $error = array('Error' => 'Error, no se recibio informacion a insertar');
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
          elseif(isset($json->id_impuestos) and isset($json->impuesto))
            echo $tax->Update($array);
          else
          {
            $error = array('Error' => 'Error, no se recibio informacion ah actualizar');
            echo json_encode($error);
          }
          break;
        default:
          $error = array('error' => 'La operacion que usted quiere realizar no existe');
          $error_json = json_encode($error);
          echo $error_json;
          break;
      }
    }

    public function privilegios()
    {
      
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
