<section class="content-header">
    <h1>Sales
        <small>Penjualan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Transaction</li>
        <li class="active">Sale</li>
    </ol>
 </section>

 <section class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top">
                                <label for="date">Date</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" name="" id="date" value="<?=date('Y-m-d')?>" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; width: 30%">
                                <label for="user">Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="" id="user" value="<?=$this->fungsi->user_login()->name?>" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="customer">Customer</label>
                            </td>
                            <td>
                                <div>
                                <select name="" id="customer" class="form-control">
                                    <option value="">Umum</option>
                                    <?php foreach($customer as $cust => $value){
                                        echo '<option value="'.$value->customer_id.'">'.$value->name.'</option>';
                                        }?>
                                </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width:30%">
                                <label for="barcode">Barcode</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="hidden" name="item_id" id="item_id">
                                    <input type="hidden" name="price" id="price">
                                    <input type="hidden" name="stock" id="stock">
                                    <input type="hidden" name="item_name" id="item_name">
                                    <input type="text" name="barcode" id="barcode" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button> 
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="qty">Qty</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="qty" value="1" min="1" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <button type="button" id="add_chart" class="btn btn-primary">
                                        <i class="fa fa-cart-plus"></i> Add
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <div align="right">
                        <h4>Invoice <b><span id="invoice"><?= $invoice?></span></b></h4>
                        <h1><b><span id="grand_total2" style="font-size: 50pt">0</span></b></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Product Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th width="10%">Discount Item</th>
                                <th width="15%">Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="cart_table">
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada item</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="sub_total">Sub Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="sub_total" value="" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="discount">Discount</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="discount" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                           <td style="vertical-align:top">
                                <label for="grand_total">Grand Total</label>
                           </td> 
                           <td>
                                <div class="form-group">
                                    <input type="number" id="grand_total" class="form-control" readonly>
                                </div>
                           </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width: 30%">
                                <label for="cash">Cash</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="cash" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="change">Change</label>
                            </td>
                            <td>
                                <div>
                                    <input type="number" id="change" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top">
                                <label for="note">Note</label>
                            </td>
                            <td>
                                <div>
                                <textarea id="note" rows="3" class="form-control"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div>
                <button id="cancel_payment" class="btn btn-flat btn-warning">
                    <i class="fa fa-refresh"></i> Cancel
                </button><br><br>
                <button id="process_payment" class="btn btn-flat btn-lg btn-success">
                    <i class="fa fa-paper-plane-0"></i> Process Payment
                </button>
            </div>
        </div>

    </div>

 </section>

 <div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Select Product Item</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($item as $i => $data){?>
                        <tr>
                            <td><?=$data->barcode?></td>
                            <td><?=$data->name?></td>
                            <td><?=$data->unit_name?></td>
                            <td class="text-right"><?=indo_currency($data->price)?></td>
                            <td class="text-right"><?=$data->stock?></td>
                            <td class="text-right">
                                <button class="btn btn-xs btn-info" id="select"
                                data-id="<?=$data->item_id?>"
                                data-barcode="<?=$data->barcode?>"
                                data-name="<?=$data->name?>"
                                data-price="<?=$data->price?>" >
                                    <i class="fa fa-check"></i> Select
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 </div>

<script>
$(document).ready(function () {
    var sub_total = 0;
    var item_id_value = null;
    var barcode_value = null;
    var item_name_value = null;
    var price_value =  null;

    $(document).on('click','#select',function(){
        item_id_value = $(this).data('id');
        barcode_value = $(this).data('barcode');
        item_name_value = $(this).data('name');
        price_value =  $(this).data('price');
        $('#item_id').val(item_id_value);
        $('#price').val(price_value);
        $('#barcode').val(barcode_value);
        $('#item_name').val(item_name_value);
        $('#modal-item').modal('hide');
        console.log(barcode_value);
     })
     $(document).on('click','#add_chart',function(){
        var tbodyRef = document.getElementById('table2').getElementsByTagName('tbody')[0];

        // Insert a row at the end of table
        var newRow = tbodyRef.insertRow();

        // Insert a cell at the end of the row
        var no = newRow.insertCell();
        var barcode = newRow.insertCell();
        var item_name = newRow.insertCell();
        var price = newRow.insertCell();
        var qty = newRow.insertCell();
        var discount = newRow.insertCell();
        var total = newRow.insertCell();
        var action = newRow.insertCell();

        // hitung total
        var total_count = document.getElementById('price').value * document.getElementById('qty').value;

        // Append a text node to the cell
        var no_value = document.createTextNode('1234');
        barcode_value = document.createTextNode(barcode_value);
        item_name_value = document.createTextNode(item_name_value);
        price_value =  document.createTextNode(price_value);
        qty_value =  document.createTextNode(document.getElementById('qty').value);
        var discount_value = document.createTextNode('0');
        var total_value = document.createTextNode(total_count);
        var action_value = document.createTextNode('1234');

        no.appendChild(no_value);
        barcode.appendChild(barcode_value);
        item_name.appendChild(item_name_value);
        price.appendChild(price_value);
        qty.appendChild(qty_value);
        discount.appendChild(discount_value);
        total.appendChild(total_value);
        action.appendChild(action_value);


        //sub total
        sub_total += parseInt(total_count);
        $('#sub_total').val(sub_total);

        console.log(sub_total);

        //grand total
        
        
     })
  })
</script>