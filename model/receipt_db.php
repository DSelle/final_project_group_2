<?php
require_once 'connection.php';

function getAllReceipt()
{
  $pdo = getConnection();

  $select = 'SELECT id, table_num, menu_item, item_quantity,
  sub_total, tax, tip, total
  FROM receipt';
  $results = $pdo->query($select);

  $rows = $results->fetchAll(PDO::FETCH_ASSOC);

  return $rows;
}

function getReceipt($id)
{
  $pdo = getConnection();

  $select = 'SELECT table_num, menu_item, item_quantity,
  sub_total, tax, tip, total
  FROM receipt
  WHERE id=:id';

  $statement = $pdo->prepare($select);

  $statement->bindValue(':id', $id, PDO::PARAM_STR);
  $statement->execute();

  $rows = $statement->fetch(PDO::FETCH_ASSOC);

  return $rows;
}
?>
