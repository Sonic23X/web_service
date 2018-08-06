<?php

  class Conection extends PDO
  {
    private $tipo = "mysql";
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "ventas";

    function __construct()
    {
      try
      {
        parent::__construct($this->tipo .':host='. $this->host .';dbname='. $this->database, $this->user, $this->password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
      }
      catch(mysqli_sql_exception $e)
      {
        echo 'Error al conectar a la base de datos, ' . $e->getMessage();
      }
    }

  }
