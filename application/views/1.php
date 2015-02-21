<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Super Admin Page</title>
	<link rel="shortcut icon" href="<?= base_url('asset/img/icon/logo_kecil.png')?>" sizes="16x16" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url()."asset/admin/bower_components/bootstrap/dist/css/bootstrap.min.css"?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('asset/css/bootstrap-theme.css')?>">
    <!-- MetisMenu CSS -->
    <link href="<?= base_url()."asset/admin/bower_components/metisMenu/dist/metisMenu.min.css"?>" rel="stylesheet">

    <!-- Social Buttons CSS -->
    <link href="<?= base_url()."asset/admin/bower_components/bootstrap-social/bootstrap-social.css"?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url()."asset/admin/dist/css/sb-admin-2.css"?>" rel="stylesheet">
    <link href="<?= base_url()?>asset/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?= base_url()."asset/admin/bower_components/font-awesome/css/font-awesome.min.css"?>" rel="stylesheet" type="text/css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Smart Disability Helper Administrator</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url('boy/logout/boy')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li id="pelatihan">
                            <a href="<?=base_url('boy/index/pelatihan_view')?>"><i class="fa fa-table fa-fw"></i> Pelatihan</a>
                        </li>

                        <li id="albana">
                            <a href="<?=base_url('boy/index/albana_view')?>"><i class="fa fa-table fa-fw"></i> Albana</a>
                        </li>

                        <li id="users">
                            <a href="<?=base_url('boy/index/user_view')?>"><span class="glyphicon glyphicon-user"></span> Users</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
        <?=$konten?>

        </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url()."asset/admin/bower_components/jquery/dist/jquery.min.js"?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url()."asset/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url()."asset/admin/bower_components/metisMenu/dist/metisMenu.min.js"?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url()."asset/admin/dist/js/sb-admin-2.js"?>"></script>

<script>
$(document).ready(function(){

    $('#pelatihan_baru').click(tambah_pelatihan());
    $('#albana_baru').click(tambah_albana());
    $('#user_baru').click(tambah_user());
    $('.yy').click(function(){
        var id=$(this).attr('id');
        edit_pelatihan(id);
    });
    $('.zz').click(function(){
        var id2=$(this).attr('id');
        edit_albana(id2);
    });
    $('.det').click(function(){
        var id3=$(this).attr('title');
        detail_pelatihan(id3);
    });
    $('.ww').click(function(){
        var id4=$(this).attr('id');
        edit_user(id4);
    });
    $('.detail').click(function(){
        var id5=$(this).attr('title');
        detail_user(id5);
    });

    function tambah_albana(){
        $.ajax({
            url:"<?= base_url('boy/form3_admin')?>",
                beforeSend:function(){
                    $('#modal-body').html("<iframe frameborder='no' width='100%' height='100%' src='<?= base_url()?>i/loading'></iframe>")},
                success:function(html){
                    $('#modal-isi3').html(html);
                }
        });
    }

    function tambah_pelatihan(){
        $.ajax({
            url:"<?= base_url()?>boy/form1",
            beforeSend:function(){
                $('#modal-isi1').html("<iframe frameborder='no' width='100%' height='100%' src='<?= base_url()?>i/loading'></iframe>")},
            success:function(html){
                $('#modal-isi1').html(html);
            }
        });
    }

    function tambah_user(){
        $.ajax({
            url:"<?= base_url()?>boy/form5_admin",
            beforeSend:function(){
                $('#modal-isiuser1').html("<iframe frameborder='no' width='100%' height='100%' src='<?= base_url()?>i/loading'></iframe>")},
            success:function(html){
                $('#modal-isiuser1').html(html);
            }
        });
    }

    function detail_pelatihan(id3){
        
        $.ajax({
            url:"<?= base_url()?>boy/show_detail_pelatihan/"+id3,
            beforeSend:function(){
                $('#modal-isipel').html("<iframe frameborder='no' width='100%' height='100%' src='<?= base_url()?>i/loading'></iframe>")},
            success:function(html){
                $('#modal-isipel').html(html);
            }
        });
    }

    function edit_pelatihan(id){
        
        $.ajax({
            url:"<?= base_url()?>boy/form2/"+id,
            beforeSend:function(){
                $('#modal-isi2').html("<iframe frameborder='no' width='100%' height='100%' src='<?= base_url()?>i/loading'></iframe>")},
            success:function(html){
                $('#modal-isi2').html(html);
            }
        });
    }

    function edit_albana(id2){
        
        $.ajax({
            url:"<?= base_url()?>boy/form4_admin/"+id2,
            beforeSend:function(){
                $('#modal-isi2').html("<iframe frameborder='no' width='100%' height='100%' src='<?= base_url()?>i/loading'></iframe>")},
            success:function(html){
                $('#modal-isi4').html(html);
            }
        });
    }

    function edit_user(id4){
        
        $.ajax({
            url:"<?= base_url()?>boy/form6_admin/"+id4,
            beforeSend:function(){
                $('#modal-isiuser').html("<iframe frameborder='no' width='100%' height='100%' src='<?= base_url()?>i/loading'></iframe>")},
            success:function(html){
                $('#modal-isiuser').html(html);
            }
        });
    }

    function detail_user(id5){
        
        $.ajax({
            url:"<?= base_url()?>boy/show_detail_user/"+id5,
            beforeSend:function(){
                $('#modal-isidetail').html("<iframe frameborder='no' width='100%' height='100%' src='<?= base_url()?>i/loading'></iframe>")},
            success:function(html){
                $('#modal-isidetail').html(html);
            }
        });
    }
});
</script>

</body>
</html>
