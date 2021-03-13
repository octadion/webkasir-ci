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
                                    <input type="text" name="barcode" id="barcode" class="form-control" data-toggle="modal" data-target="#modal-item" autocomplete="off" autofocus>
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
                                    <button type="submit" id="add_chart" class="btn btn-primary">
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
                                <th width="10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="cart_table" id="cart_table">
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
                                    <input type="text" id="grand_total" class="form-control" readonly>
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
                            <div id="change_div">
                        <tr>
                                <td style="vertical-align: top">
                                    <label for="change">Change</label>
                                </td>
                                <td>
                                    <div>
                                        <input type="text" id="change" class="form-control" readonly>
                                    </div>
                                </td>
                        </tr>
                            </div>
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
                <button type="reset" id="cancel_payment" class="btn btn-flat btn-warning">
                    <i class="fa fa-refresh"></i> Cancel
                </button><br><br>
                <button type="submit" id="process_payment" class="btn btn-flat btn-lg btn-success">
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

 <div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Stock In Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width: 35%">Barcode</th>
                            <td><span id="barcode"></span></td>
                        </tr>
                        <tr>
                            <th>Item Name</th>
                            <td><span id="item_name"></span></td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td><span id="detail"></span></td>
                        </tr>
                        <tr>
                            <th>Qty</th>
                            <td><span id="supplier_name"></span></td>
                        </tr>
                        <tr>
                            <th>Discount Item</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td><span id="date"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 </div>

<script>

// don't touch me
var row_value = {}; // temporary
var no_value  = 0; 
var rows      = [];
var receipt   = {
    sub_total     : 0,
    discount_total: 0,
    grand_total   : 0,
    cash          : 0,
    change        : 0,
};

function grandTotal_subTotal_refresh(){
    receipt.sub_total   = parseInt(document.getElementById('sub_total').value);
    receipt.grand_total = receipt.sub_total - receipt.discount_total;
    tampil_grand_total  = (isNaN(receipt.grand_total) ? 0 : receipt.grand_total);

    receipt.grand_total < 0 ? $('#grand_total2').addClass("text-danger") : $('#grand_total2').removeClass("text-danger");
    $('#grand_total').val(tampil_grand_total);
    $('#grand_total2').text(tampil_grand_total);
}

function checkFirstRow(){
    // delete first row template if empty
    if(no_value == 0){
        var table = document.querySelectorAll('tbody.cart_table tr');
        if(typeof(table[0]) !== 'undefined'){ //kalo row 0 belom ada berarti gausah diremove
            table[0].remove();
        }
    }
}

$(document).ready(function () {
    $(document).on('click','#select',function(){
        row_value = {
            item_id_value  : $(this).data('id'),
            barcode_value  : $(this).data('barcode'),
            item_name_value: $(this).data('name'),
            price_value    : $(this).data('price'),
        }
        
        $('#item_id').val(row_value.item_id_value);
        $('#barcode').val(row_value.barcode_value);
        $('#modal-item').modal('hide');
     })

     $(document).on('click','#add_chart',function(){
        if($('#barcode').val()){

            // action update delete

            row_value.qty_value      = parseInt(document.getElementById('qty').value);
            row_value.discount_value = 0; // belom
            row_value.total_value    = parseInt(row_value.price_value) * parseInt(row_value.qty_value);
            // row_value.action_value   = action_value_html;

            // get table
            var tbodyRef = document.getElementById('table2').getElementsByTagName('tbody')[0];
            
            // delete first row template if empty
            checkFirstRow()

            // check if item already in
            var tbodyRowCount = document.getElementById("table2").tBodies[0].rows.length;
            var qty_after     = 0;
            var already_in    = false;
            for (i = 0; i < tbodyRowCount; i++) { 
                 var bc = $('#table2 tbody tr:eq('+i+') td:eq(1)').text();
                 if(row_value.barcode_value == bc && rows[i].barcode_value == bc){
                    already_in  = true;
                    qty_before  = parseInt($('#table2 tbody tr:eq('+i+') td:eq(4)').text());
                    qty_after   = qty_before + parseInt(row_value.qty_value);
                    total_after = qty_after * parseInt(row_value.price_value);
                    rows[i].qty_value = qty_after;
                    rows[i].total_value = total_after;
                    $('#table2 tbody tr:eq('+i+') td:eq(4)').text(qty_after);
                    $('#table2 tbody tr:eq('+i+') td:eq(6)').text(total_after);
                    break;
                 }
            }

            // hitung total
            var total_count = row_value.price_value * document.getElementById('qty').value;

            // input row
            if(already_in == false){
                no_value++;
                rows.push(row_value);
                $('#table2 > tbody').append('<tr class="row'+no_value+'">');
                for(const key in row_value){
                    if(key == 'item_id_value'){
                        $('#table2 > tbody > tr:last').append('<td>'+no_value+'</td>');
                        continue;
                    }
                    $('#table2 > tbody > tr:last').append('<td>'+row_value[key]+'</td>');
                }
                var action_value_html =  
                `
                    <button class="update_row btn btn-primary btn-xs" data-row="row`+no_value+`"><i class="fa fa-edit"></i> Edit</button>
                    <button class="delete_row btn btn-danger btn-xs" data-row="row`+no_value+`"><i class="fa fa-trash"></i> Hapus</button>
                `;
                $('#table2 > tbody > tr:last').append('<td>'+action_value_html+'</td>');
            }

            //sub total
            receipt.sub_total += parseInt(total_count);
            $('#sub_total').val(receipt.sub_total);

            // reset value
            $('#barcode').val('');
            $('#qty').val('1');

            // grand total
            grandTotal_subTotal_refresh()
            console.log(rows);
            console.log(receipt);
            console.log(row_value);
        }
     })

     $("#discount").on('keyup keypress change' ,function() {
        var edValue                = document.getElementById("discount");
            receipt.discount_total = isNaN(parseInt(edValue.value)) ? 0 : parseInt(edValue.value);
        grandTotal_subTotal_refresh();
        console.log(receipt);
     });

     $("#cash").on('keyup keypress change' ,function() {
        receipt.cash   = isNaN(parseInt(document.getElementById('cash').value)) ? 0 : parseInt(document.getElementById('cash').value);
        receipt.change = receipt.cash - receipt.grand_total;
        // receipt.change < 0 ? $('#change_div').addClass("has-error") : $('#change_div').removeClass("has-error");
        $('#change').val(receipt.change);
     });

     $("#cart_table").on('click','.delete_row',function(){
        row = $(this).data('row');
        row_barcode = $('#table2 tbody .'+row+' td:eq(1)').text();

        // subtotal - deleted data
        receipt.sub_total -= parseInt($('#table2 tbody .'+row+' td:eq(6)').text());

        // delete row
        $(this).closest("tr").remove();

        // find data in rows
        for( var i = 0; i < rows.length; i++ ) {
            $('#table2 tbody tr:eq('+i+') td:eq(0)').text(i+1);
            if( rows[i].barcode_value === row_barcode ) {
                rows.splice(i,1);
                // break;
            }
        }

        $('#sub_total').val(receipt.sub_total);
        grandTotal_subTotal_refresh();
     });

     $(document).on('click','#process_payment',function(){
        if(receipt.cash < receipt.grand_total){
            alert('duit kurang');
        }
        else if(receipt.grand_total < 1 || isNaN(receipt.grand_total) || isNaN(receipt.sub_total) || receipt.sub_total < 1 || rows.length < 0){
            alert('dih gajelas');
        }
        else{
            receipt.invoice     = <?= json_encode($invoice); ?>;
            receipt.customer_id = document.getElementById("customer").value;
            receipt.note        = document.getElementById("note").value;
            receipt.cart        = rows;
            receipt.date        = document.getElementById("date").value;
            receipt.user_id     = <?= json_encode($this->fungsi->user_login()->user_id) ?>;
            console.log(receipt);

            $.redirect("<?= base_url("sale/process_payment") ?>", receipt, "POST");
            
        }

     }); 



     // yg belom edit button, ux delete/change, process payment

     $(document).on('click','#cancel_payment',function(){
        rows      = [];
        row_value = [];
        receipt   = {};
        no_value  = 0;

        receipt.cash           = 0;
        receipt.change         = 0;
        receipt.discount_total = 0;
        receipt.grand_total    = 0;
        receipt.sub_total      = 0;
        receipt.date           = <?= json_encode(date('Y-m-d')) ?>

        $('#date').val(receipt.date);
        $('#barcode').val('');
        $('#qty').val('1');
        $('#customer').val('');
        $('#sub_total').val('');
        $('#discount').val(0);
        $('#grand_total').val('');
        $('#grand_total2').text('0');
        $('#cash').val(0);
        $('#change').val('');
        $('#note').val('');
        $("#table2 tbody tr").remove();

        var no_item_html =  
        `
            <tr>
                <td colspan="9" class="text-center">Tidak ada item</td>
            </tr>
        `;
        $('#table2 > tbody').append(no_item_html);

        console.log(receipt);
     }); 
  })
</script>