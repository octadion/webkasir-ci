<section class="content-header">
    <h1>Stock Out
        <small>Barang Keluar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Transaction</li>
        <li class="active">Stock Out</li>
    </ol>
 </section>
<section class="content">
<?php //$this->view('message')?>
<div id="flash" data-flash="<?=$this->session->flashdata('success');?>"></div>
     <div class="box">
     <div class="box-header">
     <h3 class="box-title">Data Stock Out</h3>
     <br>
     <br>
     <div class="">
        <a href="<?=site_url('stock/out/add')?>" class="btn btn-success">
        <i class="fa fa-plus"></i> Create
        </a>
        <!-- <a href="" class="btn btn-warning" data-toggle="modal" data-target="#modal-create">
        <i class="fa fa-refresh"></i> Refresh
        </a> -->
     </div>
     <div class="">
       
     </div>
     <br>
     
     </div>
     <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Barcode</th>
                    <th>Product Item</th>
                    <th>Qty</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $no = 1;
                foreach($row as $key=> $data)
                { ?>
                <tr>
                    <td style="width: 5%;"><?=$no++?>.</td>
                    <td><?=$data->barcode?></td>
                    <td><?=$data->item_name?></td>
                    <td class="text-center"><?=$data->qty?></td>
                    <td class="text-center"><?=indo_date($data->date)?></td>
                    <td class="text-center" width="160px">
                    <a id="set_dtl"class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail"
                            data-barcode="<?=$data->barcode?>"
                            data-itemname="<?=$data->item_name?>"
                            data-detail="<?=$data->detail?>"
                            data-qty="<?=$data->qty?>"
                            data-date="<?=indo_date($data->date)?>">
                            
                            <i class="fa fa-eye"></i> Details
                        </a>
                        <a href="<?=site_url('stock/out/del/'.$data->stock_id.'/'.$data->item_id)?>" id="btn-hapus" class="btn btn-danger btn-xs">
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
                <h4 class="modal-title">Stock Out Detail</h4>
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
                            <th>Detail</th>
                            <td><span id="detail"></span></td>
                        </tr>
                        <tr>
                            <th>Qty</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><span id="date"></span></td>
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
        var barcode = $(this).data('barcode');
        var itemname = $(this).data('itemname');
        var detail = $(this).data('detail');
        var qty = $(this).data('qty');
        var date = $(this).data('date');
        $('#barcode').text(barcode);
        $('#item_name').text(itemname);
        $('#detail').text(detail);
        $('#qty').text(qty);
        $('#date').text(date);
        $('#detail').text(detail);
    })
  })
</script>