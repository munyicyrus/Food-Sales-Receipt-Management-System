<?php
include 'navbar.php';
$sql = "SELECT transid,total,date FROM bills";
$result = $conn->query($sql);
if (!mysqli_num_rows($result)>0){
  echo '<h1 class="text-center">No transactions found</h1>';
}
else {
?>
<title>Bills</title>
<div class="container">
  <table class="table table-striped">
  <thead>
    <tr>
      <th>No.</th>
      <th>Bill Number</th>
      <th>Total</th>
      <th>Date & Time</th>
    </tr>
  </thead>
  <tbody>
    <?
      foreach ($result as $key => $r) {
        echo "<tr>";
        echo "<td>";
        echo $key+1;
        echo "</td>";
        echo "<td>";
        echo $r['transid'];
        echo "</td>";
        echo "<td>";
        echo $r['total'];
        echo "</td>";
        echo "<td>";
        echo $r['date'];
        echo "</td>";
        echo "<td>";
        echo "</tr>";
      }
    }
     ?>
   </tbody>
  </table>
</div>
