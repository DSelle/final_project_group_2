<?php
    require_once 'model/menu_db.php';
    require_once 'model/receipt_db.php';

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

                

                if(!isset($_SESSION['cart'])) {
                 
                    $_SESSION['cart'] = array();
                }
                
                $_SESSION['cart'][$_POST['item']] = $_POST['quantity'];
                
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
            
            
            $data = getAllReceipt();
            $this->_f3->set('receipt', $data);
            
            var_dump($data);
            echo '<br><br><br><br>';
        
            $itemNames = array();
            foreach($data as $aRow){
                
                $itemNames[] = $this->buildReceiptInfo($aRow['id']);
            }
            $this->_f3->set('itemNames', $itemNames);
            
            var_dump($itemNames);
            
            //buildReceiptInfo($id);
            
            
            echo Template::instance()->render('view/receipt.php');
        }

        public function cart()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                if(count($_SESSION['cart']) < 1){
                    
                    echo Template::instance()->render('view/cart.php');
                    
                } else{
                    //validate inputs                
                    $theKeys = array();
                    $theValues = array();
                    
                    foreach($_SESSION['cart'] as $key=>$value){
                        $theKeys[] =  $key;
                        $theValues[] = $value;
                    }
                    $stringKey = implode(",", $theKeys);
                    $stringValue = implode(",", $theValues);
                    
                    
                    //send to db 
                    $tableNumber = $_POST['table'];
                    $menuID = $stringKey;
                    $quantity = $stringValue;
                    $subtotal = $_POST['subtotal'];
                    $tax = $_POST['tax'];
                    $tip = $_POST['tip'];
                    $total = $tip+$tax+$subtotal;
                    
                    setReceipt($tableNumber, $menuID, $quantity, $subtotal, $tax, $tip, $total);
                    
                    session_unset();
                    
                    echo Template::instance()->render('view/home.php');
                }
                
            } else {

                $cartItems = array();
                $num = 1;
                $subtotal = 0;
                $tax;

                if(isset($_SESSION['cart'])){
                    
                    foreach($_SESSION['cart'] as $key=>$value){
                        $eachItem = getItemById($key);
                        $total = $value * $eachItem['price'];
     
                        $cartItems += array($key=> array('list_number'=>$num++,'food_name'=>$eachItem['food_name'], 'quantity'=>$value, 'total'=>$total));
     
                        $subtotal += $total;
                    } 
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
        
        public function buildReceiptInfo($id)
        {
            $theReceipt = getReceipt($id);            
            
            $itemNum = explode(",", $theReceipt['menu_item']);
            
            $menuItem = array();
            
            foreach($itemNum as $anItemNum){
                $menuItem[$anItemNum] = getItemById($anItemNum)['food_name'];
            }
            return $menuItem;
        }
    }
?>
