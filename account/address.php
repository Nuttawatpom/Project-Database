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
    <title>ที่อยู่</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="shortcut icon" href="../img/Logo.png">
    <link rel="stylesheet" href="./address.css">
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
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
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
                <a href="#" class="mail-box">    
                    <i class="fa fa-envelope">
                    </i>
                </a>
                <!--user----->
                <div class="dropdown">
                    <a href="#" class="address">
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
        <div class="accountLeft" >
            <?php
                include('connect.php');

                $current_user = $_SESSION['user_id'];
                $sql = "SELECT * FROM customer WHERE user_id = '$current_user'";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()){
                    ?>
                    <img src="../account/uploads/<?php echo $row['img_acc']; ?>" width='100px' height='80px' alt="" style='border-radius: 50%'/>
                    <?php
                }
                ?>
            <?php
                $current_user = $_SESSION['user_id'];
                $sql = "SELECT * FROM customer WHERE user_id = '$current_user'";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()){
                    ?>
                    <p style='color:blue;'><?php echo "สวัสดีคุณ"  ?></p>
                    <h1 style='color:white;'><?php echo $row["username"]; ?></h1>
                    <?php
                }
                ?>
            <div class="acLeft">
                    <div class="bank">
                        <p><i class="fa-solid fa-user"></i><a href="index.php" class="accountInfo">บัญชีของฉัน</a></p>
                    </div>
                    <p><i class="fa-solid fa-cart-shopping"></i><a href="../Tracksupply/index.php" class="accountInfo">ตรวจสอบสถานะสินค้า</a></p>
                    <p><i class="fa-solid fa-money-check"></i><a href="BankAcc.php" class="accountInfo">บัญชีธนาคาร</a></p>
                    <div class="bankacc">
                        <p><i class="fa-solid fa-address-book"></i><a href="address.php" class="accountInfo">ที่อยู่</a></p>
                    </div>
                    <p><i class="fa-sharp fa-solid fa-key"></i><a href="password.php" class="accountInfo">เปลี่ยนรหัสผ่าน</a></p>
            </div>
        </div>
        <div class="account" >
            <div class="block-detail">
                <h1>ที่อยู่</h1>
                <h2>แก้ไขที่อยู่ของคุณ</h2>
            </div>
            <div class="accountLine"></div>
            <div class="accountEditArea">
                <form action="edit_address.php" method="POST">
                    <div class="text-detail">
                        <input class="username" type="text" id="ship_name" name="ship_name" placeholder="ชื่อ-นามสกุล" required>
                        <input class="tel" type="tel" id="ship_num" name="ship_num" placeholder="เบอร์โทรติดต่อ" minlength="10" maxlength="10" size="10" required>
                        <input class="tel-post" type="tel" id="zip" name="zip"placeholder="รหัสไปรษณีย์" minlength="0" maxlength="5" size="5" required>
                        <input class="province" type="text" id="province" name="province" placeholder="ตำบล,เขต/อำเภอจังหวัด,จังหวัด" required>
                        <textarea type="text" id="detail_add" name="detail_add" placeholder="รายละเอียดที่อยู่ (ชื่ออาคาร, ชื่อหมู่บ้าน ฯลฯ)" required></textarea>
                    </div>
                    <!--<textarea type="text" id="detail" name="detail" placeholder="ที่อยู่ของคุณ" required=""></textarea>-->
                    <button class="submit" type="submit" name="edit_addr">เสร็จสิ้น</button></a>
                </form>
            </div>
        <div>
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
    <script src="script.js">

    </script>

    
</body>
</html>