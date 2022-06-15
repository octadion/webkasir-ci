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
<?php //$this->view('message')?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success');?>"></div>
     <div class="box">
     <div class="box-header">
     <h3 class="box-title">Data Products</h3>
     <br>
     <br>
     <div class="">
        <a href="<?=site_url('item/add')?>" class="btn btn-success"> 
        <i class="fa fa-plus"></i> Create
        </a>
        <!-- <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-import">
        <i class="fa fa-upload"></i> Import
        </a>
        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#modal-create">
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
                    <th>Name</th>
                    <th>Category</th>
                    <th>Unit</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
    
            </tbody>
        </table>
     </div>
     </div>
 </section>
 <div class="modal fade" id="modal-detail" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Product Image</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <img id="imagepreview" class="img" style="width:100%" src="" alt="">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
        
      </div>
      
    </div>
  </div>
 <script>
        $(document).ready(function(){
                $('#table1').DataTable({
                "processing": true,
                "serverSide": true,
                "scrollY":true,
                "ajax":{
                    "url": "<?= site_url('item/get_ajax')?>",
                    "type": "POST"
                },
                "columnDefs": [
                    {
                        "targets": [5, 6],
                        "classname": 'text-right'
                    },
                    {
                        "targets": [7, -1],
                        "classname": 'text-center'
                    },
                    {
                        "targets": [0, 7, -1],
                        "orderable": false
                    }
                ],
                "order": []
            })
        })

        </script>
        <script>
           $(document).ready(function () {
     $(document).on('click','#detail',function(){
        var image = $(this).data('image');
        var base_url = '<?= base_url(); ?>';
        console.log(image);
        $('#imagepreview').attr('src',base_url+'uploads/product'+'/'+image);
    })
  })
        </script>
        