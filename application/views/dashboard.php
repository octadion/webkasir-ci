<style>
#header-toko{
	padding: 20px 30px; background: #a7c9f9; z-index: 999999; font-size: 16px;
	
}
</style>
<div id="header-toko" ><b>MYKASIR</b>
<br><small>Phicos Group
Surakarta</small></div>
<?=print_r($data)?>
<?=print_r(['total_penjualan'])?>
<section class="content">
<div class="row">
  <div class="col-md-12">

              </div>
              <?php if($this->fungsi->user_login()->level ==1) { ?>
<div class="col-lg-3 col-xs-6">
  
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$this->fungsi->count_item()?></h3>

              <p>Item</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$this->fungsi->count_supplier()?><sup style="font-size: 20px"></sup></h3>

              <p>Supplier</p>
            </div>
            <div class="icon">
              <i class="ion-android-list"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$this->fungsi->count_customer()?></h3>

              <p>Customers</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$this->fungsi->count_user()?></h3>

              <p>Users</p>
            </div>
            <div class="icon">
              <i class="ion-android-people"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php } ?>
      
        <!-- /.col -->
      </div>
   
      <div class="col-md-8">
      <!-- <div class="form-group">
      <div class="form-group input-group">
      <form action="" method="get" id="formsearch">
                                    <input type="date" name="from"class="form-control" id="from" autofocus value="">
                                   
                                </div>
                                <div class="form-group">
                                <label for="sd">s/d</label>
                                </div>
                                <div class="form-group input-group">
                                <input type="date" id="to" name="to" autofocus class="form-control"value="">
                                <button type="submit"id="" valiue="submit" class="btn btn-flat btn-lg-4 btn-info right">
                                    <i class="fa fa-search"></i> Filter
                                </button>
      </form>                </div>
      </div> -->
      <div class="box box-success">
      <div class="pull-right box-tools">
      <!-- <div class="col-md-2"> -->
     
      <!-- </div> -->
              </div>
      <div class="row">
      
      
          <div id="item"></div>
        
      </div>
      </div>
      </div>
      <div class="col-md-4">
      <div class="box box-warning box solid">
            <div class="box-header with-border">
              <h3 class="box-title">Stock Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                    <th>Items</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
    
            </tbody>
        </table>
     </div>
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
          </div>
      </div>
      <!-- /.row -->
      <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<!-- <script type="text/javascript" charset="utf8" src="/js/jquery.dataTables.js"></script> -->
 </section>
 <script>
        $(document).ready(function(){
                $('#table1').DataTable({
                  "bFilter": false,
                  "lengthChange":false,
                "processing": true,
                "serverSide": true,
                "pageLength": 4,
                "ajax":{
                    "url": "<?= site_url('dashboard/stock')?>",
                    "type": "POST"
                },
               
                "order": []
            })
        })

        </script>
    <script>
  $(document).ready(function () {
    //$('.sidebar-menu').tree()
     $('#table1').DataTable()
    //  grafik('item');
  
        Morris.Bar({
          element: 'item',
          data: <?php echo $data;?>,
          xkey: 'datetime',
          ykeys: ['total', 'total_penjualan'],
          labels: ['total', 'total_penjualan']
        });
  
  })
</script>