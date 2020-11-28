<?php
include 'navbar.php';
    $sql = "SELECT * FROM items";
    $result = $conn->query($sql);
    if ($result->num_rows>0) {
      ?>
<div class="container">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Price</th>
              <th>Quantity</th>
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
            echo $r['itemname'];
            echo "</td>";
            echo "<td>";
            echo $r['price'];
            echo "</td>";
            echo "<td>";
            echo $r['stock'];
            echo "</td>";
            ?>
          <td>
            <form action="delete.php" method="post">
              <input type="hidden" name="itemname" value="<?php echo $r['itemname']; ?>">
              <button class="btn btn-default btn-sm" type="submit" name="delete">Delete<span class="glyphicon glyphicon-trash"></span></button>
            </form>
          </td>
        </tr>
            <?
          }
        }
      else {
        echo "Nothing found in db";
      }
       ?>
         </tbody>
     </table>
     <div class="text-right">
       <a href="additems.php" class="btn btn-primary btn-lg">Add Items</a>
     </div>
      </div>
