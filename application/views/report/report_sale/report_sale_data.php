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
 <div class="box box-default">
    <div class="box-header">
        <h3 class="box-title">Filter Data</h3>
    </div>
            <div class="box box-widget">
                <div class="box-body">
                    <form action="" method="post">
                    <table width="100%">
                        <tr>
                            <td>
                                <div class="form-group">
                                <label for="date">Date</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group input-group">
                    
                                    <input type="date" name="from"class="form-control" id="" autofocus value="">
                                   
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                <label for="sd">s/d</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                <input type="date" id="sd" name="to" autofocus class="form-control"value="">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                <label for="customer_name">Customer</label>
                                </div>
                            </td>
                            <td>
                            <div class="form-group input-group">
                                <select name="customer_name" class="form-control" >
                                <option value="">- Pilih -</option>
                                    <?php foreach($row as $key => $data) {?>
                                            <option value="<?=$data->customer_name?>"><?=$data->customer_name?></option>
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
                                <input type="text"name="invoice" id="" autofocus class="form-control">
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
                            <button type="reset" id="" class="btn btn-flat btn-lg-4 btn-default">
                                    <i class="fa fa-remove"></i> Reset
                                </button>
                            <button type="submit"id="" class="btn btn-flat btn-lg-4 btn-info">
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
        
 </div>
 <div class="box">
     <div class="box-header">
     <h3 class="box-title">Data Penjualan</h3>

     
     </div>
     <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table-reportsale">
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
                 <?php
                $no = 1;
                foreach($row as $key=> $data)
                { ?>
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
                   
                </tr>
                <?php
                }
                ?>
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
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width: 35%">Invoice</th>
                            <td><span id="invoice"></span></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><span id="date"></span></td>
                        </tr>
                        <tr>
                            <th>Customer</th>
                            <td><span id="customer_name"></span></td>
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
        $('#invoice').text(invoice);
        $('#date').text(date);
        $('#customer_name').text(customer);
        $('#total_price').text(total);
        $('#discount').text(discount);
        $('#final_price').text(grandtotal);
        $('#note').text(note);
    })
  })
</script>