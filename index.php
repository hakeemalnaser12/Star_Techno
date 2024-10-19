
    <?php 
    include('header.php');
	error_reporting(E_ALL ^ E_NOTICE);  
    include('site.inc.php');


$sql="SELECT  * FROM  product LIMIT 12 ";


$query=mysqli_query($con,$sql);

    ?>
 
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
			<?php       
			while($row=mysqli_fetch_array($query))
				{
                    $product_id = $row['product_id'];
                  ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper" >
                 
                   
                            <a href="single-product.php?pd= <?php echo$row['product_id']; ?> ">
							   <?php   echo"
								  <img  src='img/".$row['image']."'  class='product-thumb'  />";
								  ?>
							</a>
                            <h6><a   href="single-product.php?pd=<?php echo$row['product_id']; ?>">  <?php echo $row['product_name']; ?></a></h6>
                              <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                              <div class="product-carousel-price">
                                <ins>$<?php echo $row['pro_price']; ?> </ins> <del><?php echo$row['pro_beforDisc']; ?></del>
                            </div> 
							                                        <!--send to item to cart session-->
                                                                    <form action="addcart.php"  method="get" class="cart">
                                        <div class="quantity">
										    <input type="hidden" name="product_id" value="<?php echo$product_id; ?>" />
											
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" max="20" step="1">
                                        </div>
                                        <button class="add_to_cart_button1" name="save" type="submit">اضافة للسلة</button>
                                    </form>   
                                  
                                    <!--end form-->
                        </div>
						
                    </div>
                   
                </div>
   
				<?php } ?>
             
              
            </div>
        </div>
    </div> <!-- End product widget area -->
    
	
	
	  <?php include('footer.php');
 
    ?>