
<section class="content-header">
    <h1>Report Sales
        <small>Laporan Penjualan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Report Sales</li>
        <li class="active">Reports</li>
    </ol>
 </section>
 <section class="content">
 <!-- <div class="box box-default">
    <div class="box-header">
        <h3 class="box-title">Filter Data</h3>
    </div>
            <div class="box box-widget">
                <div class="box-body">
                    <form action="" method="get" id="formsearch">
                    <table width="100%">
                        <tr>
                            <td>
                                <div class="form-group">
                                <label for="date">Date</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group input-group">
                    
                                    <input type="date" name="from"class="form-control" id="from" autofocus value="">
                                   
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                <label for="sd">s/d</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                <input type="date" id="to" name="to" autofocus class="form-control"value="">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                <label for="customer_name">Customer</label>
                                </div>
                            </td>
                            <td>
                            <div class="form-group input-group">
                                <select name="customer_name" id="customer_name" class="form-control" >
                                <option value="">- Pilih -</option>
                                    <?php foreach($customer as $key => $data) {?>
                                            <option value="<?=$data->name?>"><?=$data->name?></option>
                                    <?php } ?>
                                </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                <label for="invoice">Invoice</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                <input type="text"name="invoice" id="invoice" autofocus class="form-control">
                  
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="right:10;">
                            <div>
                     
                            <button type="submit"id="" valiue="submit" class="btn btn-flat btn-lg-4 btn-info">
                                    <i class="fa fa-search"></i> Filter
                                </button>
                                <a href="<?=site_url('report/sale')?>" class="btn btn-lg-4 btn-warning btn-flat">
                                    <i class="fa fa-undo"></i> Back
                                    </a>
                                </div>
                            </td>
                        </tr>
                        
                        
                    </table>
                    </form>
                </div>
            </div>
        
 </div> -->
 <div class="box">
     <div class="box-header">
     <h3 class="box-title">Data Penjualan</h3>
     <div class="input-daterange">
        <div class="form-group row">
        <br>
            <div class="col-md-2">
                <input type="text" name="start_date" id="start_date" class="form-control" />
            </div>
            <!-- <div class="input-group">
            <span class="input-group-text">to</span>
            </div> -->
            <div class="col-md-2">
                <input type="text" name="end_date" id="end_date" class="form-control" />
            </div>  
        </div>   
        </div>
        <div class="form-group">
            <div class="col-md-3">
        
                <input type="button" name="search" id="search" value="Search" class="btn btn-info" />
                <input type="button" name="reset" id="reset" value="Reset" class="btn btn-secondary" />
            </div>
            </div>
        <!-- <div style="text-align: right;">
        <a href="<?=base_url('report/export_excel')?>" class="btn btn-default"><i class="fa fa-print"> Export</i></a>
     <a href="<?=base_url('report/print_laporan')?>" id="print" class="btn btn-danger"><i class="fa fa-print">  Print</i></a>
        </div> -->
     </div>
     <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="tabel_report">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Invoice</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Discount</th>
                    <th>Grand Total</th>
                    <th>Detail</th>
                </tr>
               
            </thead>
            <tbody>
          
            <!-- <?php $no = 1;foreach($row as $key=> $data){ ?>
         
            <tr>
                    <td style="width: 5%;"><?=$no++?>.</td>
                    <td><?=$data->invoice?></td>
                    <td><?=$data->date?></td>
                    <td><?=$data->customer_name?></td>
                    <td><?=$data->total_price?></td>
                    <td><?=$data->discount?></td>
                    <td><?=$data->final_price?></td>
                    <td class="text-center" width="200px">
                    <a id="set_dtl"class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail"
                            data-invoice="<?=$data->invoice?>"
                            data-date="<?=$data->date?>"
                            data-customer="<?=$data->customer_name?>"
                            data-total="<?=$data->total_price?>"
                            data-discount="<?=$data->discount?>"
                            data-grandtotal="<?=$data->final_price?>"
                            data-note="<?=$data->note?>"
                            data-item_name="<?=$data->item_name?>"
                            data-price="<?=$data->item_price?>" >
                            <i class="fa fa-eye"></i> Detail
                        </a>
                    <a href="<?=site_url('report/cetak_invoice/'.$data->sale_id)?>" class="btn btn-info btn-xs" target="_blank">
                            <i class="fa fa-print"></i> Print
                        </a>
                        <a href="<?=site_url('unit/del/'.$data->sale_id)?>" id="btn-hapus" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                        
                    </td>
                   
                </tr>
                <?php } ?> -->
            </tbody>
        </table>
     </div>
     </div>
    
 </section>
 <div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin" id="tabel_report2">
                    <tbody>
                        <tr>
                            <th style="width: 35%">Invoice</th>
                            <td><span id="invoice2"></span></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><span id="date"></span></td>
                        </tr>
                        <tr>
                            <th>Customer</th>
                            <td><span id="customer_name2"></span></td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td><span id="total_price"></span></td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td><span id="discount"></span></td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td><span id="final_price"></span></td>
                        </tr>
                        <tr>
                            <th>Note</th>
                            <td><span id="note"></span></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
 </div>

 <script>
 $(document).ready(function () {
     $(document).on('click','#set_dtl',function(){
        var invoice = $(this).data('invoice');
        var date = $(this).data('date');
        var customer = $(this).data('customer');
        var total = $(this).data('total');
        var discount = $(this).data('discount');
        var grandtotal = $(this).data('grandtotal');
        var note = $(this).data('note');
        var id = $(this).data('sale_id');
      
        $('#invoice2').text(invoice);
        $('#date').text(date);
        $('#note').text(note);
        $('#customer_name2').text(customer);
        $('#total_price').text(total);
        $('#discount').text(discount);
        $('#final_price').text(grandtotal);
    
        getproduct(id);
        console.log(id);
    })
  })
</script>
<script>
$(document).ready(function () {
    datepicker();
    tables_load();
    // var changedInputs = [];
        $("#formsearch").submit(function(e){
            e.preventDefault();
            // let a = $(this).val();
            // console.log(a);
            // changedInputs.push(this.id);
            var customer_name = $("#customer_name").val();
            console.log(customer_name);
            var from = $("#from").val();
            var to = $("#to").val();
            var invoice = $("#invoice").val();
            if(customer_name != ''){
                filter_customer();
            }
            else if(from != '' && to != ''){
                filter_date();
            }
            else if(invoice != ''){
                filter_invoice();
            }

        });

    });
    getData();
    function getData(){
        $.ajax({
            type: 'POST',
            url : '<?=base_url()."report/getData"?>',
            dataype: JSON, 
            success:function(data){
                // console.log(data);
                var baris='';
                for(var i=0;i<data.length;i++){
                    baris += `<tr>
                    <td style="width: 5%;"><?=$no++?>.</td>
                    <td><?=$data->invoice?></td>
                    <td><?=$data->date?></td>
                    <td><?=$data->customer_name?></td>
                    <td><?=$data->total_price?></td>
                    <td><?=$data->discount?></td>
                    <td><?=$data->final_price?></td>
                    <td class="text-center" width="200px">
                    <a id="set_dtl"class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail"
                            data-invoice="<?=$data->invoice?>"
                            data-date="<?=$data->date?>"
                            data-customer="<?=$data->customer_name?>"
                            data-total="<?=$data->total_price?>"
                            data-discount="<?=$data->discount?>"
                            data-grandtotal="<?=$data->final_price?>"
                            data-note="<?=$data->note?>" >
                            <i class="fa fa-eye"></i> Detail
                        </a>
                    <a href="<?=site_url('report/cetak_invoice/'.$data->sale_id)?>" class="btn btn-info btn-xs" target="_blank">
                            <i class="fa fa-print"></i> Print
                        </a>
                        <a href="<?=site_url('unit/del/'.$data->sale_id)?>" id="btn-hapus" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                        
                    </td>
                   
                </tr>`;
                }
                $("#filter").DataTable({
                    bFilter: false
                });
                
            }
        });
    }
    function filter_customer(){
        var customer_name = $("#customer_name").val();
        $.ajax({
            url : "<?=base_url('report/filter_all')?>",
            data: "customer_name=" + customer_name,
            success:function(data){
                // $("#filter tbody").html('')
                // console.log(data);
                $("#filter tbody").html("<code>" + data + "</code>");
                $("#filter").DataTable();
                
            }
        });
    }
    function filter_date(){
        var from = $("#from").val();
        var to = $("#to").val();
        $.ajax({
            url : "<?=base_url('report/filter_all')?>",
            data: {from:from, to:to},
            success:function(data){
                // $("#filter tbody").html('')
                // console.log(data);
                $("#filter tbody").html("<code>" + data + "</code>");
                $("#filter").DataTable();
                
            }
        });
    }
    function filter_invoice(){
        var invoice = $("#invoice").val();
        $.ajax({
            url : "<?=base_url('report/filter_all')?>",
            data: "invoice=" + invoice,
            success:function(data){
                // $("#filter tbody").html('')
                // console.log(data);
                $("#filter tbody").html("<code>" + data + "</code>");
                $("#filter").DataTable();
                
            }
        });
    }
$(document).ready(function () {
    // var changedInputs = [];
        $("#print").click(function(e){
           e.preventDefault();
            // let a = $(this).val();
            // console.log(a);
            // changedInputs.push(this.id);
            var customer_name = $("#customer_name").val();
            console.log(customer_name);
            var from = $("#from").val();
            console.log(from);
            var to = $("#to").val();
            console.log(to);
            var invoice = $("#invoice").val();
            console.log(invoice);
            if(customer_name != ''){
                filter_customer();
                print_customer();
            }
            else if(from != '' && to != ''){
                filter_date();
                print_date();
            }
            else if(invoice != ''){
                filter_invoice();
                print_invoice();
            }
            else {
                print_all();
            }

        });

    });
    function print_date(){
            var from = $("#from").val();
            var to = $("#to").val();
        $.ajax({
       
           url : "<?=base_url('report/print_laporan')?>",
           data: {from:from, to:to},
       });
}
function print_customer(){
        var customer_name = $("#customer_name").val();
        $.ajax({
       
           url : "<?=base_url('report/print_laporan')?>",
           data: "customer_name=" + customer_name,
       });
}
function print_invoice(){
        var invoice = $("#invoice").val();
        $.ajax({
       
           url : "<?=base_url('report/print_laporan')?>",
           data: "invoice=" + invoice,
       });
}
function print_all(){
    $.ajax({
       
       url : "<?=base_url('report/print_laporan')?>"
   });
}
$(document).ready(function () {
        $("#reset").click(function(e){
           e.preventDefault();
          reset();

        });

    });

    function reset(){
        $('input[type="text"]').val('').change();
        $("#filter").DataTable().destroy();
    }
</script>
<script>

function tables_load(is_date_search, start_date='', end_date=''){
    $('#tabel_report').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax":{
            "url": "<?= site_url('report/get_ajax')?>",
            "type": "POST",
            "data":{
                is_date_search:is_date_search, start_date:start_date, end_date:end_date
            },
           
        },
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                footer:     true
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                footer:     true
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV',
                footer:     true
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF',
                footer:     true
            }
        ],
        "columnDefs": [
            {
                "targets": [0, -1],
                "orderable": false
            },
            {
                "targets":[-1],
                "className": 'dt-body-nowrap'
            }
        ]
    })
};
function datepicker(){
 $('.input-daterange').datepicker({
    todayBtn: 'linked',
    format: "yyyy-mm-dd",
    autoclose: true
    });
}

function reload_table(){
    $('#tabel_report').DataTable().draw( false );
}

$('#reset').click(function(){
    $('input[type="text"]').val('').change();
    $('#tabel_report').DataTable().destroy();
    tables_load();
      
    });

// fetch_data('no');

$('#search').click(function(){
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    console.log(start_date);
    
    if(start_date != '' && end_date !='')
    {
    $('#tabel_report').DataTable().destroy();
    tables_load('yes',start_date, end_date);
    }
    else
    {
    alert("Both Date is Required");
    }
    console.log(end_date);
 }); 
 function getproduct(id){
    var base_url = '<?= base_url(); ?>';
    //  console.log(id);
    //  base_url + 'frontend/peta/geo_wilayah_get?id=' + kecamatan_id
    $.ajax({
            type: 'GET',
            url: base_url + 'report/get_item_list/'+id,
            dataType: 'JSON',
            data: {
              
                id: id
            },
            success: function(res)  {
                // $(`#id`).val(res.id);
                console.log(res);
                product = [];
                product = res;
                let html = '';

                for (const pro of product) { 
                    html += `
                   
                    <tr>
                
                        <td>${pro.item_name}</td>
                        <td>${pro.item_price}</td>
                
                    </tr
                    `;

                }
                $('table#tabel_report2 tfoot').html(html);
                console.log(html);
    }
        });

}
</script>
