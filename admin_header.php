<?php

if(!isset($_SESSION)):
    session_start();
endif;

$admin = $_SESSION['admin'];

if (empty($admin)){
    header("Location: login_admin.php");
}
?>



<html>
<head>
    <link href="admin_style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<!--Main Navigation-->
<header>



    <nav class="navbar fixed-top navbar-expand-lg navbar-dark black">
        <div class="container">
            <div class="collapse navbar-collapse justify-content-between align-items-center w-100">
                <ul class="navbar-nav mx-auto text-md-center text-left">
                    <li class="nav-item">
                        <a class="nav-link mold" href="admin.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mold" href="input_course_program.php">Insert</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mold" href="more_uni_edit_field.php">Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mold" href="admin_rank_edit.php">Rank Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mold" href="index.php">Back</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mold" href="course_edit.php">Cours Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mold" href="about.php">About</a>
                    </li>
                    <li>
                        <a class="nav-link" style="background: #9B1B30; color: white; boder" href="login_admin.php?logout='1'">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="background: black; color: white; text-align: center; height: 5rem; margin-top: 35px">
        <h1 style="padding-top: 2rem">Admin</h1>
    </div>
</header>

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.js"></script>

<script>
    var fixmeTop = $('.navbar').offset().top;
    $(window).scroll(function() {
        var currentScroll = $(window).scrollTop();
        if (currentScroll >= fixmeTop) {
            $('.navbar').css({
                position: 'fixed',
                top: '0',
                padding: '1rem'
            });
        } else {
            $('.navbar').css({
                position: 'static'
            });
        }
    });

</script>