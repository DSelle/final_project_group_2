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
                
                //$type = $_POST['type'];
                //
                //$newMenu = getTypeMenu($type);
                //
                //$this->_f3->set('menu', $data);
                
                $item = array($_POST['item']=>$_POST['quantity']);
                
                //$_SESSION['currentCart'] = array();
                
                $_SESSION['currentCart'] += $item;
                
                //var_dump($_SESSION['currentCart']);
                //exit(0);
                
                $data = getMenu();
           
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
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                //validate inputs
                
                //send to db
                echo Template::instance()->render('view/receipt.php');
                session_unset();
            } else {
                
                $cartItems = array();
                $num = 1;
                $subtotal = 0;
                $tax;
                
                foreach($_SESSION['currentCart'] as $key => $value){
                    $eachItem = getItemById($key);
                    $total = $value * $eachItem['price'];
                    
                    $cartItems += array($key=> array('list_number'=>$num++,'food_name'=>$eachItem['food_name'], 'quantity'=>$value, 'total'=>$total));
                    
                    $subtotal += $total;
                }
                
                $tax = .065 * $subtotal;
                $finalTotal = $tax + $subtotal;
    
                $this->_f3->set('currentCart', $cartItems);
                $this->_f3->set('subtotal', $subtotal);
                $this->_f3->set('tax', round($tax,2));
                $this->_f3->set('endTotal', round($finalTotal,2));
                echo Template::instance()->render('view/cart.php');
            }           
        }
    }
?>