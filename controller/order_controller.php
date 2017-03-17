<?php
    require_once 'model/menu_db.php';

    class OrderController
    {
        private $_f3; //router

        public function __construct($f3)
        {
            $this->_f3 = $f3;
        }

        public function home()
        {
            echo Template::instance()->render('view/home.php');
        }

        public function menu()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $type = $_POST['type'];
                
                $newMenu = getTypeMenu($type);
                
                $this->_f3->set('menu', $data);
                
                echo Template::instance()->render('view/menu.php');
                
            }else{
                
                $data = getMenu();
           
                $this->_f3->set('menu', $data);
            
                echo Template::instance()->render('view/menu.php');
            }
            
        }

        public function receipt()
        {
            echo Template::instance()->render('view/receipt.php');
        }

        public function cart()
        {
            echo Template::instance()->render('view/cart.php');
        }
    }
?>
