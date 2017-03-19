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
	   * Retrieves all menu items stored in the database
	   * @return Array Returns an array of entries from the database
	   */
		function getMenu()
		{
			$pdo = getConnection();
	
			$select = 'SELECT id, food_name, category, price, description, image_path FROM menu';
			$results = $pdo->query($select);
	
			$rows = $results->fetchAll(PDO::FETCH_ASSOC);
	
			return $rows;
		}

		/**
	   * Retrieves a single menu item from the database
	   * @param  String $id The id of the entry to retrieve
	   * @return Array     Returns an array containing the entry
	   */
		function getItemById($id)
		{
			$pdo = getConnection();

			$select = 'SELECT food_name, category, price, description, image_path
			FROM menu
			WHERE id=:id';

			$statement = $pdo->prepare($select);
			$statement->bindValue(':id', $id, PDO::PARAM_STR);
			$statement->execute();

			$rows = $statement->fetch(PDO::FETCH_ASSOC);

			return $rows;
		}

		/**
	   * Retrieves a category of menu items from the database
	   * @param  String $category The type of category to retrieve
	   * @return Array     Returns an array containing the entries
	   */
		function getTypeMenu($category)
		{
				//var_dump($foodType);
				//exit(0);
				$pdo = getConnection();

				$select = 'SELECT food_name, category, price, description, image_path
				FROM menu
				WHERE category=:category';

				$statement = $pdo->prepare($select);

				$statement->bindValue(':category', $category, PDO::PARAM_STR);
				//$statement->bindValue(':username', $username, PDO::PARAM_STR);//TODO remove
				$statement->execute();
				//var_dump($statement);
				//exit(0);

				$rows = $statement->fetch(PDO::FETCH_ASSOC);

				return $rows;
		}
?>
