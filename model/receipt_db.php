<?php
  /**
   * Handles interactions with the receipt database
   *
   * PHP Version 7
   *
   * @author Nicholas Perez <nperez9@mail.greenriver.edu> Derrick Selle <dselle4@mail.greenriver.edu>
   * @version 1.0
   */

  require_once 'connection.php';

  /**
   * Retrieves all receipts stored in the database
   * @return Array Returns an array of entries from the database
   */
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

  /**
   * Retrieves a single receipt from the database
   * @param  String $id The id of the entry to retrieve
   * @return Array     Returns an array containing the entry
   */
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
