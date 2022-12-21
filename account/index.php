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
    <title>แก้ไขข้อมูลส่วนตัว</title>
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
                        include('connect.php');
                        $sql = "SELECT * FROM cart";
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
    
    <div class="accountMain">
        <form action="edit.php" method="POST" enctype="multipart/form-data">
            <div class="accountLeft" >
            <?php

                $current_user = $_SESSION['user_id'];
                $sql = "SELECT * FROM customer WHERE user_id = '$current_user'";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()){
            ?>
                <img src="../account/uploads/<?php echo $row['img_acc']; ?>" width='100px' height='80px' alt="" style='border-radius: 50%'/>
    
                <?php
            }
                ?>
                <input type="file" name="acc_image" id="acc_image" style="display: none" >
                <label for="acc_image" class="btn-choose">เปลี่ยนรูปโปรไฟล์</label>
                <?php
                include('connect.php');

                $current_user = $_SESSION['user_id'];
                $sql = "SELECT * FROM customer WHERE user_id = '$current_user'";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()){
                    ?>
                    <p style='color:blue; font-size:16px;'><?php echo "สวัสดีคุณ"  ?></p>
                    <h1 style='color:white;'><?php echo $row["username"]; ?></h1>
                    <?php
                }
                ?>
                <div class="acLeft">
                    <div class="bankacc">
                        <p><i class="fa-solid fa-user"></i><a href="index.php" class="accountInfo">บัญชีของฉัน</a></p>
                    </div>
                    <div class="bank">
                    <p><i class="fa-solid fa-cart-shopping"></i><a href="../Tracksupply/index.php" class="accountInfo">ตรวจสอบสถานะสินค้า</a></p>
                    <p><i class="fa-solid fa-money-check"></i><a href="BankAcc.php" class="accountInfo">บัญชีธนาคาร</a></p>
                    <p><i class="fa-solid fa-address-book"></i><a href="address.php" class="accountInfo">ที่อยู่</a></p>
                    <p><i class="fa-sharp fa-solid fa-key"></i><a href="password.php" class="accountInfo">เปลี่ยนรหัสผ่าน</a></p>
                    </div>
                </div>
            </div>
            <div class="account" >
                <h1>ข้อมูลของฉัน</h1>
                <h2>แก้ไขข้อมูลส่วนตัวของคุณ</h2>
                <div class="accountLine"></div>
                <div class="accountEditArea">
                    <section class="other">
                        <label>ชื่อ</label><input class="fname" type="text" id="fname" name="fname"><br>
                        <label>นามสกุล</label><input class="lname" type="text" id="lname" name="lname"><br>
                        <label>อีเมล</label><input class="email" type="email" id="email" name="email"><br>
                        <label>เบอร์ติดต่อ</label><input class="phone_num" type="tel" id="phone_num" name="phone_num" minlength="10" maxlength="10">
                    </section>
                    <section class="birthday"><label>วัน/เดือน/ปี เกิด</label><span>
                        <label for="day"></label>
                        <select name="bday" id="day"></select>
                    </span>
                    <span>
                        <label for="month"></label>
                        <select name="bmonth" id="month"></select>
                    </span>
                    <span>
                        <label for="year"></label>
                        <select name="byear" id="year">Year:</select><br>
                    </span>
                    </section>
                    <section class="sex">
                        <label>เพศ<input type="radio" name="sex" value="male"><label>ชาย</label>
                        <input type="radio" name="sex" value="female"><label>หญิง</label>
                        <input type="radio" name="sex" value="other"><label>อื่นๆ</label>
                    </section><br>
            
                    <a href="../Home/index.php"><button class="submit" type="submit" name="edit_user">เสร็จสิ้น</button></a>
                </div>
            <div>
        </form>
    </div>

    <script>
        
        const image_input = document.querySelector("#acc_image");

        image_input.addEventListener("change", function() {
        const reader = new FileReader();
        reader.addEventListener("load", () => {
            const uploaded_image = reader.result;
            document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
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
    <script src="script.js">

    </script>

</body>
</html>