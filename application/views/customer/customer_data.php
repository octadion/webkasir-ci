<section class="content-header">
    <h1>Customer
        <small>Pelanggan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Customers</li>
    </ol>
 </section>
<section class="content">
<?php //$this->view('message')?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success');?>"></div>
     <div class="box">
     <div class="box-header">
     <h3 class="box-title">Data Customers</h3>
     <br>
     <br>
     <div class="">
        <a href="" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
        <i class="fa fa-plus"></i> Create
        </a>
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-import">
        <i class="fa fa-upload"></i> Import
        </a>
        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#modal-create">
        <i class="fa fa-refresh"></i> Refresh
        </a>
     </div>
     <div class="">
       
     </div>
     <br>
     
     </div>
     <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table-customer">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
     </div>
     </div>
 </section>
 <div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Create Customer</h4>
            </div>
            <div class="modal-body">
            <form action="<?=site_url('customer/process_add')?>" method="post">
                    <div class="form-group">
                        <label>Customer Name *</label>
                        <input type="hidden" name="id">
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phone *</label>
                        <input type="number" name="phone" value="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address *</label>
                        <textarea name="addr" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i>  Save
                        </button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </div>
 <script>
    $("#table-customer").DataTable({
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "ajax" : {
            "url" : "<?=site_url('customer/get_json')?>",
            "type" : "POST"
        },
        "columns" : [
            { "data" : "no", width:40},
            { "data" : "name", width:150 },
            { "data" : "gender", width:70 },
            { "data" : "phone", width:120 },
            { "data" : "address", width:150 },
            { "data" : "action", width:100 },
        ],
        "columnDefs" : [
            { "target" : [0, 5], "orderable": false },
            { "target" : [2, -1], "className": "text-center" }
        ]
    })
 </script>
 <script>
 $(document).ready(function () {
     $(document).on('click','#modal-create',function(){
        var customername= $(this).data('customername');
        var gender = $(this).data('gender');
        var address = $(this).data('address');
        var phone = $(this).data('phone');
        $('#customer_name').text(customername);
        $('#phone').text(phone);
        $('#addr').text(address);
        $('#gender').text(gender);
      
    })
  })
</script>