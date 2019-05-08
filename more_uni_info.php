<?php
include 'connection.php';
include 'header.php';


$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM details_uni WHERE id='$id'"));
$cover_image = $row['covar_image'];
$chairman_image = $row['p_one_image'];
$chairman_name = $row['p_one_name'];
$chairman_msg = $row['p_one_m'];
$vc_image = $row['p_two_image'];
$vc_name = $row['p_two_name'];
$vc_msg = $row['p_two_m'];
$versity_name = $row['university_name'];


?>

<div style="margin-top: 5rem;">
    <div class="container" style="padding: 15px">
        <div class="col-md-12">
            <div class="card" style="margin-bottom: 1.5rem">
                <div style="height: 25rem; background: url('upload/<?php echo $cover_image ?>') no-repeat; background-size: 100%;">
                   <div class="cr-box" align="center">
                       <h1><?php echo $versity_name ?></h1>
                   </div>
                </div>
            </div>

            <div class="card cr" style="padding: 1rem">
                <div class="col-md-12">
                    <div style='text-align: center; margin-bottom: 20px''>
                        <h1>Message From Chairman</h1>
                    </div><hr>
                    <div class="row">
                        <div class="col-md-8">
                            <h2><?php echo $chairman_name ?></h2>
                            <p><?php echo $chairman_msg ?></p>
                        </div>
                        <div class="col-md-4">
                            <img src='upload/<?php echo $chairman_image ?>' class="img-thumbnail th-thumb">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card cr" style="padding: 1rem; margin-top: 1rem">
                <div class="col-md-12">
                    <div style='text-align: center; margin-bottom: 20px'>
                        <h1>Message From Vice Chancellor</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="upload/<?php echo $vc_image ?>" class="img-thumbnail th-thumb">
                        </div>
                        <div class="col-md-8">
                            <h2><?php echo $vc_name ?></h2>
                            <p><?php echo $vc_msg ?></p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card cr" style="padding: 1rem; margin-top: 1rem" >
                <div class="row justify-content-md-center">
                    <a class="nav-link custom-academic" href="academic_info.php?id=<?php echo $id?>">Academic Information Center</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
