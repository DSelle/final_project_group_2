<div class="container">
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
        <a href="{{@BASE}}">
            <div class="col-sm-offset-2 col-sm-2 text-center box_body">
                <h4><strong>[ Home ]</strong></h4>
            </div>
        </a>
        </strong>
        <a href="{{@BASE}}/receipt">
            <div class="col-sm-offset-1 col-sm-2 col-sm-offset-1 text-center box_body">
                <h4><strong>[ Receipt ]</strong></h4>
            </div>
        </a>
        
        <a href="{{@BASE}}/cart">
            <div class="col-sm-2 col-sm-offset-1 text-center box_body">
                <h4><strong>[ Cart ]</strong></h4>
            </div>
        </a>        
    </div>
    
    <div class="row">
        <br><br>        
    </div>
    
    <div class="row">
        <repeat group="{{@menu}}" value="{{@menuItem}}">
            <div class="col-sm-4 menu_item bottom_pad">
                <div class="card card_body menu_item">
                    <img class="card-img-top" src="{{@menuItem['image_path']}}" alt="{{@menuItem['food_name']}} Image" width="100%">
                    
                    <div class="card-block small_pad">
                        <h4 class="card-title bot_border"><strong>{{@menuItem['food_name']}}</strong> - {{@menuItem['price']}}</h4>
                        <div class="card-text desc-pos">{{@menuItem['description']}}</div>
                    </div>
                    <div class="menu_button row-fluid fixed-bottom">
                        <form action="" method="POST" >
                        <div class="col-sm-4">
                            <input type="number" value="1" min="1" max="5" maxlength="1">
                        </div>
                        <div class="col-sm-offset-4 col-sm-4">
                            <input type="submit" value="Add" class="btn btn-default">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </repeat>
    </div>
    
    <div class="row the_foot">
        <div class="col-sm-12 sub_text text-center fixed-bottom">
        <p>© 2017 Trendy American Food Place Restaurants LLC.</p>
        <p>The Trendy American Food Place’s logo is a registered trademark and copyrighted work of Trendy American Food Place Restaurants LLC.</p>
        </div>
    </div>
    
</div>