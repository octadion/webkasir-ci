<section class="content-header">
    <h1>Item
        <small>Data Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Items</li>
    </ol>
 </section>
<section class="content">
     
     <div class="box">
     <div class="box-header">
     <h3 class="box-title">Image Detail<i class="fa fa-image"></i></h3>
     <div class="pull-right">
        <a href="<?=site_url('item')?>" class="btn btn-warning btn-flat btn-sm">
        <i class="fa fa-undo"></i> Back
        </a>
     </div>
     
     </div>
     <div class="box-body">
        
        <img src="<?=base_url('uploads/product/'.$row->image.'.')?>" style="width: 500px">
        
        <br>
        <?=$row->image?>
        <br><br>
        <!-- <a href="<?=site_url('item/barcode_print/'.$row->item_id)?>" target="_blank"class="btn btn-default btn-sm">
            <i class="fa fa-print"></i> Print
        </a> -->

     </div>
     </div>
 </section>