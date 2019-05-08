<?php
    include 'header.php';
    include 'connection.php';

    $reds = array();
    $greens = array();

//    if (isset($_POST['push'])){
//        $uni_name = $_POST['uni_name'];
//        $short_uni_name = $_POST['uni_short'];
//        $uni_rank = $_POST['uni_rank'];
//        $vc_name = $_POST['vc_name'];
//        $address = $_POST['uni_address'];
//        $location = $_POST['uni_location'];
//
//        $target = "upload/".basename($_FILES['upload']['name']);
//        $image = $_FILES['upload']['name'];
//
//
//        if (empty($uni_name) || empty($uni_rank) || empty($vc_name) || empty($address) || empty($short_uni_name) || empty($location)){
//            array_push($reds,"Fields are empty! Please fill up all");
//            // Validate file input to check if is not empty
//        } else {
//            if (! file_exists($_FILES["upload"]["tmp_name"])) {
//                array_push($reds,"Please Choose the university logo");
//            }
//        }
//
//        if (count($reds) == 0){
//            mysqli_query($conn, "INSERT INTO details_uni (location,short_uni_name,university_name,rank_allover,vc_name,university_address,v_logo) VALUES ('$location', '$short_uni_name', '$uni_name', '$uni_rank', '$vc_name', '$address', '$image')");
//           if (move_uploaded_file($_FILES['upload']['tmp_name'], $target)):
//               array_push($greens,"All are set. Good to go.");
//           endif;
//
//        }
//    }
?>

<div class="bg-local" xmlns="http://www.w3.org/1999/html" style="margin-top: 3rem">
    <div class="container" style="padding-top: 3rem; padding-bottom: 3rem;">
        <div class="card" style="padding: 1rem">
            <h3 class="card-title" align="center">This is the tilte</h3>
            <form action="info_insert.php" method="post" enctype="multipart/form-data">
                <div class="row justify-content-center align-content-center">
                    <div class="col-md-6">

                        <?php if (count($greens) > 0): ?>
                            <?php foreach ($greens as $green): ?>
                                <div class="form-group" align="center">
                                    <p style="margin-left: 2rem; margin-right: 2rem;" class="alert alert-success"><?php echo $green; ?></p>
                                </div>
                            <?php endforeach ?>
                        <?php endif; ?>

                        <?php if (count($reds) > 0): ?>
                            <?php foreach ($reds as $red): ?>
                                <div class="form-group"  align="center">
                                    <p style="margin-left: 2rem; margin-right: 2rem;" class="alert alert-danger"><?php echo $red; ?></p>
                                </div>
                            <?php endforeach ?>
                        <?php endif; ?>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Universty Name" name="uni_name">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Universty Name (SHORT)" name="uni_short">
                        </div>


                        <div class="form-group">
                            <input type="text" class="form-control" maxlength="2" placeholder="Universty Rank" name="uni_rank">
                        </div>


                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Vice-Chancellor Name" name="vc_name">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="University Address" name="uni_address">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="University Map Location" name="uni_location">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center align-content-center">
                    <div class="form-group">
                        <label class="custom-upload">
                            Upload Universty Logo
                            <input type="file" class="form-control" name="upload">
                        </label>
                    </div>
                </div>
                <hr>
                <div align="center">
                    <button type="submit" class="btn btn-light-green" style="width: 15rem; height: 5rem;" name="push">INSERT</button>
                </div>
            </form>
        </div>
    </div>
</div>
