<?php
	/**
	 * Central hub for MVC website
	 *
	 * PHP Version 7
	 *
	 * @author Nicholas Perez <nperez9@mail.greenriver.edu> Derrick Selle <dselle4@mail.greenriver.edu>
	 * @version 1.0
	 */
  
    //referencing my autoloader and retrieving our router
    require_once 'vendor/autoload.php';
    $f3 = require_once 'vendor/bcosca/fatfree-core/base.php';

    //error handling
    $f3->set('DEBUG', 3);

    session_start();
	
    /**
     * Wrapper class for fat-free routing
     */
    class Main
	{

		/**
		 * Includes header.html at the beginning of the page
		 */
		function beforeroute()
		{
			require_once 'view/header.html';
		}

		/**
		 * Includes footer.html at the end of the page
		 */
		function afterroute()
		{
			require_once 'view/footer.html';
		}

		/**
		 * Instantiates the controller and calls the home() function
		 * @param  template $f3  The fat-free template
		 */
		function index($f3)
		{
			$controller = new OrderController($f3);
			$controller->home();
		}

		/**
		 * Instantiates the controller and calls the menu() function
		 * @param  template $f3  The fat-free template
		 */
		function menu($f3)
		{
			$controller = new OrderController($f3);
			$controller->menu();
		}

		/**
		 * Instantiates the controller and calls the receipt() function
		 * @param  template $f3  The fat-free template
		 */
		function receipt($f3)
		{
			$controller = new OrderController($f3);
			$controller->receipt();
		}

		/**
		 * Instantiates the controller and calls the cart() function
		 * @param  template $f3  The fat-free template
		 */
		function cart($f3)
		{
			$controller = new OrderController($f3);
			$controller->cart();
		}
    }

    //defined routes
	$f3->route('GET /', 'Main->index');
	$f3->route('GET|POST /menu', 'Main->menu');
	$f3->route('GET|POST /receipt', 'Main->receipt');
	$f3->route('GET|POST /cart', 'Main->cart');

	//runs the route
    $f3->run();
?>
