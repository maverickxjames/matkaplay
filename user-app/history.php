<?php 
include './db.php';
$userid = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.com/pwa/taxify/user-app/history by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Sep 2024 04:37:04 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="taxify">
    <meta name="keywords" content="taxify">
    <meta name="author" content="taxify">
    <link rel="manifest" href="manifest.json">
    <link rel="icon" href="../assets/images/logo/favicon.png" type="image/x-icon">
    <title>Matka Play </title>

    <link rel="apple-touch-icon" href="../assets/images/logo/favicon.png">
    <meta name="title-color" content="#01AA85">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="taxify">
    <meta name="msapplication-TileImage" content="../assets/images/logo/favicon.png">

    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <!-- iconsax css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/iconsax.css">

    <!-- bootstrap css -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="../assets/css/vendors/bootstrap.css">



    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="../assets/css/style.css">
    <style>
        .box-shadow {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
    </style>
</head>

<body>
    <!-- header starts -->
    <header id="header" class="main-header inner-page-header">
        <div class="custom-container">
            <div class="header-panel">
                <div class="d-flex align-items-center gap-2">
                    <a href="#offcanvasLeft" data-bs-toggle="offcanvas">
                        <i class="iconsax icon-btn" data-icon="text-align-left"> </i>
                    </a>
                    <h3 class="categories-title"> History</h3>
                </div>

                <div class="d-flex align-items-center gap-sm-3 gap-2">
                    <a href="chatting">
                        <i class="iconsax icon-btn" data-icon="messages-2"> </i>
                    </a>
                    <a href="notification">
                        <i class="iconsax icon-btn" data-icon="bell-2"> </i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- my ride section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <ul class="nav nav-pills my-ride-tab w-100 border-0 m-0" id="Tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pill-active-tab" data-bs-toggle="pill"
                        data-bs-target="#active-tab">Deposit</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="pill-pending-tab" data-bs-toggle="pill"
                        data-bs-target="#pending-tab">Withdraw</button>
                </li>
            </ul>

            <div class="tab-content ride-content" id="TabContent">

                <?php
                $query = "SELECT * FROM paymenthistory WHERE userid = '$userid' AND type = 'deposit' ORDER BY id DESC";
                $run = mysqli_query($con, $query);

                if (mysqli_num_rows($run) > 0) {
                ?>
                    <div class="tab-pane fade active show" id="active-tab">
                        <ul class="my-ride-list">
                            <?php
                            while ($row = mysqli_fetch_assoc($run)) {
                                if ($row['status'] == 2) {
                            ?>
                                    <li class="mt-2 box-shadow">
                                        <div class="my-ride-box">
                                            <div class="my-ride-head">
                                                <a href="#" class="my-ride-img">
                                                    <img class="img-fluid my-ride-icon" src="https://cdn-icons-png.flaticon.com/512/10432/10432837.png"
                                                        alt="receipt">
                                                </a>

                                                <div class="my-ride-content flex-column">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <a href="#">
                                                            <h6 class="title-color fw-medium">Recharge ID : <?=$row['order_id'] ?></h6>
                                                        </a>
                                                        <span class="status secondary-color fw-normal">Unpaid</span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between  mt-2">
                                                        <h6 class="success-color" style="font-size: 12px;">₹ <?=$row['amount'] ?></h6>
                                                        <h6 class="fw-normal content-color"><?=$row['created_at'] ?></h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="my-ride-details">
                                                <div class="ride-info">
                                                    <div class="ride-info-content">
                                                        <div class="d-flex align-content-center gap-2 lh-base">
                                                            <span class="count content-color fw-normal">UPI: </span>
                                                            <h5 class="fw-normal title-color"><?=$row['upi'] ?></h5>
                                                        </div>
                                                        <h6 class="fw-normal content-color mt-2">UTR : <?php if($row['utr'] == null){echo "NULL";}else{echo $row['utr'];} ?></h6>
                                                    </div>
                                                    <img class="img-fluid profile-img" src="https://cdn-icons-png.flaticon.com/512/2267/2267901.png"
                                                        alt="p5">
                                                </div>

                                                <ul class="ride-location-listing mt-3">
                                                    <li class="location-box">
                                                        <img class="icon" src="https://themes.pixelstrap.com/pwa/taxify/assets/images/svg/location-fill.svg"
                                                            alt="location">
                                                        <h5 class="fw-light title-color">Recharge Initiated...</h5>
                                                    </li>

                                                    <li class="location-box">
                                                        <img class="icon" src="https://themes.pixelstrap.com/pwa/taxify/assets/images/svg/gps.svg" alt="gps">
                                                        <h5 class="fw-light title-color border-0">Status Pending...
                                                        </h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                } elseif ($row['status'] == 1) {
                                ?>
                                    <li class="mt-2 box-shadow">
                                        <div class="my-ride-box">
                                            <div class="my-ride-head">
                                                <a href="#" class="my-ride-img">
                                                    <img class="img-fluid my-ride-icon" src="https://cdn-icons-png.flaticon.com/512/10432/10432837.png"
                                                        alt="receipt">
                                                </a>

                                                <div class="my-ride-content flex-column">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <a href="#">
                                                            <h6 class="title-color fw-medium">Recharge ID : <?=$row['order_id']?></h6>
                                                        </a>
                                                        <span class="status success-color fw-normal">Success</span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between  mt-2">
                                                        <h6 class="success-color" style="font-size: 12px;">₹ <?=$row['amount']?></h6>
                                                        <h6 class="fw-normal content-color"><?=$row['created_at']?></h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="my-ride-details">
                                                <div class="ride-info">
                                                    <div class="ride-info-content">
                                                        <div class="d-flex align-content-center gap-2 lh-base">
                                                            <span class="count content-color fw-normal">UPI: </span>
                                                            <h5 class="fw-normal title-color"><?=$row['upi']?></h5>
                                                        </div>
                                                        <h6 class="fw-normal content-color mt-2">UTR : <?php if($row['utr'] == null){echo "NULL";}else{echo $row['utr'];} ?></h6>
                                                    </div>
                                                    <img class="img-fluid profile-img" src="https://cdn-icons-png.flaticon.com/512/2267/2267901.png"
                                                        alt="p5">
                                                </div>

                                                <ul class="ride-location-listing mt-3">
                                                    <li class="location-box">
                                                        <img class="icon" src="https://themes.pixelstrap.com/pwa/taxify/assets/images/svg/location-fill.svg"
                                                            alt="location">
                                                        <h5 class="fw-light title-color">Recharge Initiated...</h5>
                                                    </li>

                                                    <li class="location-box">
                                                        <img class="icon" src="https://themes.pixelstrap.com/pwa/taxify/assets/images/svg/gps.svg" alt="gps">
                                                        <h5 class="fw-light title-color border-0">Status Complete
                                                        </h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                } elseif ($row['status'] == 0) {
                                ?>
                                    <li class="mt-2 box-shadow">
                                        <div class="my-ride-box">
                                            <div class="my-ride-head">
                                                <a href="#" class="my-ride-img">
                                                    <img class="img-fluid my-ride-icon" src="https://cdn-icons-png.flaticon.com/512/10432/10432837.png"
                                                        alt="receipt">
                                                </a>

                                                <div class="my-ride-content flex-column">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <a href="#">
                                                            <h6 class="title-color fw-medium">Recharge ID : <?=$row['order_id']?></h6>
                                                        </a>
                                                        <span class="status error-color fw-normal">Failed</span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between  mt-2">
                                                        <h6 class="success-color" style="font-size: 12px;">₹ <?=$row['amount']?></h6>
                                                        <h6 class="fw-normal content-color">15<?=$row['created_at']?></h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="my-ride-details">
                                                <div class="ride-info">
                                                    <div class="ride-info-content">
                                                        <div class="d-flex align-content-center gap-2 lh-base">
                                                            <span class="count content-color fw-normal">UPI: </span>
                                                            <h5 class="fw-normal title-color"><?=$row['upi']?></h5>
                                                        </div>
                                                        <h6 class="fw-normal content-color mt-2">UTR : <?php if($row['utr'] == null){echo "NULL";}else{echo $row['utr'];} ?></h6>
                                                    </div>
                                                    <img class="img-fluid profile-img" src="https://cdn-icons-png.flaticon.com/512/2267/2267901.png"
                                                        alt="p5">
                                                </div>

                                                <ul class="ride-location-listing mt-3">
                                                    <li class="location-box">
                                                        <img class="icon" src="https://themes.pixelstrap.com/pwa/taxify/assets/images/svg/location-fill.svg"
                                                            alt="location">
                                                        <h5 class="fw-light title-color">Recharge Initiated...</h5>
                                                    </li>

                                                    <li class="location-box">
                                                        <img class="icon" src="https://themes.pixelstrap.com/pwa/taxify/assets/images/svg/gps.svg" alt="gps">
                                                        <h5 class="fw-light title-color border-0">Status Failed
                                                        </h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                            <?php
                                }
                            }
                            ?>



                        </ul>
                    </div>
                <?php
                } else {
                }


                ?>


<?php
                $query2 = "SELECT * FROM paymenthistory WHERE userid = '$userid' AND type = 'withdraw' ORDER BY id DESC";
                $run2 = mysqli_query($con, $query2);

                if (mysqli_num_rows($run2) > 0) {
                    ?>
                    <div class="tab-pane fade" id="pending-tab">
                    <ul class="my-ride-list">
                        <?php 
                        while ($row2 = mysqli_fetch_assoc($run2)) {
                            if($row2['status'] == 2){
                                ?>
                                <li>
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="pending-ride-details" class="my-ride-img">
                                        <img class="img-fluid my-ride-icon" src="https://cdn-icons-png.flaticon.com/512/10432/10432837.png"
                                            alt="receipt">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="pending-ride-details">
                                                <h6 class="title-color fw-medium">WITHDRAW ID : <?=$row2['order_id'] ?></h6>
                                            </a>
                                            <span class="status secondary-color fw-normal">Pending</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between  mt-2">
                                            <h6 class="fw-mediun success-color">₹ <?=$row2['amount'] ?></h6>
                                            <h6 class="fw-normal content-color"><?=$row2['created_at'] ?></h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <div class="ride-info-content">
                                            <div class="d-flex align-content-center gap-2 lh-base">
                                                <h5 class="fw-normal title-color">Mode</h5>
                                                <div class="d-flex align-items-center gap-1">
                                                    <span class="count content-color fw-normal">UPI</span>
                                                </div>
                                            </div>
                                            <h6 class="fw-normal content-color mt-1"><?=$row2['remark'] ?></h6>
                                        </div>
                                        <img class="img-fluid profile-img" src="https://cdn-icons-png.flaticon.com/512/2267/2267901.png"
                                            alt="p5">
                                    </div>
                                    <ul class="ride-location-listing mt-3">
                                        <li class="location-box">
                                            <img class="icon" src="https://themes.pixelstrap.com/pwa/taxify/assets/images/svg/location-fill.svg"
                                                alt="location">
                                            <h5 class="fw-light title-color">Withdraw Initiated...</h5>
                                        </li>

                                        <li class="location-box">
                                            <img class="icon" src="https://themes.pixelstrap.com/pwa/taxify/assets/images/svg/gps.svg" alt="gps">
                                            <h5 class="fw-light title-color border-0">Status : Pending
                                            </h5>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </li>
                                <?php 
                            }elseif($row2['status'] == 1){
                                ?>
                                <li>
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="pending-ride-details" class="my-ride-img">
                                        <img class="img-fluid my-ride-icon" src="https://cdn-icons-png.flaticon.com/512/10432/10432837.png"
                                            alt="receipt">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="pending-ride-details">
                                                <h6 class="title-color fw-medium">WITHDRAW ID : <?=$row2['order_id'] ?></h6>
                                            </a>
                                            <span class="status success-color fw-normal">Success</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between  mt-2">
                                            <h6 class="fw-mediun success-color">₹ <?=$row2['amount'] ?></h6>
                                            <h6 class="fw-normal content-color"><?=$row2['created_at'] ?></h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <div class="ride-info-content">
                                            <div class="d-flex align-content-center gap-2 lh-base">
                                                <h5 class="fw-normal title-color">Mode : </h5>
                                                <div class="d-flex align-items-center gap-1">
                                                    <span class="count content-color fw-normal">UPI</span>
                                                </div>
                                            </div>
                                            <h6 class="fw-normal content-color mt-1"><?=$row2['remark'] ?></h6>
                                        </div>
                                        <img class="img-fluid profile-img" src="https://cdn-icons-png.flaticon.com/512/2267/2267901.png"
                                            alt="p5">
                                    </div>
                                    <ul class="ride-location-listing mt-3">
                                        <li class="location-box">
                                            <img class="icon" src="https://themes.pixelstrap.com/pwa/taxify/assets/images/svg/location-fill.svg"
                                                alt="location">
                                            <h5 class="fw-light title-color">Withdraw Initiated....</h5>
                                        </li>

                                        <li class="location-box">
                                            <img class="icon" src="https://themes.pixelstrap.com/pwa/taxify/assets/images/svg/gps.svg" alt="gps">
                                            <h5 class="fw-light title-color border-0">Withdraw Success
                                            </h5>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </li>
                                <?php 
                            }elseif($row2['status'] == 0){
                                ?>
                                <li>
                            <div class="my-ride-box">
                                <div class="my-ride-head">
                                    <a href="pending-ride-details" class="my-ride-img">
                                        <img class="img-fluid my-ride-icon" src="https://cdn-icons-png.flaticon.com/512/10432/10432837.png"
                                            alt="receipt">
                                    </a>

                                    <div class="my-ride-content flex-column">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="pending-ride-details">
                                                <h6 class="title-color fw-medium">WITHDRAW ID : <?=$row2['order_id'] ?></h6>
                                            </a>
                                            <span class="status error-color fw-normal">Cancelled</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between  mt-2">
                                            <h6 class="fw-mediun success-color">₹ <?=$row2['amount'] ?></h6>
                                            <h6 class="fw-normal content-color"><?=$row2['created_at'] ?></h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-ride-details">
                                    <div class="ride-info">
                                        <div class="ride-info-content">
                                            <div class="d-flex align-content-center gap-2 lh-base">
                                                <h5 class="fw-normal title-color">Mode : </h5>
                                                <div class="d-flex align-items-center gap-1">
                                                    <span class="count content-color fw-normal">UPI</span>
                                                </div>
                                            </div>
                                            <h6 class="fw-normal content-color mt-1"><?=$row2['remark'] ?></h6>
                                        </div>
                                        <img class="img-fluid profile-img" src="https://cdn-icons-png.flaticon.com/512/2267/2267901.png"
                                            alt="p5">
                                    </div>
                                    <ul class="ride-location-listing mt-3">
                                        <li class="location-box">
                                            <img class="icon" src="https://themes.pixelstrap.com/pwa/taxify/assets/images/svg/location-fill.svg"
                                                alt="location">
                                            <h5 class="fw-light title-color">Withdraw Initiated....</h5>
                                        </li>

                                        <li class="location-box">
                                            <img class="icon" src="https://themes.pixelstrap.com/pwa/taxify/assets/images/svg/gps.svg" alt="gps">
                                            <h5 class="fw-light title-color border-0">Withdraw Cancelled
                                            </h5>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </li>
                                <?php 
                            }
                        }
                        ?>
                        
                        
                        
                    </ul>
                </div>
                    <?php 
                }else{

                }
                ?>

                



            </div>
        </div>
    </section>
    <!-- my ride section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- bottom navbar start -->
    <div class="navbar-menu">
        <ul>
            <li>
                <a href="home">
                    <div class="icon">
                        <img class="unactive" src="https://themes.pixelstrap.com/pwa/taxify/assets/images/svg/home.svg" alt="home">
                        <img class="active" src="https://themes.pixelstrap.com/pwa/taxify/assets/images/svg/home-fill.svg" alt="home">
                    </div>
                    <span class="active">Home</span>
                </a>
            </li>

            <li>
                <a href="wallet">
                    <div class="icon">
                        <img style="width:25px" class="unactive" src="https://cdn-icons-png.flaticon.com/512/482/482541.png" alt="category">
                        <img style="width:25px" class="active" src="https://cdn-icons-png.flaticon.com/512/60/60484.png" alt="category">
                    </div>
                    <span>Wallet</span>
                </a>
            </li>

            <li>
                <a href="setting">
                    <div class="icon">
                        <img style="width:25px" class="unactive" src="https://cdn-icons-png.flaticon.com/512/2040/2040504.png" alt="car">
                        <img style="width:25px" class="active" src="https://cdn-icons-png.flaticon.com/512/3524/3524659.png" alt="car">
                    </div>
                    <span>Setting</span>
                </a>
            </li>

            <li>
                <a href="bids">
                    <div class="icon">
                        <img style="width:25px" class="unactive" src="https://cdn-icons-png.flaticon.com/512/783/783196.png" alt="car">
                        <img style="width:25px" class="active" src="https://cdn-icons-png.flaticon.com/512/2639/2639683.png" alt="car">
                    </div>
                    <span>All Bids</span>
                </a>
            </li>


            <li class="active">
                <a href="history">
                    <div class="icon">
                        <img style="width:25px" class="unactive" src="https://cdn-icons-png.flaticon.com/512/1157/1157077.png" alt="setting">
                        <img style="width:25px" class="active" src="https://cdn-icons-png.flaticon.com/128/149/149880.png" alt="setting">
                    </div>
                    <span>History</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- bottom navbar end -->

    <!-- sidebar starts -->
    <div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft">
        <div class="offcanvas-header sidebar-header">
            <div class="sidebar-logo">
                <img class="img-fluid logo" src="../assets/images/logo/logo.png" alt="logo">
                <img class="img-fluid logo-dark" src="../assets/images/logo/logo-dark.png" alt="logo">
            </div>
        </div>
        <div class="offcanvas-body">
            <a href="profile" class="profile-part d-flex align-items-center gap-2">
                <img class="img-fluid profile-pic" src="../assets/images/profile/p8.png" alt="p8">
                <div>
                    <h3>Ashok Matkaplay</h3>
                    <span>Edit Account</span>
                </div>
            </a>
            <ul class="link-section switch-section">
                <li class="active">
                    <a href="home" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="home-2"> </i>
                        <h3>Home</h3>
                    </a>
                </li>
                <li>
                    <a href="history" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="car"> </i>
                        <h3>Account Statement</h3>
                    </a>
                </li>
                <li>
                    <a href="notification" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="bell-2"> </i>
                        <h3>Notification</h3>
                    </a>
                </li>

                <li>
                    <a href="setting" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="user-1"> </i>
                        <h3>Setting</h3>
                    </a>
                </li>
                <li>
                    <a href="#0" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="book-closed"> </i>
                        <h3>Terms & Condition</h3>
                    </a>
                </li>

                <li>
                    <a href="rates" class="pages">
                        <i class="iconsax sidebar-icon" data-icon="document-text-1"> </i>
                        <h3> Game Rates</h3>
                    </a>
                </li>

                <!-- <li>
                    <div class="pages">
                        <i class="iconsax sidebar-icon" data-icon="brush-3"> </i>
                        <h3>Dark</h3>
                    </div>
                    <div class="switch-btn">
                        <input id="dark-switch" type="checkbox">
                    </div>
                </li> -->

            </ul>

            <div class="bottom-sidebar">
                <a href="login" class="pages">
                    <i class="iconsax sidebar-icon" data-icon="logout-2"> </i>
                    <h3>Logout</h3>
                </a>
            </div>
        </div>
    </div>
    <!-- sidebar end -->

    <!-- iconsax js -->
    <script src="../assets/js/iconsax.js"></script>

    <!-- bootstrap js -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <!-- sticky-header js -->
    <script src="../assets/js/sticky-header.js"></script>

    <!-- template-setting js -->
    <script src="../assets/js/template-setting.js"></script>

    <!-- script js -->
    <script src="../assets/js/script.js"></script>
</body>


<!-- Mirrored from themes.pixelstrap.com/pwa/taxify/user-app/history by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Sep 2024 04:37:05 GMT -->

</html>