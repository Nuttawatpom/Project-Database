<?php
  session_start();
  include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบสถานะสินค้า</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="shortcut icon" href="../img/Logo.png">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css"></link>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Using-Fonts-->
</head>
<body>
    <!---navigation----------->
    <nav>
      <!--social-link-and-contact----->
      <div class="social-call">
          <!--social-links--------->
          <div class="social">
              <a href="" class="social"><i class="fab fa-facebook-f"></i></a>
              <a href="" class="social"><i class="fab fa-twitter"></i></a>
              <a href="" class="social"><i class="fab fa-google-plus-g"></i></a>
          </div>
          <!--contract---------->
          <div class="contact">
              <strong>Contact: EzShopContact@hotmail.com</strong>
          </div>
      </div>
      <!--manu-bar--------------->
      <div class="navigation">
          <!--logo------------->
          <a href="../Home/index.php" class="logo">
              <img src="../img/Logo.png" height="100" width="100">
          </a>
          <!--Menu-Icon------------>
          <div class="toggle"></div>
          <!--menu------->
          <ul class="menu">
              <li><a href="../Home/index.php"><b>หน้าหลัก</b></a></li>
              <li><a href="../Home/index.php"><b>ร้านค้า</b></a>
              <!--sale-lable-->
                  <span class="sale-lable">NEW!</span>
              </li>
              <li><a href="../Chat/Chat.php"><b>ติดต่อเรา</b></a></li>
              <li>
                  <input type="text"placeholder="ค้นหาสินค้า"></li>
              <li>
          </ul>
          <!---right-menu------->
          <div class="right-menu">
              <!---mail-box----->
              <a href="" class="mail-box">    
                  <i class="fa fa-envelope">
                  </i>
              </a>
              <!--user----->
              <div class="dropdown">
                  <a href="" class="address">
                      <i class="fas fa-address-book"></i>
                  </a>
                  <div class="dropdown-content">
                      <a href="../account/index.php">ข้อมูลส่วนตัว</a>
                      <form action='../db_connect/logout.php' method='POST'>
                            <a href="../login/index.php">Logout</a>
                        </form>
                  </div>
              </div>
              <!--cart-icon----->
              <a href="../sumorder/sumproduct.php" class="shopping-cart">    
                  <i class="fas fa-shopping-cart" id="cart-icon">
                  <!--number-of-product-in-cart-->
                  <span class="num-cart-product">
                  <?php
                        $current_user = $_SESSION['user_id'];
                        $sql = "SELECT * FROM cart WHERE u_id = '$current_user'";
                        $result = $conn->query($sql);
                        $row = mysqli_num_rows($result);
                        echo $row;
                        ?>
                  </span>
                  </i>
              </a>
          </div>
      </div>
  </nav>
 
  <p style="font-size: 26px; margin-top: 70px; text-align: center; font-family: ekkamai new; font-weight: bold;">ตรวจสอบสถานะของสินค้า</p>
  <table class="content-table">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>ชื่อสินค้า</th>
        <th>สถานะการจ่ายเงิน</th>
        <th>สถานะสินค้า</th>
      </tr>
    </thead>
    <tbody>
      <?php

      $current_user = $_SESSION['user_id'];
      $u = "SELECT * FROM tracking WHERE u_id = '$current_user'";
      $user = mysqli_query($conn,$u);

      $sql = "SELECT * FROM tracking";
      $result = mysqli_query($conn,$sql);

      if($user){
        while($row = $result->fetch_assoc()){
          $p_id = $row['p_id'];
          $sql2 = "SELECT * FROM product WHERE product_id = '$p_id'";
          $result2 = mysqli_query($conn,$sql2);
          $rows = mysqli_fetch_array($result2);
          echo "<tr>
            <td>" . $row["p_id"]. "</td>
            <td>" . $rows["product_name"] . "</td>
            <td>" . $row["pay_status"] . "</td>
            <td>" . $row["ship_status"] . "</td>
          </tr>";
        }
      }
      ?>
    </tbody>
  </table>
      

</body>
</html>