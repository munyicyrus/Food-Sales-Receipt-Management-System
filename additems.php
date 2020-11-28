<?php
include 'navbar.php';
?>
<head>
  <title>Add Items</title>
</head>
<div class="container text-center">
    <form class="form-group" action="additems.php" method="post" style="font-size:25px;">
      <label for="itemname">Enter item name: </label><br>
      <input type="text" name="itemname" placeholder="Item Name" autofocus><br>
      <label for="price">Enter the price of item: </label><br>
      <input type="number" name="price" placeholder="Item Price"><br>
      <label for="stock">Enter the quantitity: </label><br>
      <input type="number" name="stock" placeholder="Item Quantity"><br>
      <input class="btn btn-primary" style="font-weight:bold;"type="submit" name="additemsubmit" value="Submit">
    </form>
    <a href="viewitems.php" class="btn btn-default">View Items</a><br><br>
    <?php
    if (isset($_POST['additemsubmit'])){
      $item = ucfirst($_POST['itemname']);
      $price = $_POST['price'];
      $stock = $_POST['stock'];
      if (empty($_POST['itemname'])) {
        echo '<div class="alert alert-danger text-center">';
        echo "Item Name is requied";
        echo '</div>';
      }
      elseif (empty($_POST['price'])) {
        echo '<div class="alert alert-danger text-center">';
        echo "Price is requied";
        echo "</div>";
      }
      elseif (empty($_POST['stock'])) {
        echo '<div class="alert alert-danger text-center">';
        echo "Quantity is requied";
        echo "</div>";
      }
      else {
        $sql = "INSERT INTO items VALUES(DEFAULT,'$item',$price,$stock)";

        if ($conn->query($sql)==TRUE) {
          echo '<div class="alert alert-success text-center">';
          echo "Item inserted into database";
          echo "</div>";
        }
        else {
          echo '<div class="alert alert-danger text-center">';
          echo "Item not inserted";
          echo "</div>";
        }
      }
    $conn->close();
    }
     ?>
</div>
