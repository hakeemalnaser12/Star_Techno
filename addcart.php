<?php session_start();
	error_reporting(E_ALL ^ E_NOTICE); 
   include('site.inc.php');

   
if(isset($_GET['product_id']))
{
     $id=$_GET['product_id'];
    $quantity1=$_GET['quantity'];


    $sql1="SELECT * FROM `product` WHERE `product_id` = $id ";
    $query1=mysqli_query($con,$sql1) or die();
    $row=mysqli_fetch_array($query1);
    $pric=$row['pro_price'];
    $qty=$row['qty']; 
    if($quantity1 <= $qty)
    {
      $quantity = $quantity1;
      $product_id=$id;
      $_SESSION['cart'][$product_id]=array("product_id"=>$product_id, "quantity"=>$quantity);


    #------
 
    $pr=$pric*$quantity;
    $sql="INSERT INTO `cart`( `product_id`, `price`, `qty`) VALUES ('$id','$pr','$quantity')" ;  
	
    $query=mysqli_query($con,$sql);
	 if($query)
	 {
	   echo"<script> alert('add cart okay!!') </script>";
	       // echo"<script> window.open('index.php') </script>";
	   }
	   else 
	   {
	    echo"<script> alert('add cart failler!!') </script>";
	    //  echo"<script> window.open('index.php') </script>";
	   }

    #------

      header('Location:productall.php');
   }
    else 
    {
      
      echo"<script type='text/javascript'> window.alert(' عذراََ هذه الكمية غير متوفرة , الكمية المتوفرة $qty ') </script>";
      header('Location:productall.php');
   }
 
  


}


     
     

?>