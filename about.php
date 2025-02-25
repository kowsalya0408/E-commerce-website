<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                
		                </ol>
		                <div class="carousel-inner">
		                  <div class="item active">
		                    <img src="images/banner1.png" alt="First slide">
		                  </div>
		                  <div class="item">
		                    <img src="images/banner2.png" alt="Second slide">
		                  </div>
		                 
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		            </div>
		            <h2 style="color:red;" align="center">ABOUT US</h2>
		       		 <P align="justify"> <font face="Arial" size="4px" color="green">Agri e-commerce provides an opportunity to streamline the agricultural value chain and reduce inefficiencies in the distribution of farm produce. It represents a new way for farmers to sell their produce to an array of buyers, including agri businesses, retailers, restaurants and consumers. Agri e-commerce also increases farmers’ access to new markets and adds transparency to the value chain. It enables farmers to bypass several intermediaries, resulting in higher income for the farmers, reduced wastage, and the potential to deliver fresher produce to customers.Such benefits are especially significant in developing regions, where more than 97% of people employed in agriculture live and where the sector’s contribution to GDP is in double digits. </font></P><br>
					 <p align="justify"><font face="Arial" size="4px" color="green">Rising smartphone adoption is having a significant impact on e-commerce. This is especially true in developing regions where mobile internet is the primary form of connectivity and smartphone adoption has tripled over the last five years to 56% of total connections.4  Mobile platforms also facilitate digital payment solutions – a key e-commerce enabler – for many users. In 2018, e-commerce transactions facilitated by mobile money grew 79% in value.
 </font></p>
					 
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
