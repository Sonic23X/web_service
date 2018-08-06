
<?php
    require_once "api/Manager.php";
    $manager = new Manager();

    $servicio = $_GET['section'];

    switch ($servicio) {
      case 'productos':
        $manager->productos();
        break;
      case 'proveedores':
        echo "hi2\n";
        break;
      default:
        $array = array('error' => 'Se intenta acceder a un servicio que no existe');
        echo json_encode($array);
        break;
    }
?>
