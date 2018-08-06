
<?php
    require_once "api/Manager.php";
    $manager = new Manager();

    if(isset($_GET['section']))
    {

      $servicio = $_GET['section'];

      switch ($servicio) {
        case 'productos':
          $manager->productos();
          break;
        case 'departamento':
          $manager->departamento();
          break;
        case 'empleados':
          $manager->empleados();
          break;
        case 'impuestos':
          $manager->impuestos();
          break;
        default:
          $array = array('error' => 'Se intenta acceder a un servicio que no existe');
          echo json_encode($array);
          break;
      }
    }
    else
    {
      //imprimir pagina de error 404

      $html = "<html>";
      $html .= "<head>";
      $html .= "<title>Error 404 </title>";
      $html .= "</head>";
      $html .= "<body>";
      $html .= "<h2>Error 404, page not found </h2>";
      $html .= "</body>";
      $html .= "</html>";

      echo $html;
    }
?>
