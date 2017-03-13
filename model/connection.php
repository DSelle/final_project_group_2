<?php
  function getConnection()
  {
    //$dsn = 'mysql:host=http://dselle4.greenrivertech.net;dbname=dselle4_it_328_final';
    $dsn = 'mysql:host=localhost;dbname=dselle4_it_328_final';
    $userName = 'dselle4_328final';
    $password = '@c3p)f}66M2?';

    try {
        $connection = new PDO($dsn, $userName, $password);

        //throw an exception is PDO has trouble connecting...
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (PDOException $ex) {
        echo 'Exception connecting to DB: '.$ex->getMessage();
        exit();
    }
  }
?>
