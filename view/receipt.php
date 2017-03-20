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

        <a href="{{@BASE}}">
            <div class="col-sm-offset-1 col-sm-2 text-center box_body">
                <h4><strong>[ Home ]</strong></h4>
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
        <div class="col-sm-12 box_body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Table Number</th>
                        <th>Tip</th>
                        <th>Total</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <set num='0'/>
                    <repeat group="{{@receipt}}" value="{{@aReceipt}}">
                        <tr>
                            <th scope="row">{{@aReceipt['id']}}</th>
                            <td>{{@aReceipt['table_num']}}</td>
                            <td>${{@aReceipt['tip']}}</td>
                            <td>${{@aReceipt['total']}}</td>
                            <td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal{{@aReceipt['id']}}">More Info</button>
                                <!-- Modal -->
                                <div id="myModal{{@aReceipt['id']}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Receipt #{{@aReceipt['id']}}</h4>
                                            </div>

                                            <div class="modal-body">
                                                <p>Item Name - - - - - - - Qty - - - - - - Price*Qty</p>
                                                <loop from="{{@i=0}}" to="{{@i< count(@itemNames[@num])}}" step="{{@i++}}">
                                                    <p>{{@itemNames[@num][@i]}} - - - - - - {{@itemQty[@num][@i]}}</p>
                                                </loop>
                                                <set num = "{{@num}} + 1">

                                                <br>
                                                <p>Subtotal: ${{@aReceipt['sub_total']}}</p>
                                                <p>Tax: ${{@aReceipt['tax']}}</p>
                                                <p>Tip: ${{@aReceipt['tip']}}</p>
                                                <p>Total: ${{@aReceipt['total']}}</</p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </repeat>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row the_foot">
        <div class="col-sm-12 sub_text text-center fixed-bottom">
        <p>© 2017 Trendy American Food Place Restaurants LLC.</p>
        <p>The Trendy American Food Place’s logo is a registered trademark and copyrighted work of Trendy American Food Place Restaurants LLC.</p>
        </div>
    </div>
</div>
