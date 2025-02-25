<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style>
.rcorners1 {
  border: 1px dotted green;  
  border-width: thin;    
}
@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');html, body{height: 100%}body{display: grid;background: #fff;font-family: 'Manrope', sans-serif}.mydiv{margin-top: 50px;margin-bottom: 50px}.cross{font-size:10px}.padding-0{padding-right: 5px;padding-left: 5px}.img-style{margin-left: -11px;box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);border-radius: 5px;max-width: 104% !important}.m-t-20{margin-top: 20px}.bbb_background{background-color: #E0E0E0 !important}.ribbon{width: 150px;height: 150px;overflow: hidden;position: absolute}.ribbon span{position: absolute;display: block;width: 34px;border-radius: 50%;padding: 8px 0;background-color: #3498db;box-shadow: 0 5px 10px rgba(0, 0, 0, .1);color: #fff;font: 100 18px/1 'Lato', sans-serif;text-shadow: 0 1px 1px rgba(0, 0, 0, .2);text-transform: uppercase;text-align: center}.ribbon-top-right{top: -10px;right: -10px}.ribbon-top-right::before, .ribbon-top-right::after{border-top-color: transparent;border-right-color: transparent}.ribbon-top-right::before{top: 0;left: 17px}.ribbon-top-right::after{bottom: 17px;right: 0}.sold_stars i{color: orange}.ribbon-top-right span{right: 17px;top: 17px}div{display: block;position: relative;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box}.bbb_deals_featured{width: 100%}.bbb_deals{width: 100%;margin-right: 7%;padding-top: 80px;padding-left: 25px;padding-right: 25px;padding-bottom: 34px;box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);border-radius: 5px;margin-top: 0px}.bbb_deals_title{position: absolute;top: 10px;left: 22px;font-size: 18px;font-weight: 500;color: #000000}.bbb_deals_slider_container{width: 100%}.bbb_deals_item{width: 100% !important}.bbb_deals_image{width: 100%}.bbb_deals_image img{width: 100%}.bbb_deals_content{margin-top: 33px}.bbb_deals_item_category a{font-size: 14px;font-weight: 400;color: rgba(0, 0, 0, 0.5)}.bbb_deals_item_price_a{font-size: 14px;font-weight: 400;color: rgba(0, 0, 0, 0.6)}.bbb_deals_item_price_a strike{color: red}.bbb_deals_item_name{font-size: 24px;font-weight: 400;color: #000000}.bbb_deals_item_price{font-size: 24px;font-weight: 500;color: #6d6e73}.available{margin-top: 19px}.available_title{font-size: 16px;color: rgba(0, 0, 0, 0.5);font-weight: 400}.available_title span{font-weight: 700}@media only screen and (max-width: 991px){.bbb_deals{width: 100%;margin-right: 0px}}@media only screen and (max-width: 575px){.bbb_deals{padding-left: 15px;padding-right: 15px}.bbb_deals_title{left: 15px;font-size: 16px}.bbb_deals_slider_nav_container{right: 5px}.bbb_deals_item_name, .bbb_deals_item_price{font-size: 20px}}
</style>
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container-fluid" style="padding-left:100px;">

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
	        		<div id="carousel-example-generic col-sm-10 col-md-10 col-lg-10" class="carousel slide" data-ride="carousel">
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
		            <h2 style="color:green;">AGRICULTURE PRODUCTS</h2>
		       		<?php
		       			$month = date('m');
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products GROUP BY id   LIMIT 13");
						    // $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
						    $stmt->execute();
							$row = $stmt->fetch();
							if (!$row) { // here! as simple as that
								echo "<h3 align='center'>No Products Found</h3>";
							}else
						   {
							 
							 foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-4 '>
	       								<div class='box box-solid rcorners1'>
		       								<div class='box-body prod-body'> 
		       									<h5><a href='product.php?product=".$row['slug']."'><img src='".$image."' width='100%' height='230px' class='thumbnail'></a></h5>
		       									<h3><a href='product.php?product=".$row['slug']."'>".$row['name']."</a><span class='sold_stars ml-auto'> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> </span></h3>
		       									
		       								</div>
		       								<div class='box-footer'>
											
		       									<h4 style='color:red'>RS: ".number_format($row['price'], 2)."</h4>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						   

						   }
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	        	</div>
	        	<div class="col-sm-2">
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
