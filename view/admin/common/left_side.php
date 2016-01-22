 <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">           
            <!-- Optionally, you can add icons to the links -->
            <li class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : ''?>"><a href="<?php echo base_url()?>admin/dashboard"><i class="fa fa-link"></i> <span>DashBoard</span></a></li>
            <li class="<?php echo $this->uri->segment(2) == 'claimBusiness' ? 'active' : ''?>"><a href="<?php echo base_url()?>admin/claimBusiness"><i class="fa fa-link"></i> <span>Claim Business</span></a></li>
			<li class="<?php echo $this->uri->segment(2) == 'users' ? 'active' : ''?>"><a href="<?php echo base_url()?>admin/users"><i class="fa fa-link"></i> <span>Users</span></a></li>
            <li class="treeview <?php echo $this->uri->segment(2) == 'users' ? 'active' : ''?>">
              <a href="<?php echo base_url()?>admin/users"><i class="fa fa-link"></i> <span>Other </span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#">Link in level 2</a></li>
                <li><a href="#">Link in level 2</a></li>
              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
