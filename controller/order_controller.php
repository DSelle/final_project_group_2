<?php
/**
* Handles all interactions between models and views
* 
* PHP Version 7
*
* @author Nicholas Perez <nperez9@mail.greenriver.edu> Derrick Selle <dselle4@mail.greenriver.edu>
* @version 1.0
*/

    require_once 'model/menu_db.php';
    require_once 'model/receipt_db.php';

    /**
     * Wrapper class for fat-free routing
     */
    class OrderController
    {
        private $_f3; //router

        /**
         * Constructor for OrderController
         * @param object $f3 The router object
         */
        public function __construct($f3)
        {
            $this->_f3 = $f3;
        }

        /**
         * Routes to home.php
         */
        public function home()
        {
            echo Template::instance()->render('view/home.php');
        }

        /**
         * Routes to menu.php and handles order submissions
         */
        public function menu()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {



                if(!isset($_SESSION['cart'])) {

                    $_SESSION['cart'] = array();
                }

                $_SESSION['cart'][$_POST['item-id']] = $_POST['quantity'];

                $data = getMenu();

                $this->_f3->set('menu', $data);

                echo Template::instance()->render('view/menu.php');

            }else{

                $data = getMenu();

                $this->_f3->set('menu', $data);

                echo Template::instance()->render('view/menu.php');
            }

        }

        /**
         * Routes to receipt.php and displays all receipts
         */
        public function receipt()
        {
            $data = getAllReceipt();
            $this->_f3->set('receipt', $data);

            $itemNames = array();
            foreach($data as $aRow){

                $itemNames[] = $this->buildReceiptItems($aRow['id']);
            }
            $this->_f3->set('itemNames', $itemNames);

            $itemQty = array();
            foreach($data as $aRow){

                $itemQty[] = $this->buildReceiptQuantity($aRow['id']);
            }
            $this->_f3->set('itemQty', $itemQty);

            echo Template::instance()->render('view/receipt.php');
        }

        /**
         * Routes to cart.php and displays current order
         */
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

        /**
         * Builds an array of menu items by name
         * @param  String $id The id of the receipt to get items from
         * @return array     The array of menu item names
         */
        private function buildReceiptItems($id)
        {
            $theReceipt = getReceipt($id);

            $itemNum = explode(",", $theReceipt['menu_item']);
            $num = 0;
            $menuItem = array();

            foreach($itemNum as $anItemNum){
                $menuItem[$num++] = getItemById($anItemNum)['food_name'];
            }
            return $menuItem;
        }

        /**
         * call this funtion to create a data structure that holds an inorder set of arrays
         * @param  String $id The id of the receipt to get quantities from
         * @return array     The array of menu item quantities and prices
         */
        private function buildReceiptQuantity($id)
        {
            $theReceipt = getReceipt($id);

            $quantities = explode(",", $theReceipt['item_quantity']);
            $itemNum = explode(",", $theReceipt['menu_item']);

            $num = 0;
            $foodPrice = array();

            foreach($quantities as $aQuantity){
                $mult = intval($aQuantity);
                $foodPrice[$num] = $aQuantity . "  - - - - - - - - - - $" . (getItemById($itemNum[$num])['price'] * $mult);
                $num++;
            }
            return $foodPrice;
        }
    }
?>
