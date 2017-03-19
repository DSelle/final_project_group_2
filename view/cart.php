<div class="container ">
    <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
    
    <div class="row">
        <br><br><br><br>

        <div class="col-sm-12 box_body text-center">
            <h1><strong>[</strong> Trendy American Food Place <strong>]</strong></h1>
            <p>Est. 1437 B.C as a true example of American Cuisine</p>
            <br>
        </div>
        <br>
    </div>
    <div class="row">
        <br><br><br><br>
    </div>
    
    <div class="row">
        
        <a href="{{@BASE}}/menu">
            <div class="col-sm-offset-2 col-sm-2 text-center box_body">
                <h4><strong>[ Menu ]</strong></h4>
            </div>
        </a>
        
        <a href="{{@BASE}}/receipt">
            <div class="col-sm-2 col-sm-offset-1 text-center box_body">
                <h4><strong>[ Receipt ]</strong></h4>
            </div>
        </a>
        
        <a href="{{@BASE}}">
            <div class="col-sm-offset-1 col-sm-2 text-center box_body">
                <h4><strong>[ Home ]</strong></h4>
            </div>
        </a>
    </div>
    
    <div class="row">
        <br><br>        
    </div>
    
    <div class="row">
        <div class="col-sm-12 box_body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Menu Item</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <repeat group="{{@currentCart}}" value="{{@cartItem}}">
                        <tr>
                            <th scope="row">{{@cartItem['list_number']}}</th>
                            <td>{{@cartItem['food_name']}}</td>
                            <td>{{@cartItem['quantity']}}</td>
                            <td>{{@cartItem['total']}}</td>
                        </tr>
                    </repeat>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="row">
        <br><br>
        <div class="col-sm-2 box_body text-left">
                <p><strong>Subtotal: </strong>{{@subtotal}}</p>
                <p><strong>Tax: </strong>{{@tax}}</p>
                <p><strong>Total: </strong>{{@endTotal}}</p>
        </div>
        
        <div class="col-sm-8 cart_form_margin box_body text-left">
            <div class="row">
                
                <form action="" method="POST">                    
                    <div class="col-sm-2">
                        <div class="form-group">
                          <label for="table">Table Number</label>
                          <input name="table" type="number" value="1" max="15" min="1" maxlength="2" class="form-control" id="table">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                          <label for="tip">Tip</label>
                          <input name="tip" type="number" step="any" class="form-control" id="tip">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                        <br>
                        <button type="submit" class="btn btn-default pull-right">Checkout</button>
                        </div>    
                    </div>
                    <input type="hidden" name="tax" value="{{@tax}}">
                    <input type="hidden" name="subtotal" value="{{@subtotal}}">
                </form>
            </div>           
        </div>
    </div>
    
    <div class="row the_foot">
        <div class="col-sm-12 sub_text text-center fixed-bottom">
        <p>© 2017 Trendy American Food Place Restaurants LLC.</p>
        <p>The Trendy American Food Place’s logo is a registered trademark and copyrighted work of Trendy American Food Place Restaurants LLC.</p>
        </div>
    </div>
</div>