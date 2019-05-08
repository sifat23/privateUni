<?php
include 'admin_header.php';
include 'connection.php';


$reds = array();
$greens = array();

function fill_uni_name($conn){
    $output = '';
    $sql = "SELECT * FROM details_uni";
    $result = mysqli_query($conn, $sql);
    $output .= '<option value="NULL" selected hidden>Please Select a Universty</option>';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '<option value="'.$row["id"].'">'.$row["university_name"].' ('.$row['short_uni_name'].')</option>';
    }
    return $output;
}

if (isset($_POST['cover_update'])){
    $old_image = $_POST['old_image'];
    $id = $_POST['id'];

    $target = "upload/".basename($_FILES['upload']['name']);
    $image = $_FILES['upload']['name'];


    if (! file_exists($_FILES["upload"]["tmp_name"])) {
        array_push($reds,"Please Choose the Cover Image");
    }

    if (count($reds) == 0){

        if ( $old_image == "") {
            //new one insert
            move_uploaded_file($_FILES['upload']['tmp_name'], $target);
            mysqli_query($conn , "UPDATE details_uni SET covar_image='$image' WHERE id='$id'");
            array_push($greens,"All are done");
        } else {
            //delete old one
            unlink("upload/$old_image");
            //new one insert
            move_uploaded_file($_FILES['upload']['tmp_name'], $target);
            mysqli_query($conn , "UPDATE details_uni SET covar_image='$image' WHERE id='$id'");
            array_push($greens,"All are done");
        }
    }
}


if (isset($_POST['p_update_one'])){
    $old_image = $_POST['old_image'];
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['person_name']);
    $message = mysqli_real_escape_string($conn, $_POST['person_m']);


    $target = "upload/".basename($_FILES['upload']['name']);
    $image = $_FILES['upload']['name'];

//    if (! file_exists($_FILES["upload"]["tmp_name"])) {
//        array_push($reds,"Please Choose the Cover Image");
//    }
//
    if (count($reds) == 0){
       //delete old one
        unlink("upload/$old_image");
        //new one insert
        move_uploaded_file($_FILES['upload']['tmp_name'], $target);
        mysqli_query($conn , "UPDATE details_uni SET `p_one_image`='$image' , `p_one_name`='$name' , `p_one_m`='$message' WHERE id='$id'");
        array_push($greens,"All are done");
    }
}


if (isset($_POST['p_update_two'])){
    $old_image = $_POST['old_image'];
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['person_name']);
    $message = mysqli_real_escape_string($conn, $_POST['person_m']);


    $target = "upload/".basename($_FILES['upload']['name']);
    $image = $_FILES['upload']['name'];

//    if (! file_exists($_FILES["upload"]["tmp_name"])) {
//        array_push($reds,"Please Choose the Cover Image");
//    }


    if (count($reds) == 0){

            //delete old one
            unlink("upload/$old_image");
            //new one insert
            move_uploaded_file($_FILES['upload']['tmp_name'], $target);
        mysqli_query($conn , "UPDATE details_uni SET `p_two_image`='$image' , `p_two_name`='$name' , `p_two_m`='$message' WHERE id='$id'");
            array_push($greens,"All are done");
    }
}


?>
<div style="margin-top: 6rem">
    <div class="container">

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

        <div class="card" style="padding: 1rem">
            <div class="d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control" id="uniName">
                            <?php echo fill_uni_name($conn); ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div  id="rest">
    </div>


</div>


<script>
    $(document).ready(function(){
        $('#uniName').change(function(){
            var id = $(this).val();
            $.ajax({
                url:"edit_load_data.php",
                method:"POST",
                data:{id:id},
                success:function(data){
                    $('#rest').html(data);
                }
            });
        });
    });
</script>


<?php
    include 'footer.php';
?>
