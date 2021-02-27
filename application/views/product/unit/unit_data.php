<section class="content-header">
    <h1>Unit
        <small>Satuan Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">units</li>
    </ol>
 </section>
<section class="content">
<?php //$this->view('message')?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success');?>"></div>
     <div class="box">
     <div class="box-header">
     <h3 class="box-title">Data Units</h3>
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
        <table class="table table-bordered table-striped" id="table-unit">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- <?php
                $no = 1;
                foreach($row->result() as $key=> $data)
                { ?>
                <tr>
                    <td style="width: 5%;"><?=$no++?>.</td>
                    <td><?=$data->name?></td>
                    <td class="text-center" width="160px">
                    <a href="<?=site_url('unit/edit/'.$data->unit_id)?>" class="btn btn-primary btn-xs">
                            <i class="fa fa-pencil"></i> Update
                        </a>
                        <a href="<?=site_url('unit/del/'.$data->unit_id)?>" id="btn-hapus" class="btn btn-danger btn-xs">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                        
                    </td>
                   
                </tr>
                <?php
                }
                ?> -->
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
            <form action="<?=site_url('unit/process_add')?>" method="post">
                    <div class="form-group">
                        <label>Unit Name *</label>
                        <input type="hidden" name="id" value="">
                        <input type="text" name="unit_name" value="" class="form-control" required>
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
    $("#table-unit").DataTable({
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "ajax" : {
            "url" : "<?=site_url('unit/get_json')?>",
            "type" : "POST"
        },
        "columns" : [
            { "data" : "no", width:40},
            { "data" : "name", width:150 },
            { "data" : "action", width:50 },
        ],
        "columnDefs" : [
            { "target" : [0, 5], "orderable": false },
            { "target" : [2, -1], "className": "text-center" }
        ]
    })
 </script>