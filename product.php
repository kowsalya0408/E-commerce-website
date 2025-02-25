<?php include 'includes/session.php'; ?>
<?php
	$conn = $pdo->open();

	$slug = $_GET['product'];

	try{
		 		
	    $stmt = $conn->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE slug = :slug");
	    $stmt->execute(['slug' => $slug]);
	    $product = $stmt->fetch();
		
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//page view
	$now = date('Y-m-d');
	if($product['date_view'] == $now){
		$stmt = $conn->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid']]);
	}
	else{
		$stmt = $conn->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
		$stmt->execute(['id'=>$product['prodid'], 'now'=>$now]);
	}

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-green layout-top-nav">
<script>
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<style>
.rcorners1 {
  border: 1px dotted green;  
  border-width: thin;    
}
@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');html, body{height: 100%}body{display: grid;background: #fff;font-family: 'Manrope', sans-serif}.mydiv{margin-top: 50px;margin-bottom: 50px}.cross{font-size:10px}.padding-0{padding-right: 5px;padding-left: 5px}.img-style{margin-left: -11px;box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);border-radius: 5px;max-width: 104% !important}.m-t-20{margin-top: 20px}.bbb_background{background-color: #E0E0E0 !important}.ribbon{width: 150px;height: 150px;overflow: hidden;position: absolute}.ribbon span{position: absolute;display: block;width: 34px;border-radius: 50%;padding: 8px 0;background-color: #3498db;box-shadow: 0 5px 10px rgba(0, 0, 0, .1);color: #fff;font: 100 18px/1 'Lato', sans-serif;text-shadow: 0 1px 1px rgba(0, 0, 0, .2);text-transform: uppercase;text-align: center}.ribbon-top-right{top: -10px;right: -10px}.ribbon-top-right::before, .ribbon-top-right::after{border-top-color: transparent;border-right-color: transparent}.ribbon-top-right::before{top: 0;left: 17px}.ribbon-top-right::after{bottom: 17px;right: 0}.sold_stars i{color: orange}.ribbon-top-right span{right: 17px;top: 17px}div{display: block;position: relative;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box}.bbb_deals_featured{width: 100%}.bbb_deals{width: 100%;margin-right: 7%;padding-top: 80px;padding-left: 25px;padding-right: 25px;padding-bottom: 34px;box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);border-radius: 5px;margin-top: 0px}.bbb_deals_title{position: absolute;top: 10px;left: 22px;font-size: 18px;font-weight: 500;color: #000000}.bbb_deals_slider_container{width: 100%}.bbb_deals_item{width: 100% !important}.bbb_deals_image{width: 100%}.bbb_deals_image img{width: 100%}.bbb_deals_content{margin-top: 33px}.bbb_deals_item_category a{font-size: 14px;font-weight: 400;color: rgba(0, 0, 0, 0.5)}.bbb_deals_item_price_a{font-size: 14px;font-weight: 400;color: rgba(0, 0, 0, 0.6)}.bbb_deals_item_price_a strike{color: red}.bbb_deals_item_name{font-size: 24px;font-weight: 400;color: #000000}.bbb_deals_item_price{font-size: 24px;font-weight: 500;color: #6d6e73}.available{margin-top: 19px}.available_title{font-size: 16px;color: rgba(0, 0, 0, 0.5);font-weight: 400}.available_title span{font-weight: 700}@media only screen and (max-width: 991px){.bbb_deals{width: 100%;margin-right: 0px}}@media only screen and (max-width: 575px){.bbb_deals{padding-left: 15px;padding-right: 15px}.bbb_deals_title{left: 15px;font-size: 16px}.bbb_deals_slider_nav_container{right: 5px}.bbb_deals_item_name, .bbb_deals_item_price{font-size: 20px}}
</style>
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<div class="callout" id="callout" style="display:none">
	        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span class="message"></span>
	        		</div>
		            <div class="row">
		            	<div class="col-sm-6">
		            		<img src="<?php echo (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg'; ?>" width="100%" class="zoom" data-magnify-src="images/large-<?php echo $product['photo']; ?>">
		            		<br><br>
		            		<form class="form-inline" id="productForm">
		            			<div class="form-group">
			            			<div class="input-group col-sm-5">
			            				
			            				<span class="input-group-btn">
			            					<button type="button" id="minus" class="btn btn-default btn-flat btn-lg"><i class="fa fa-minus"></i></button>
			            				</span>
							          	<input type="text" name="quantity" id="quantity" class="form-control input-lg" value="1">
							            <span class="input-group-btn">
							                <button type="button" id="add" class="btn btn-default btn-flat btn-lg"><i class="fa fa-plus"></i>
							                </button>
							            </span>
							            <input type="hidden" value="<?php echo $product['prodid']; ?>" name="id">
							        </div>
			            			<button type="submit" class="btn btn-success btn-lg btn-flat"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
			            		</div>
		            		</form>
		            	</div>
		            	<div class="col-sm-6">
		            		<h1 class="page-header"><?php echo $product['prodname']; ?></h1>
		            		<h3><b>RS: <?php echo number_format($product['price'], 2); ?></b></h3>
		            		<p><b>Category:</b> <a href="category.php?category=<?php echo $product['cat_slug']; ?>"><?php echo $product['catname']; ?></a><span class='sold_stars ml-auto'> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> </span></p>
		            		<p><b>Description:</b></p>
		            		<p><?php echo $product['description']; ?></p>
		            	</div>
		            </div>
		            <br>
				    <div class="fb-comments" data-href="http://localhost/ecommerce/product.php?product=<?php echo $slug; ?>" data-numposts="10" width="100%"></div> 
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
	$('#add').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		quantity++;
		$('#quantity').val(quantity);
	});
	$('#minus').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		if(quantity > 1){
			quantity--;
		}
		$('#quantity').val(quantity);
	});

});
</script>
</body>
</html>