<?php
include 'navbar.php';
session_start();
//Checking transid session is set or not
if (!isset($_SESSION['transid'])) {
  die("Error contact system admin");
}
//Creating variable transid to insert it into db
$transid = $_SESSION['transid'];
//Checking form is submitted or not
if (isset($_POST['transadd'])) {
  $itemname = ucfirst($_POST['itemname']);
  $quantity = $_POST['quantity'];
  //Checking if input is empty
  if (empty($itemname)||$quantity==0) {
    ?>
    <div class="alert alert-danger text-center">
  <strong>Alert!</strong> Item name cannot be empty.
    </div>
    <?
  }
  else
  {
    //Checking if product exisits
    $sql = "SELECT itemname FROM items WHERE itemname='$itemname'";
    $result =$conn->query($sql);
    $item = mysqli_fetch_row($result);
    if($item[0]==$itemname)
      {
        //Checking the price of the item
        $sql = "SELECT price FROM items WHERE itemname='$itemname'";
        $result = $conn->query($sql);
        $price = mysqli_fetch_row($result);
        //Saving price vairable in amount
        $amount = $price[0];
        //Calculating the total price
        $totalprice = $amount * $quantity;
        //Inserting the item into transactions table using transid
        $sql = "INSERT INTO transactions VALUES(DEFAULT,$transid,'$itemname',$amount,$quantity,$totalprice)";
        $conn->query($sql);
      }
    else {
      ?>
      <div class="alert alert-danger text-center">
    <strong>Sorry!</strong> Item not available
      </div>
      <?
    }
  }
}
 ?>
 <div class="container">
   <h1 class="text-center">Computer and Vegetable Shop</h1>
   <div class="text-left">
     <h2>Bill No :- <?php echo $transid; ?> <small>Date:- <?php echo date("d-m-Y"); ?></small></h2>
   </div>
   <div>
<?php include 'showbill.php'; ?>
<div class="container">
  <form class="form-inline" action="transaction.php" method="post">
    <div class="form-group">
      <label for="itemname">Name: </label>
      <input class="form-control" type="text" name="itemname" placeholder="itemname" autofocus>
    </div>
    <div class="form-group">
      <label for="quantity">Quantity: </label><input class="form-control" type="number" name="quantity" value="1">
    </div>
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="transadd" value="Next Item">
    </div>
    <div class="form-group">
    <a class="btn btn-default" href="bill.php">Confirm Transaction</a>
    </div>
  </form>
</div>
