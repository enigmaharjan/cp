
<?php
if(!isset($_SESSION['uid'])){
	header('location:login2.php');
}
include_once("relatedphp/connect.php");
include_once("index.php");

if(!isset($_REQUEST["categoryid"])){
	?>
	<div class="jumbotron text-center" >
<h3>Select Required Items</h3></div>
<?php 
}
else{
$sql = "select * from products where categoryid=" . $_REQUEST["categoryid"];
$sql1 = "select * from category where categoryid=" . $_REQUEST["categoryid"];
$r = $conn->query($sql);
$ru = $conn->query($sql1);
$rus = mysqli_fetch_array($ru);
while ($rs = mysqli_fetch_array($r))
{ ?><div class=" col-sm-4"> <?php
echo "Item: " . $rs["productname"] . "<br>";
echo "Rate: Rs." . $rs["rate"] . "/". $rus["categoryunit"] . "<br>";
echo "Quantity: "."<form method='get' action='addproduct.php'><input type='number' required=required name='quantity'><br/>";
echo "<input type='hidden' value='".$rs['productid']."' name='productid'> "; //the product id of the product is hidden so that it can be saved
echo  "<input  class='btn' type='submit' value='Add Item'/></a></form>";?></div><?php
}}
?>