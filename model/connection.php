<?php
/**
* Handles the connection to the database
*
* PHP Version 7
*
* @author Nicholas Perez <nperez9@mail.greenriver.edu> Derrick Selle <dselle4@mail.greenriver.edu>
* @version 1.0
*/

/**
 * Creates a connection to the database
 * @return object Returns a connection object that sends and retrieves data from the database
 */
function getConnection()
  {
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
