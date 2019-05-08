<?php
include 'header.php';
include 'connection.php';

if (isset($_POST['load'])){
    $sub_name =  $_POST['sub_name'];
    mysqli_query($conn, "INSERT INTO subject (sub_name) VALUE ('$sub_name')");
}

?>
<div class="container" style="margin-top: 7rem">
    <div class="card" style="padding: 1rem">
        <form action="sub_entry.php" method="post">
            <div class="row justify-content-md-center">
                <div class="col-md-6 form-group">
                    <input type="text" class="form-control" placeholder="Please enter subject name" name="sub_name">
                </div>
            </div>

            <div align="center">
                <button type="submit" class="btn btn-outline-secondary" name="load">
                    Load
                </button>
            </div>
        </form>
    </div>
</div>
