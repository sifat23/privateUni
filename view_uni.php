<?php
include 'header.php';
include 'connection.php';
?>


<div style="margin-top: 5rem">
    <div class="container d-flex justify-content-center">
        <div class="col-md-10">
                <?php
                    $sql = "SELECT * FROM details_uni ORDER BY rank_allover";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)):
                        $id = $row['id'];
                        $logo = $row['v_logo'];
                        $title = $row['university_name'];
                        $vc = $row['vc_name'];
                        $address = $row['university_address'];
                        $location =$row['location'];
                        echo "  <div class='card' style='padding: 2rem; margin-bottom: 1rem; margin-top: 1rem;'>
                                    <div class='row'>
                                        <div class='col-md-3'>
                                            <img src='upload/$logo' height='400' width='200' class='img-thumbnail'>
                                        </div>
                                        <div class='col-md-9'>
                                            <h3> $title </h3>
                                            <p> Vice Chancellor : &nbsp;$vc</p>
                                            <p> Address : &nbsp;$address</p>
                                            <div class='row'>
                                                <div class='col-md-5'>
                                                    <a class='nav-link custom-link' href='more_uni_info.php?id=$id'><i class='fas fa-info-circle'></i> More Information</a>
                                                </div>
                                                <div class='col-md-5'>
                                                    <a class='nav-link custom-map-link' href='$location'><i class='fas fa-map-marker'></i> Get Map Location</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                    endwhile;
                ?>
        </div>
    </div>
</div>
