<?php 
include('header.php');
	
error_reporting(E_ALL ^ E_NOTICE);  
if(isset($_GET['cat']) 	)
{
	

 $cat_id=$_GET['cat'];
 
include('site.inc.php');

$sql="select * from product where cat_id='$cat_id'";

$query=mysqli_query($con,$sql);

	
?>
	

 
 
 
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
			<?php 
			
				while($row=mysqli_fetch_array($query))
					{ 
						

					 ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                 
                            <a href="single-product.php?pd=<?php $row['product_id']; ?>">
							   <?php   
							     echo"
								  <img  src='img/".$row['image']."' class='product-thumb' />";
								  ?>
							</a>
                            <h2><a href="customer/?sw=product_details&&pd=<?php echo $row['product_id']; ?>">  <?php echo $row['product_name']; ?></a></h2>
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
							
                        </div>
						
                    </div>
                </div>
				
				<?php }?>
             
              
            </div>
        </div>
    </div> <!-- End product widget area -->
    
	
	
 <?php 
   }
 include('footer.php');
 
    ?>