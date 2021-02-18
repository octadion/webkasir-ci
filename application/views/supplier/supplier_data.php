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
<div id="flash" data-flash="<?=$this->session->flashdata('success');?>"></div>
     <div class="box">
     <div class="box-header">
     <h3 class="box-title">Data Suppliers</h3>
     <div class="pull-right">
        <a href="<?=site_url('supplier/add')?>" class="btn btn-primary btn-flat">
        <i class="fa fa-plus"></i> Create
        </a>
     </div>
     
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
 <!-- <div class="modal fade" id="modalDelete">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Yakin akan menghapus data ini?</h4>
            </div>
            <div class="modal-footer">
            <form id="formDelete" action="" method="post">
                <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                <button class="btn btn-danger" type="submit">Hapus</button>
            </form>
            </div>
        </div>
    </div>
 </div> -->
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