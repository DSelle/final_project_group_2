<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <p>Menu Page</p>

            <ul>
                <li><a href="{{@BASE}}">HOME</a></li>
                <li><a href="{{@BASE}}/menu">MENU</a></li>
                <li><a href="{{@BASE}}/receipt">RECEIPT</a></li>
                <li><a href="{{@BASE}}/cart">CART</a></li>
            </ul>
        </div>
        
    </div>
    <div class="row">
        <repeat group="{{@menu}}" value="{{@menuItem}}">
            <div class="col-sm-3 col-sm-offset-1 menu_item bottom_pad">
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
</div>