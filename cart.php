<?php include('header.php');
  	error_reporting(E_ALL ^ E_NOTICE);  

  // function to add product list
  function addproduct($a)
  { 
     include('site.inc.php');
	 $q="select * from product where product_id='$a'";
	 $t=mysqli_query($con,$q);
	 return$t;
	  
  }

  if(isset($_GET['Delete']))
  {
	  $cat_id=$_GET['Delete'];
	
  
	  
	  $query=mysqli_query($con,"DELETE FROM categories WHERE cat_id='$cat_id'") ;
	  if($query)
	  {
	  echo"<script> alert('delete item okay!!') </script>";
		// echo"<script> window.open('index.php') </script>";
	  }
	  else 
	  {
	   echo"<script> alert('delete item failler!!') </script>";
		//  echo"<script> window.open('index.php') </script>";
	  
	  }
	  
	   
  }

 ?>
 

<div class="container">

<div class="table-responsive">

<table class="table">
<head>
<tr>
<th>الرقم</th>
<th> المنتج</th>
<th> السعر</th>
<th>الكمية </th>
<th> المجموع</th>

</tr>

</head>
<tbody>
<?php


error_reporting(E_ALL ^ E_NOTICE); 
 $cart=$_SESSION['cart'];
 $_SESSION['amount'];

 $total=0;
  $amount=0;
  if($cart!=0)
  {
foreach($cart as $c )
{
	 $id=$c['product_id'];
	echo"<tr>";
	
	echo"<td>".$id."</td>";
	
	  $pro=addproduct($c['product_id']);
	  foreach($pro as $p)
	  {
		  echo"<td>".$p['product_name']."</td>";
		   echo"<td>".$p['pro_price']."</td>";
		    
	  }
	
		echo"<td>". $c['quantity'] ."</td>";
		$total=($p['pro_price']*$c['quantity']);
		 echo"<td>".$total."</td>";
		 $amount+=$total;
		 
		 
		 $_SESSION['order'][$id]=array("id"=>$id,"quantity"=>$c['quantity'],"total"=>"$total");
	}
}

   
	echo"</tr>";
	echo"<tr> <th> المجموع الكلي :</th>";
	 
	echo"<th style='background-color:#eee;'>".$amount."</th>";
	echo"</tr>";
	$_SESSION['amount']=$amount;
	
?>
</tbody>
</table>


<form action="order.php" method="get">
<center><button name="order" type="submit" class="btn btn-success " > تقديم الطلب </button> </center>
</form>

</div>

</div>


<?php include('footer.php'); ?>