<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kasir</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
    <!-- <link rel="stylesheet" href="<?=base_url()?>assets/daterangepicker.css"> -->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
 <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .swal2-popup{
            font-size: 1.6rem !important;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini <?=$this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null ?>">
 
    <div class="wrapper">
        <header class="main-header">
            <a href="<?=base_url('dashboard')?>" class="logo">
                <span class="logo-mini">m<b>K</b></span>
                <span class="logo-lg">my<b>Kasir</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
 
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">3</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 3 tasks</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                        <a href="#">
                                            <h3>Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image">
                                <span class="hidden-xs"><?=$this->fungsi->user_login()->username?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle">
                                    <p><?=$this->fungsi->user_login()->name?>
                                        <small><?=$this->fungsi->user_login()->address?></small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?=site_url('auth/logout')?>" class="btn btn-flat bg-red">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
 
        <!-- Left side column -->
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle">
                    </div>
                    <div class="pull-left info">
                        <p><?=ucfirst($this->fungsi->user_login()->username)?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
                <!-- sidebar menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                    </li>
                    <li <?=$this->uri->segment(1) == 'supplier' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('supplier')?>"><i class="fa fa-truck"></i> <span>Suppliers</span></a>
                    </li>
                    <li <?=$this->uri->segment(1) == 'customer' ? 'class="active"' : ''?>>
                        <a href="<?=site_url('customer')?>">
                            <i class="fa fa-users"></i> <span>Customers</span>
                        </a>
                    </li>
                    <li class="treeview <?=$this->uri->segment(1) == 'category' 
                    || $this->uri->segment(1) == 'unit' 
                     || $this->uri->segment(1) == 'item' ? 'active' : ''?>" >
                        <a href="#">
                            <i class="fa fa-archive"></i> <span>Products</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?=$this->uri->segment(1) == 'category' ? 'class="active"' : ''?>><a href="<?=site_url('category')?>"><i class="fa fa-circle-o"></i> Categories</a></li>
                            <li <?=$this->uri->segment(1) == 'unit' ? 'class="active"' : ''?>><a href="<?=site_url('unit')?>"><i class="fa fa-circle-o"></i> Units</a></li>
                            <li <?=$this->uri->segment(1) == 'item' ? 'class="active"' : ''?>><a href="<?=site_url('item')?>"><i class="fa fa-circle-o"></i> Items</a></li>
                        </ul>
                    </li>
                    <li class="treeview <?=$this->uri->segment(1) == 'stock' || $this->uri->segment(1) == 'sale' ? 'active': ''?>">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i> <span>Transaction</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?=$this->uri->segment(1) == 'sale' ? 'class="active"': ''?>>
                            <a href="<?=site_url('sale')?>"><i class="fa fa-circle-o"></i> Sales</a></li>
                            <li <?=$this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'class="active"': ''?>>
                            <a href="<?=site_url('stock/in')?>"><i class="fa fa-circle-o"></i> Stock In</a></li>
                            <li  <?=$this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'out' ? 'class="active"': ''?>
                            ><a href="<?=site_url('stock/out')?>"><i class="fa fa-circle-o"></i> Stock Out</a></li>
                        </ul>
                    </li>
                    <li class="treeview <?=$this->uri->segment(1) == 'report' ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i> <span>Reports</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?=$this->uri->segment(1) == 'report'&& $this->uri->segment(2) == 'sale' ? 'class="active"': ''?>>
                            <a href="<?=site_url('report/sale')?>"><i class="fa fa-circle-o"></i> Sales</a></li>
                            <!-- <li <?=$this->uri->segment(1) == 'report' && $this->uri->segment(2) == 'stock' ? 'class="active"': ''?>>
                            <a href="<?=site_url('report/stock')?>"><i class="fa fa-circle-o"></i> Stocks</a></li> -->
                        </ul>
                    </li>
                    <?php if($this->fungsi->user_login()->level ==1) { ?>
                    <li class="header">SETTINGS</li>
                    <li><a href="<?=site_url('user')?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
                     <?php } ?>
                     
                </ul>
            </section>
        </aside>
        <script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?=base_url()?>assets/dist/js/jquery.redirect.js"></script>
        <script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    

    <script src="<?= base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url(); ?>assets/js/buttons/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/js/buttons/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/js/buttons/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/js/buttons/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/js/buttons/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/js/buttons/buttons.print.min.js"></script>
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <?php echo $contents ?>
        </div>
 
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2019 <a href="">Phicos</a>.</strong> All rights reserved.
        </footer>
 
    </div>
    <!-- <script src="<?=base_url()?>assets/highcharts/highcharts.js"></script> -->
    <!-- <script src="<?=base_url()?>assets/highcharts/exporting.js"></script> -->
    <!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
    <!-- <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> -->
    <script src="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?=base_url()?>assets/dist/js/sweetalert-dev.js"></script>
    <script src="<?=base_url()?>assets/dist/js/jquery.auto.pagination.min.js"></script>
<!-- <script src="<?=base_url()?>assets/daterangepicker.min.js"></script> -->
<!-- <script src="<?=base_url()?>assets/js/daterangepicker.js"></script> -->
    <script src="<?=base_url()?>assets/dist/js/jqBootstrapValidation.js"></script>
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
    <!-- <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/sugar.min.js'></script> -->
    <!-- <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-migrate-1.2.1.js"></script> -->
    <!-- <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3-custom.min.js"></script>    -->
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script> -->
<!-- <script src="http://jquery-ui.googlecode.com/svn/tags/1.8.22/"></script> -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script> -->
<!-- <script type='text/javascript' src='<?php echo base_url(); ?>assets/script.js'></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->
    <script>
    var flash = $('#flash').data('flash');
    if(flash){
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: flash
        })
    }

    $(document).on('click', '#btn-hapus', function(e){
        e.preventDefault();
        var link = $(this).attr('href');

        Swal.fire({
            title: 'Apa anda yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = link;
                
            }
        })
    })
    </script>
   <script>
  $(document).ready(function () {
    //$('.sidebar-menu').tree()
     $('#table1').DataTable()
  })
</script>


<!-- <script type="text/javascript">
function grafik(div) {
		$.ajax({
			type: 'ajax',
			url: '<?=base_url("dashboard/grafik")?>',
			async: false,
			dataType: 'json',
			success: function(response) {
				console.log(response);

				// Build the chart
				Highcharts.chart(div, {
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie'
					},
					title: {
						text: 'Item'
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
					},
					accessibility: {
						point: {
							valueSuffix: '%'
						}
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: false
							},
							showInLegend: true
						}
					},				
					series: [{
						name: 'Jumlah',
						colorByPoint: true,
						data: response.data
					}]
				});
			}
		});
		return false;

	}
</script> -->



</body>
</html>
