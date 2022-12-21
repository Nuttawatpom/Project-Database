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
    <link rel="stylesheet" href="./Home.css">
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
            <a class="logo">
                <img src="../img/Logo.png" height="100" width="100">
            </a>
            <!--Menu-Icon------------>
            <div class="toggle"></div>
            <!--menu------->
            <ul class="menu">
                <li><a href="../admin/home.php"><b>หน้าหลัก</b></a></li>
                <li><a href="../admin/manage.php"><b>จัดการคำสั่งซื้อ</b></a>
                </li>
                <li><a href="../admin/admin.php"><b>กล่องข้อความ</b></a></li>
            </ul>
            <!---right-menu------->
            <div class="right-menu">
                <div class="dropdown">
                    <a href="" class="address">
                        <i class="fas fa-address-book"></i>
                    </a>
                    <div class="dropdown-content" >
                        <form action='../db_connect/logout.php' method='POST'>
                            <a href="../login/index.php">Logout</a>
                        </form>
                    </div>
                </div>
                ADMIN ACCOUNT
            </div>
        </div>
    </nav>
    
    <div class="container" id="container">

    <?php
        include('connect.php');
        $current_user = $_SESSION['admin_username'];
            $sql = "SELECT * FROM admin WHERE admin_uname = '$current_user'";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()){
                ?>
                <div class="welcome-admin">
                    <strong><?php echo "สวัสดี! แอดมิน"  ?></strong>
                    <h1 style="color: red;"><?php echo $row["admin_name"]; ?></h1>
                </div>
                <?php
            }
        ?>

    <?php
        $sql = "SELECT * FROM payment";
        $result = $conn->query($sql);
        $row = mysqli_num_rows($result);
        ?>
        <div class="check-text">
            <strong><?php echo "คุณมีคำสั่งซื้อรอตรวจสอบจำนวน&nbsp" ?></strong>
            <strong style="color:blue;"><?php echo $row; ?></strong>
            <strong><?php echo "&nbspรายการ" ?></strong>
        </div>

    <?php
        $sql = "SELECT * FROM contract";
        $result = $conn->query($sql);
        $row = mysqli_num_rows($result);
        ?>
        <div class="check-text">
            <strong><?php echo "คุณมีข้อความรอการตอบกลับจำนวน&nbsp" ?></strong>
            <strong style="color:blue;"><?php echo $row; ?></strong>
            <strong><?php echo "&nbspข้อความ" ?></strong>
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