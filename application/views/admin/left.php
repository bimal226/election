<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $base_url; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin Name</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
		<?php if($this->session->parent_id == '0'){?>
        <li class="active treeview">
          <a href="<?php echo base_url()."candidate" ?>">
            <i class="fa fa-dashboard"></i> <span>Candidate List</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
		<?php } ?>
		
		<?php if($this->session->parent_id == '0'){?>
		<li class="treeview">
          <a href="<?php echo base_url()."result" ?>">
            <i class="fa fa-list-alt" aria-hidden="true"></i> <span>Result</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
		<?php } ?>
		<li class="treeview">
          <a href="<?php echo base_url()."voter/list" ?>">
            <i class="fa fa-list-alt" aria-hidden="true"></i> <span>Voter List</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
		<?php if($this->session->parent_id == '0'){?>
		<li class="treeview">
          <a href="<?php echo base_url()."member/list" ?>">
            <i class="fa fa-list-alt" aria-hidden="true"></i> <span>Member List</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
		<?php } ?>
		<?php if($this->session->parent_id == '0'){?>
		<li class="treeview">
          <a href="<?php echo base_url()."booth/list" ?>">
            <i class="fa fa-list-alt" aria-hidden="true"></i> <span>Booth List</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
		<?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>