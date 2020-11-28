<?php
  $sql = "SELECT item,amount,quantity,price FROM transactions WHERE transid='$transid'";
  $result = $conn->query($sql);
  ?>
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
     ?>
   </tbody>
 </table>
 <div class="text-right">
   <h2>Total : <?php echo "Rs.$total/-"; ?></h2>
 </div>
 </div>
 </div>
