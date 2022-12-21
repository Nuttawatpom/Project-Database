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
    <title>History</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="shortcut icon" href="../img/Logo.png">
    <link rel="stylesheet" href="./history.css">
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
            <a href="../home/index.php" class="logo">
                <img src="../img/Logo.png" height="100" width="100">
            </a>
            <!--Menu-Icon------------>
            <div class="toggle"></div>
            <!--menu------->
            <ul class="menu">
                <li><a href="../home/index.php"><b>หน้าหลัก</b></a></li>
                <li><a href="../home/index.php"><b>ร้านค้า</b></a>
                <!--sale-lable-->
                    <span class="sale-lable">NEW!</span>
                </li>
                <li><a href="../chat/chat.php"><b>ติดต่อเรา</b></a></li>
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
    
    <div class="orderMain">
        <p class="orderSumTxt">ประวัติการสั่งซื้อ</p>
        <div class="orderLine"></div>
        <div class="orderBox">
            <div class="orderLeft">
                <table class="orderItem">
                    <thead>
                        <tr>
                            <th style="color: rgb(0, 128, 255);">รูปภาพ</th>
                            <th style="color: rgb(0, 128, 255);">ชื่อสินค้า</th>
                            <th style="color: rgb(0, 128, 255);">สี/ขนาด</th>
                            <th style="color: rgb(0, 128, 255);">จำนวน</th>
                            <th style="color: rgb(0, 128, 255);">ราคารวม</th>
                            <th style="color: rgb(0, 128, 255);">การชำระเงิน</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                            $current_user = $_SESSION['user_id'];
                            $check = "SELECT * FROM customer WHERE user_id = '$current_user'";
                            $sql = "SELECT * FROM history WHERE u_id ='$current_user' GROUP BY order_id";
                            $user = mysqli_query($conn,$check);
                            $result = mysqli_query($conn,$sql);

                            if($user){
                                while($cart = $result->fetch_assoc()){
                                    $sql2 = "SELECT * FROM cart WHERE cart_id = '".$cart["order_id"]."' ";
                                    $result2 = $conn->query($sql2);
                                    $data2 = mysqli_fetch_array($result2);

                                    $sql1 = "SELECT * FROM product WHERE product_id = '".$data2["p_id"]."' ";
                                    $result1 = $conn->query($sql1);
                                    $data = mysqli_fetch_array($result1);

                                    $c_id = $cart["order_id"];
                                    $total = ($data2["p_quantity"])*($data["product_price"]);
                                    $order = "SELECT * FROM history WHERE u_id ='$current_user' AND order_id='$c_id'";
                                    $order_id = mysqli_query($conn,$order);
                                    while($row = $order_id->fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td> <img src="../Product_reg/uploads/<?php echo $data['img_url']; ?>" width='100px' height='100px' alt="" style='border-radius: 5px'/></td>
                                        <td> <?php echo $data["product_name"]; ?> </td>
                                        <td> <?php echo $data["color_size"]; ?> </td>
                                        <td> <?php echo $data2["p_quantity"]; ?> </td>
                                        <td> <?php echo $total; ?> </td>
                                        <td> <?php echo $row["b_status"]; ?> </td>
                                    </tr>
                                    <?php
                                    }
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
    

    <!--jQuery------>
    <script src="../js/jQuery.js"></script>
    <!--script---->
    <script type="text/javascript">

        /*For-fix-menu-when-scroll---------------*/
        $(window).scroll(function(){
            if($(document).scrollTop() > 50){
                $('.navigation').addClass('fix-nav')
            }
            else{
                $('.navigation').removeClass('fix-nav')
            }
        })
        /*For-responsive-menu*/
        $(document).ready(function(){
            $('.toggle').click(function(){
                $('.toggle').toggleClass('active')
                $('.navigation').toggleClass('active')
            })
        })
           
    </script>
    <script src="../Home/main.js">

    </script>

    
</body>
</html>