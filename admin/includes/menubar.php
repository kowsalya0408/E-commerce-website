<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
     
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
	  <li><a href="category.php"><i class="fa fa-list"></i> <span>Category</span></a></li>
	    <li><a href="products.php"><i class="fa fa-barcode"></i> Product </a></li>		
		<li><a href="users.php"><i class="fa fa-users"></i> <span>customers</span></a></li>
      <li><a href="sales.php"><i class="fa fa-money"></i> <span>Sales</span></a></li>
      <li><a href="contact.php"><i class="fa fa-phone"></i> <span>Contact</span></a></li>
      
    
      
      
        
        
		
    
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>