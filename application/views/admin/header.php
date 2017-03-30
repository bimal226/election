<body class="hold-transition skin-green sidebar-mini" style="font-size: 16px;">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo $base_url; ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Election</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Election</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		<li class="dropdown messages-menu">
            <a href="#">
              <i class="fa fa-calendar"></i> <?php echo date("Y-m-d");?>&nbsp;&nbsp;&nbsp; <i class="fa fa-clock-o"></i> <?php echo date("g:i A");?>
            </a>
          </li>
		  
        <li class="dropdown user user-menu">
            <a href="<?php echo base_url()."admin/logout";?>" >
             
              <span class="hidden-xs"><i class="glyphicon glyphicon-off"></i> Logout</span>
			    <span class="hidden-lg hidden-md hidden-sm visible-xs "><i class="glyphicon glyphicon-off"></i></span>
            </a>
			
          </li>
        
        </ul>
      </div>
    </nav>
  </header>