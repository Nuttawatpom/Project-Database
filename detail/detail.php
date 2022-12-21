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
    <title>Home</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="shortcut icon" href="../img/Logo.png">
    <link rel="stylesheet" href="./detail.css">
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
                <a href="../mailbox/mailbox.html" class="mail-box">    
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
    
    <div class="container" id="container">
        <div class="form-container">
            <div class="left-container">
                <div class="img-container">
                    <img src="../img/item-1.png" alt="">
                </div>
                <a href="http://localhost/ezshop/C_SHOP/c_shop.html?">
                    <button>ติดต่อร้านค้า</button>
                </a>
            </div>
            <div class="detail-item-container">
                <div class="detail-item">
                    <div class="header-detail">
                        <strong>รายละเอียดสินค้า</strong>
                    </div>
                    <div class="box-detail">
                        <p>ชื่อสินค้า: Iphone14 Promax</p>
                        <p>ราคาสินค้า: 55,000 บาท</p>
                        <p>จำนวนสินค้า(เหลือ): 100 ชิ้น</p>
                        <div class="color-box">
                            <p>สีของสินค้า:</p>
                            <div class="color"></div>
                                <div class="red"></div>
                                <div class="black"></div>
                                <div class="white"></div>
                                <div class="yellow"></div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-detail">
                        <button>ซื้อสินค้า</button>
                        <button>นำใส่ตระกร้า</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    <!--jQuery------>
    <script src="../js/jQuery.js"></script>
    <!--script---->
    <script type="text/javascript">
        function show_modal(id){
                /*--------------pop-up-------------------*/
            const open = document.getElementById(id)
            const modal_container = document.getElementById('modal_container')
            const close = document.getElementById('close')

            open.addEventListener('click', () => {
                modal_container.classList.add('show');
            });

            close.addEventListener('click', () => {
                modal_container.classList.remove('show')
            })
        }
        /*--------------pop-up-------------------*/
        const open = document.getElementById('open')
        const modal_container = document.getElementById('modal_container')
        const close = document.getElementById('close')

        open.addEventListener('click', () => {
            modal_container.classList.add('show');
        });

        close.addEventListener('click', () => {
            modal_container.classList.remove('show')
        })

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