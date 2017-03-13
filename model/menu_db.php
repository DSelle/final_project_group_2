<?php
require_once 'connection.php';

function getMenu()
{
  $pdo = getConnection();

  $select = 'SELECT food_name, price, image_path FROM menu';
  $results = $pdo->query($select);

  $rows = $results->fetchAll(PDO::FETCH_ASSOC);

  return $rows;
}
?>
