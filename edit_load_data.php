<?php

include 'connection.php';
if(isset($_POST["id"])) {
    if ($_POST["id"] != '') {
        $c = $_POST["id"];
        $sql = "SELECT * FROM `details_uni` WHERE id='$c'";
    } else {
        $sql = "SELECT * FROM `details_uni`";
    }

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){

        $uni_name = $row['university_name'];
        $cover = $row['covar_image'];
        $id = $row['id'];

        $one_name = $row['p_one_name'];
        $one_message = $row['p_one_m'];
        $one_image = $row['p_one_image'];

        $two_name = $row['p_two_name'];
        $two_message = $row['p_two_m'];
        $two_image = $row['p_two_image'];

        echo " 
        <div style='margin-top: 2rem;'>
            <div class='container' style='padding: 15px'>
                <div class='col-md-12'>
                    <div class=\"card\" style=\"margin-bottom: 1.5rem\">
                        <div style='padding: 1rem'>
                            <button class='nav-link custom-link' data-toggle=\"modal\" data-target=\"#CoverModal\">Edit This Section</button>
                        </div>
                        <div style=\"height: 25rem; background: url('upload/$cover') no-repeat; background-size: 100%;\">
                           <div class=\"cr-box\" align=\"center\">
                               <h1>$uni_name</h1>
                           </div>
                        </div>
                    </div>


                     <!-- person one edit filed -->
                    <div class='card cr' style='padding: 1rem'>
                        <div style='padding: 1rem'>
                            <button class='nav-link custom-link' data-toggle='modal' data-target='#ElementModalOne'>Edit This Section</button>
                        </div><hr>
                        <div style='text-align: center; margin-bottom: 20px''>
                            <h1>Message From Chairman</h1>
                        </div>
                        <div class='col-md-12'>
                            <div class='row'>
                                <div class='col-md-8'>
                                    <h2> $one_name </h2>
                                    <p> $one_message </p>
                                </div>
                                <div class='col-md-4'>
                                    <img src='upload/$one_image' >
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- person two edit filed -->
                    <div class='card cr' style='padding: 1rem; margin-top: 1rem'>
                        <div style='padding: 1rem'>
                            <button class='nav-link custom-link' data-toggle='modal' data-target='#ElementModalTwo'>Edit This Section</button>
                        </div><hr>
                        <div style='text-align: center; margin-bottom: 20px'>
                            <h1>Message From Vice Chancellor</h1>
                        </div>
                        <div class=\"col-md-12\">
                            <div class=\"row\">
                                <div class=\"col-md-4\">
                                    <img src='upload/$two_image'>
                                </div>
                                <div class=\"col-md-8\">
                                    <h2> $two_name </h2>
                                    <p> $two_message </p>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>



        <!-- Cover Image Modal -->
        <div class=\"modal fade\" id=\"CoverModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
            <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
                <div class=\"modal-content\">
                    <form action=\"more_uni_edit_field.php\" method=\"post\" enctype=\"multipart/form-data\">
                        <input type='hidden' name='id' value='$id'>
                        <input type='hidden' name='old_image' value='$cover'> 
                        <div class=\"modal-header\">
                            <h5 class=\"modal-title\" >Edit Cover Image</h5>
                        </div>
                        <div class=\"modal-body\">
                            <div class=\"row justify-content-center align-content-center\">
                                <div class=\"form-group\">
                                    <label class=\"custom-upload\">
                                        Upload a logo
                                        <input type='file' class=\"form-control\" name='upload'>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                            <button type=\"submit\" class=\"btn btn-primary\" name=\"cover_update\">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Modal Ends-->
    
   
      
        ";

        echo "
        <!-- person one edit filed -->
        <div class='modal fade' id='ElementModalOne' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <form action='more_uni_edit_field.php' method='post' enctype='multipart/form-data'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='hidden' name='old_image' value='$one_image'> 
                        <div class='modal-header'>
                            <h5 class='modal-title' >Edit Cover Image 1</h5>
                        </div>
                        <div class='modal-body'>
                            <div class='justify-content-center align-content-center'>
                            <div class='form-group'>
                                <label>The Name</label>
                                <input type='text' class='form-control' value='$one_name' name='person_name'>
                            </div>
                            <hr>
                            <div class='form-group'>
                                <label>The Message</label>
                                <textarea spellcheck='false' class='form-control' row='5' name='person_m' >$one_message</textarea>
                            </div>
                                <hr>
                                <div class='form-group'>
                                    <label class='custom-upload'>
                                        Upload a logo
                                        <input type='file' class='form-control' name='upload' id='upload'>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                            <button type='submit' class='btn btn-primary' name='p_update_one'>Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Modal Ends-->
    
    
        <!-- person two edit filed -->
        <div class='modal fade' id='ElementModalTwo' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <form action='more_uni_edit_field.php' method='post' enctype='multipart/form-data'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='hidden' name='old_image' value='$two_image'> 
                        <div class='modal-header'>
                            <h5 class='modal-title' >Edit Cover Image 2</h5>
                        </div>
                        <div class='modal-body'>
                            <div class='justify-content-center align-content-center'>
                            <div class='form-group'>
                                <label>The Name</label>
                                <input type='text' class='form-control' value='$two_name' name='person_name'>
                            </div>
                            <hr>
                            <div class='form-group'>
                                <label>The Message</label>
                                <textarea spellcheck='false' class='form-control' row='5' name='person_m'>$two_message</textarea>
                            </div>
                                <hr>
                                <div class='form-group'>
                                    <label class='custom-upload'>
                                        Upload a logo
                                        <input type='file' class='form-control' name='upload' id='upload'>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                            <button type='submit' class='btn btn-primary' name='p_update_two'>Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Modal Ends-->
        
        ";
    }
}
?>