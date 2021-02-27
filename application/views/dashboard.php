<style>
#header-toko{
	padding: 20px 30px; background: #a7c9f9; z-index: 999999; font-size: 16px;
	
}
</style>
<div id="header-toko" ><b>MYKASIR</b>
<br><small>Phicos Group
Surakarta</small></div>

<section class="content">
<div class="row">
  <div class="col-md-12">

              </div>
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
      
        <!-- /.col -->
      </div>
      <div class="col-md-8">
      <div class="box box-success">
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
