<section class="content-header">
    <h1>Supplier
        <small>Pemasok Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Suppliers</li>
    </ol>
 </section>
<section class="content">
<?php //$this->view('message')?>
<!-- <div id="flash" data-flash="<?=$this->session->flashdata('success');?>"></div> -->
     <div class="box">
     <div class="box-header">
     <h3 class="box-title">Data Suppliers</h3>
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
        <table class="table table-bordered table-striped" id="table-supplier">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Description</th>
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
                <h4 class="modal-title">Supplier</h4>
            </div>
            <div class="modal-body">
            <form action="<?=base_url(('supplier/process_add'))?>" id="form_supplier" method="post">
            <div class="form-group">
                        <label>Supplier Name *</label>
                        <input type="hidden" name="id" >
                        <input type="text" name="supplier_name" id="name"   class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Phone *</label>
                        <input type="number" name="phone" id="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address *</label>
                        <textarea name="addr" class="form-control" id="address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" id="description" class="form-control"></textarea>
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
 <div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Supplier</h4>
            </div>
            <div class="modal-body">
            <form action="<?=site_url('supplier/edit')?>"  method="post">
            <div class="form-group">
                        <label>Supplier Name *</label>
                        <input type="hidden" name="id" >
                        <input type="text" name="supplier_name" id="name"   class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Phone *</label>
                        <input type="number" name="phone" id="phone"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address *</label>
                        <textarea name="addr" class="form-control" id="address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="desc" id="description" class="form-control"></textarea>
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
 <div class="modal fade" id="modal-import">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Import Supplier</h4>
            </div>
            <div class="modal-body">
            <?php echo 
           form_open_multipart('supplier/import',array('name' => 'spreadsheet'));
            ?>
            <div class="form-group">
                        <label>Import *</label>
                        <input type="hidden" name="id" >
                        <input type="file" name="upload_file" id="upload_file"   class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i>  Upload Excel
                        </button>
                       
                        
                    </div>

            </form>
            <?php echo form_close() ;?>
            </div>
        </div>
    </div>
 </div>
 <script>
    $("#table-supplier").DataTable({
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "ajax" : {
            "url" : "<?=site_url('supplier/get_json')?>",
            "type" : "POST"
        },
        "columns" : [
            { "data" : "no"},
            { "data" : "name" },
            { "data" : "phone" },
            { "data" : "address" },
            { "data" : "description" },
            { "data" : "action" },
        ],
        "columnDefs" : [
            { "target" : [0, 5], "orderable": false },
            { "target" : [2, -1], "className": "text-center" }
        ]
    })
 </script>
 <script>
$(function() {
        $("#form_supplier input, #form_supplier textarea").jqBootstrapValidation({

            preventSubmit: false,
            submitSuccess: function(form, event) {
                event.preventDefault();
                $.ajax({
                    url: "<?= base_url('supplier/process_add'); ?>",
                    type: 'POST',
                    data: new FormData($('#form_supplier')[0]),
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        // $(modalId).modal('hide');
                        // getEmployee();
                        Swal.fire(
                            res.title,
                            res.message,
                            res.status
                        );
                    }
                });
            },
            submitError: function(form, event, errors) {
                event.preventDefault();
            }
        });
    });

</script>