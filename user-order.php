<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="responsive.css" />
</head>

<body>
  <?php require('session.php') ?>
  <?php include 'header.php' ?>
  <section class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-content flex">
        <i class="fa fa-home"></i><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Orders
      </div>
    </div>
  </section>
  <main class="view-order">
    <div class="container">
      <h2 class="order-heading">Order List</h2>
      <table>
        <tr>
          <th>S.N</th>
          <th>Product name</th>
          <th>Image</th>
          <th>Price</th>
        </tr>
        <?php
          $total = 0;
          $userId = $_SESSION['user-id'];
          $sql = "SELECT * FROM Orders
          inner join OrderItems on Orders.OrderID = OrderItems.OrderID 
          inner join products on OrderItems.ProductID = products.ID
          WHERE userid = '$userId' ";
          $result = mysqli_query($conn,$sql);
          if($result){
            $i=1;
            while($row = mysqli_fetch_assoc($result)){
              $total += $row['Price'];
              echo 
              "
              <tr>
                <td>$i</td>
                <td>".$row['Title']."</td>
                <td class='product-img-name'><img src = 'uploads/".$row['Image_URL']."'></td>
                <td>".$row['Price']."</td>
              </tr>
              ";
              $i++;
            }
            echo 
            "
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td><strong>Total: $total</strong></td>
            </tr>";
          }
        
        ?>
      </table>
    </div>
  </main>
  <?php include 'footer.php' ?>
  <script src="script.js"></script>
</body>