<?php
    session_start();
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียนสินค้า</title>
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

    <div class="container" id="container">
        <form action="register.php" method="POST" enctype="multipart/form-data">
            <div class="text-reg">
                <strong>ลงทะเบียนสินค้า</strong>
            </div>
            <div class="form-container register-container">
                <div class="Boxchoosing">
                    <div id="imgBox"></div>
                    <p>โปรดอัพโหลดรูปภาพขนาดไม่เกิน 1 MB (.jpeg/.jpg/.png)</p>
                    <input type="file" name="product_image" id="product_image" style="display: none">
                    <label for="product_image" class="btn-choose">เลือกรูปภาพ</label>
                    
                </div>
                <div class="box-reg">
                    <div class="register-detail">
                        <input type="text" placeholder="ชื่อสินค้า" class="product_name" id="product_name" name="product_name" required>
                        <input type="text" placeholder="สี หรือ/และ ขนาดสินค้า" class="color_size" id="color_size" name="color_size" required>
                        <input type="number" placeholder="จำนวนสินค้า" class="quantity" id="quantity" name="quantity" required>
                        <input type="number" placeholder="ราคาสินค้า" class="product_price" id="product_price" name="product_price" required>
                        <input type="text" placeholder="รหัสประจำสินค้า (ถ้ามี)" class="product_price" id="serial" name="serial"><br><br>
                        <label for="category">เลือกหมวดหมู่สินค้า :</label>
                            <select name="category" id="category" style="font-size:15px;">
                                <option value="car">ยานยนต์</option>
                                <option value="clothes">เสื้อผ้า</option>
                                <option value="electronics">อุปกรณ์อิเล็กทรอนิกส์</option>
                                <option value="foods">อาหาร</option>
                            </select>
                        <button class="submit-btn" type="submit" name="reg_product">ลงทะเบียนสินค้า</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        
        const image_input = document.querySelector("#product_image");

        image_input.addEventListener("change", function() {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            const uploaded_image = reader.result;
            document.querySelector("#imgBox").style.backgroundImage = `url(${uploaded_image})`;
        });
        reader.readAsDataURL(this.files[0]);
});

    </script>


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
    <script src="../Home/main.js"></script>

</body>
</html>