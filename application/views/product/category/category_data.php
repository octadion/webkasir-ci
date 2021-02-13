<section class="content-header">
    <h1>Category
        <small>Kategori Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Categorys</li>
    </ol>
 </section>
<section class="content">
    <?php //$this->view('message')?>
    <div id="flash" data-flash="<?=$this->session->flashdata('success');?>"></div>
     <div class="box">
     <div class="box-header">
     <h3 class="box-title">Data Categories</h3>
     <div class="pull-right">
        <a href="<?=site_url('category/add')?>" class="btn btn-primary btn-flat">
        <i class="fa fa-plus"></i> Create
        </a>
     </div>
     
     </div>
     <div class="box-body table-responsive">
        <table class="table table-bordered table-striped" id="table1">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th>Name</th>
                    <th width="160px">Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
     </div>
     </div>
 </section>

 <script>
        $(document).ready(function(){
                $('#table1').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax":{
                    "url": "<?= site_url('category/get_ajax')?>",
                    "type": "POST"
                },
                "columnDefs": [
                    {
                        "targets": [0, -1],
                        "orderable": false
                    }
                ],
                "order": []
            })
        })
 </script>