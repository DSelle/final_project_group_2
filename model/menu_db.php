<?php
		require_once 'connection.php';

		function getMenu()
		{
				$pdo = getConnection();

				$select = 'SELECT id, food_name, category, price, description, image_path FROM menu';
				$results = $pdo->query($select);

				$rows = $results->fetchAll(PDO::FETCH_ASSOC);

				return $rows;
		}

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
