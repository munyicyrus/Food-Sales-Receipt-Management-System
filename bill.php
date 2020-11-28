<?php
include 'navbar.php';
session_start();
//Checking transid session is set or not
if (!isset($_SESSION['transid'])) {
  die("Error contact system admin");
}
//Creating variable transid to insert it into db
$transid = $_SESSION['transid'];
  //Displaying the bill
  $sql = "SELECT item,amount,quantity,price FROM transactions WHERE transid='$transid'";
  $result = $conn->query($sql);
  if (!mysqli_num_rows($result)>0) {
    echo '<div class="text-center">';
    echo '<h1 style="font-size:50px;">Not allowed</h1>';
    echo '<a href="transaction.php" class="btn btn-default btn-lg">Go Back</a>';
    echo "</div>";
    die();
    }
  ?>
  <div class="container">
<h2>Bill No :- <?php echo $transid; ?>  </h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th>No.</th>
      <th>Item</th>
      <th>Amount</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    <?
      $total = 0;
      foreach ($result as $key => $r) {
        echo "<tr>";
        echo "<td>";
        echo $key+1;
        echo "</td>";
        echo "<td>";
        echo $r['item'];
        echo "</td>";
        echo "<td>";
        echo $r['amount'];
        echo "</td>";
        echo "<td>";
        echo $r['quantity'];
        echo "</td>";
        echo "<td>";
        echo $r['price'];
        echo "</td>";
        echo "</tr>";
        $total = $total + $r['price'];
      }
        //Checking whether transaction is getting repeated
        $sql="SELECT transid from bills WHERE transid=$transid";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($transid==$row['transid']) {
          echo '<div class="alert alert-danger text-center">';
          echo "Repeated Transaction";
          echo "</div>";
        }
        else {
          //Making bill and this confirms the successful transaction
          $sql = "INSERT INTO bills VALUES(DEFAULT,$transid,$total,DEFAULT)";
          if (!$conn->query($sql)) {
            echo "Transactions Unsuccessful Try Again...!";
          }
          else {
            echo '<div class="alert alert-success text-center">';
            echo "Transaction Completed.";
            echo "</div>";
          }
        }
    ?>
   </tbody>
 </table>
 <div class="text-right">
   <h2>Total : <?php echo "Rs.$total/-"; ?></h2>
 </div>
 <div class="text-center">
   <a href="index.php" class="btn btn-lg btn-primary">Goto Home Page</a>
 </div>
 </div>
