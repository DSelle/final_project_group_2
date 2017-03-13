<?php
    //referencing my autoloader and retrieving our router
    require_once 'vendor/autoload.php';
    $f3 = require_once 'vendor/bcosca/fatfree-core/base.php';

    //error handling
    $f3->set('DEBUG', 3);
    
    session_start();
    
    class Main
	{		
		function beforeroute()
		{
			//require_once 'view/plate.html';			
		}
		
		function afterroute()
		{
			//require_once 'view/plate_end.html';
		}
		
		function index($f3)
		{
			$controller = new OrderController($f3);
			$controller->home();			
		}
		
		function menu($f3)
		{
			$controller = new OrderController($f3);
			$controller->menu();			
		}
		
		function receipt($f3)
		{
			$controller = new OrderController($f3);
			$controller->receipt();			
		}
		
		function cart($f3)
		{
			$controller = new OrderController($f3);
			$controller->cart();			
		}
    }
    
    //routes
	$f3->route('GET /', 'Main->index');
	$f3->route('GET /menu', 'Main->menu');
	$f3->route('GET|POST /receipt', 'Main->receipt');
	$f3->route('GET|POST /cart', 'Main->cart');
    
    $f3->run();	
?>