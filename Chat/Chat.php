<?php
    session_start();
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
  
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แจ้งปัญหา</title>
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

    <div class="container" id="container">
        <form action="send.php" method="POST" enctype="multipart/form-data">
            <div class="text-reg">
                <strong>แจ้งปัญหาที่พบเจอ</strong>
                <p1>เพื่อความรวดเร็วในการช่วยเหลือของทีมงาน กรุณากรอกข้อมูลและข้อสงสัยของคุณให้ละเอียดและครบถ้วน<br>
                    ทีมงานจะรีบติดต่อกลับหาคุณทาง Email ที่คุณกรอกไว้<p1>
            </div>
            <div class="form-container register-container">
                <div class="box-reg">
                    <div class="register-detail">
                        <div class="select-box">
                            <div class="options-container">
                              <div class="option">
                                <input type="radio" class="radio" id="topic" name="topic" value ="ไม่ได้รับสินค้า"/>
                                <label for="not_get">ไม่ได้รับสินค้า</label>
                              </div>
                              <div class="option">
                                <input type="radio" class="radio" id="topic" name="topic" value ="ต้องการคืนสินค้า"/>
                                <label for="return">ต้องการคืนสินค้า</label>
                              </div>
                              <div class="option">
                                <input type="radio" class="radio" id="topic" name="topic" value ="ต้องการเคลมสินค้า"/>
                                <label for="replace">ต้องการเคลมสินค้า</label>
                              </div>
                            </div>
                            <div class="selected">
                              กรุณาเลือกปัญหา
                            </div>
                        </div>
                        <input  type="text" id="c_name" name="c_name" placeholder="ชื่อ-นามสกุล" required>
                        <input  type="tel" id="c_phone" name="c_phone" placeholder="เบอร์โทรติดต่อ" minlength="10" maxlength="10" required>
                        <input  type="email" id="c_email" name="c_email" placeholder="Email" required><br>
                        <textarea  type="text" id="detail" name="detail" placeholder="รายละเอียดของปัญหา (ไม่เกิน 100 ตัวอักษร)" minlength="0" maxlength="100" required></textarea>
                    </div>
                    <p2><br>ทีมงานจะรีบติดต่อกลับหาคุณทาง Email ที่คุณกรอกไว้<p2>
                </div>
            </div>
            <button class="submit-btn" type="submit" name="send_prob">ส่งเรื่อง</button>
        </form>
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
    <script src="main.js">

    </script>

    
</body>
</html>