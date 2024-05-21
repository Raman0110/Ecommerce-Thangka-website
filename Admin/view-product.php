<?php require('../session.php');
issetUsername()     ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="admin-style.css" />
</head>

<body>
  <div class="layout-container">
  <?php
      include 'side-bar.php';
  ?>
    <main class="main-section">
    <?php
      include 'top-bar.php';
    ?>
      <div class="view-list">
        <h3 class="heading">Product List</h3>
        <table>
          <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Price</th>
            <th>Size</th>
            <th>Date</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
          <?php
          include '../connect.php';
          $sql = 'SELECT p.*,c.Name as cata FROM products p INNER JOIN categories c on c.ID = p.Category_ID';
          $result = mysqli_query($conn, $sql);
          if ($result) {
            if (mysqli_num_rows($result) > 0) {
              $i = 1;
              while ($row = mysqli_fetch_assoc($result)) {
                echo
                "
                      <tr>
                        <td>" . $i . "</td>
                        <td>" . $row['Title'] . "</td>
                        <td>" . $row['Price'] . "</td>
                        <td>" . $row['Dimensions'] . "</td>
                        <td>" . $row['Date'] . "</td>
                        <td>" . $row['cata'] . "</td>
                        <td>
                          <a href='edit-product.php?id=" . $row['ID'] . "' class='btn-edit'>Edit</a>
                          <a href='delete-product.php?id=" . $row['ID'] . "' class='btn-delete'>Delete</a>
                        </td>
                      </tr>
                        ";
                $i++;
              }
            } else {
              echo "<td colspan='7'>No data found</td>";
            }
          } else {
            echo mysqli_connect_error();
          }



          ?>

        </table>
      </div>
    </main>
  </div>
  <script src="admin-script.js"></script>
</body>

</html>