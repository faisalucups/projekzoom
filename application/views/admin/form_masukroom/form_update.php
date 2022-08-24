<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Web Room Zoom | Data Room Masuk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/web_admin/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url('admin') ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!--?php foreach ($avatar as $a) { ?>
                  <img src="<--?php echo base_url('assets/upload/user/img/' . $a->nama_file) ?>" class="user-image" alt="User Image">
                <--?php } ?-->
                <span class="hidden-xs"><?= $this->session->userdata('name') ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <!--?php foreach ($avatar as $a) { ?>
                    <img src="<--?php echo base_url('assets/upload/user/img/' . $a->nama_file) ?>" class="img-circle" alt="User Image">
                  <--?php } ?-->
                  <p>
                    <?= $this->session->userdata('name') ?> - Web Developer
                    <small>Last Login : <?= $this->session->userdata('last_login') ?></small>
                  </p>
                </li>
                <!-- Menu Body -->

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= base_url('admin/profile') ?>" class="btn btn-default btn-flat"><i class="fa fa-cogs" aria-hidden="true"></i> Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('admin/sigout') ?>" class="btn btn-default btn-flat"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->

    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <!--?php foreach ($avatar as $a) { ?>
              <img src="<--?php echo base_url('assets/upload/user/img/' . $a->nama_file) ?>" class="img-circle" alt="User Image">
            <--?php } ?-->
          </div>
          <div class="pull-left info">
            <p><?= $this->session->userdata('name') ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="<?= base_url('admin') ?>">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              <span class="pull-right-container">
                <!-- <i class="fa fa-angle-left pull-right"></i> -->
              </span>
            </a>
            <!-- <ul class="treeview-menu">
            <li><a href="<?php echo base_url() ?>assets/web_admin/index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->
          </li>


          <li class="treeview active">
            <a href="#">
              <i class="fa fa-table"></i> <span>Tables</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?= base_url('admin/tabel_masukroom') ?>"><i class="fa fa-circle-o"></i> Tabel Room Masuk</a></li>
              <li class="active"><a href="<?= base_url('admin/tabel_Room') ?>"><i class="fa fa-circle-o"></i> Tabel Room</a></li>
            </ul>
          </li>
          <li>
          <li class="header">LABELS</li>
          <li>
            <a href="<?php echo base_url('admin/profile') ?>">
              <i class="fa fa-cogs" aria-hidden="true"></i> <span>Profile</span></a>
          </li>
          <li>
            <a href="<?php echo base_url('admin/users') ?>">
              <i class="fa fa-fw fa-users" aria-hidden="true"></i> <span>Users</span></a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Update Data Masuk Room
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">General Elements</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="container">
              <!-- general form elements -->
              <div class="box box-primary" style="width:94%;">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-archive" aria-hidden="true"></i> Update Data Masuk Room</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="container">
                  <form action="<?= base_url('admin/proses_datamasuk_room_update') ?>" role="form" method="post">

                    <?php if (validation_errors()) { ?>
                      <div class="alert alert-warning alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Warning!</strong><br> <?php echo validation_errors(); ?>
                      </div>
                    <?php } ?>

                    <div class="box-body">
                      <div class="form-group">
                        <!--?php foreach ($data_room_update as $d) { ?-->
                        <div class="box-body">
                          <div class="form-group" style="display:inline-block;">
                            <label for="id" style="width:87%;margin-left: 12px;">Id</label>
                            <input type="text" name="id" style="width: 90%;margin-right: 67px;margin-left: 11px;" class="form-control" placeholder="id" readonly="readonly">
                            <!--value="<--?= $d->id> </velue-->
                          </div>
                          <!--/div-->
                          <div class="form-group" style="display:inline-block;">
                            <label for="nama" style="width:73%;">Nama</label>
                            <input type="text" name="nama" style="width:90%;margin-right: 67px;" class="form-control" placeholder="Masukan Nama....">
                          </div>
                        </div>
                        <div class="box-body">
                          <div class="form-group" style="display:inline-block;">
                            <label for="tanggal" style="width:87%;margin-left: 12px;">Tanggal</label>
                            <input type="text" name="tanggal" style="width: 90%;margin-right: 67px;margin-left: 11px;" class="form-control form_datetime" placeholder="Ketik Tanggal...">
                          </div>
                          <div class="form-group" style="display:inline-block;">
                            <label for="cabang_si" style="width:73%">Cabang si</label>
                            <select class="form-control" name="cabang_si" style="width:90%;margin-right: 67px;" aria-placeholder="select">
                              <option></option>
                              <option value="">-- Pilih --</option>
                              <option value="Aceh">Aceh</option>
                              <option value="Bali">Bali</option>
                              <option value="Bengkulu">Bengkulu</option>
                              <option value="Jakarta">Jakarta Raya</option>
                              <option value="Jambi">Jambi</option>
                              <option value="Jawa Tengah">Jawa Tengah</option>
                              <option value="Jawa Timur">Jawa Timur</option>
                              <option value="Jawa Barat">Jawa Barat</option>
                              <option value="Papua">Papua</option>
                              <option value="Yogyakarta">Yogyakarta</option>
                              <option value="Kalimantan Barat">Kalimantan Barat</option>
                              <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                              <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                              <option value="Kalimantan Timur">Kalimantan Timur</option>
                              <option value="Lampung">Lampung</option>
                              <option value="NTB">Nusa Tenggara Barat</option>
                              <option value="NTT">Nusa Tenggara Timur</option>
                              <option value="Riau">Riau</option>
                              <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                              <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                              <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                              <option value="Sumatera Barat">Sumatera Barat</option>
                              <option value="Sumatera Utara">Sumatera Utara</option>
                              <option value="Maluku">Maluku</option>
                              <option value="Maluku Utara">Maluku Utara</option>
                              <option value="Sulawesi Utara">Sulawesi Utara</option>
                              <option value="Sulawesi Selatan">Sumatera Selatan</option>
                              <option value="Banten">Banten</option>
                              <option value="Gorontalo">Gorontalo</option>
                              <option value="Bangka">Bangka Belitung</option>
                            </select>
                          </div>
                        </div>
                        <div class="box-body">
                          <div class="form-group" style="display:inline-block;">
                            <label for="jam" style="width:87%;margin-left: 12px;">Jam</label>
                            <input type="text" name="jam" style="width: 90%;margin-right: 67px;margin-left: 11px;" class="form-control" id="jam" placeholder="Masukan Jam...">
                          </div>
                          <div class="form-group" style="display:inline-block;">
                            <label for="selesai" style="width:73%">Selesai</label>
                            <input type="text" name="selesai" style="width:90%;margin-right: 67px;" class="form-control" id="selesai" placeholder="Masukan Jam...">
                          </div>
                        </div>
                        <div class="box-body">
                          <div class="form-group" style="display:inline-block;">
                            <label for="topik" style="width:87%;margin-left: 12px;">Topik</label>
                            <input type="text" name="topik" style="width: 90%;margin-right: 67px; margin-left: 11px;" class="form-control" id="topik" placeholder="Ketik disini...">
                          </div>
                          <div class="form-group" style="display:inline-block;">
                            <label for="room" style="width:73%">Room</label>
                            <select class="form-control" name="room" style="width:90%;margin-right: 67px;">
                              <?php foreach ($list_room as $s) { ?>
                                <?php if ($d->room == $s->nama_room) { ?>
                                  <option value="<?= $d->room ?>" selected=""><?= $d->room ?></option>
                                <?php } else { ?>
                                  <option value="<?= $s->kode_room ?>"><?= $s->nama_room ?></option>
                                <?php } ?>
                              <?php } ?>
                            </select>
                          </div>
                        </div>


                      </div>
                    </div>
                    <!--?php } ?-->
                    <!-- /.box-body -->

                    <div class="box-footer" style="width:93%;">
                      <a type="button" class="btn btn-default" style="width:10%" onclick="history.back(-1)" name="btn_kembali"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                      <button type="submit" style="width:20%;margin-left:689px;" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>&nbsp;&nbsp;&nbsp;
                    </div>
                  </form>
                </div>
              </div>
              <!-- /.box -->

              <!-- Form Element sizes -->

              <!-- /.box -->


              <!-- /.box -->

              <!-- Input addon -->

              <!-- /.box -->

            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <!-- <div class="col-md-6">
          <-- Horizontal Form -->

            <!-- /.box -->
            <!-- general form elements disabled -->

            <!-- /.box -->

          </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; <?= date('Y') ?></strong>

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url() ?>assets/web_admin/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>assets/web_admin/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() ?>assets/web_admin/dist/js/demo.js"></script>
</body>

</html>