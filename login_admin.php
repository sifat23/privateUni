<?php
include 'connection.php';

if(!isset($_SESSION)):
    session_start();
endif;

$errors = array();
$success = array();

if (isset($_POST['login'])):
        $email =  mysqli_real_escape_string($conn, $_POST[ 'email']);
        $pass =  mysqli_real_escape_string($conn, $_POST['pass']);

        if (empty($email)):
            array_push($errors,"Type a registered email address");
            if (empty($pass)):
                array_push($errors,"Password is required");
            endif;
        endif;

        if (count($errors) == 0){
            $sql = "SELECT * FROM admin WHERE email='$email' AND password='$pass'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)):
                $_SESSION['admin'] = "admin";
                header('location: admin.php'); //redirect to user homepage
            else:
                array_push($errors, "Invalid email and password!");
            endif;
        }
endif;

if (isset($_GET['logout'])):
    session_destroy();
    unset($_SESSION['admin']);
    header("location: login_admin.php");
endif;

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
    <title>Admin Login</title>
</head>
<body>

<div class="container" >
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="jumbotron" style="background: #2096ff; margin-top: 4rem">
                <?php if (count($errors) > 0): ?>
                    <?php foreach ($errors as $error): ?>
                        <div class="form-group">
                            <p style="margin-left: 1rem; margin-right: 1rem;" class="alert alert-danger"><?php echo $error; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <form action="login_admin.php" method="post">
                    <div class="card" style="padding: 2rem; text-align: center">
                        <h1 class="card-title"><b>LOGIN ADMIN</b></h1>

                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="pass">
                        </div>

                        <div>
                            <button class="btn btn-secondary" type="submit" name="login">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.js"></script>
