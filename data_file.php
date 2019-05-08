<?php
    include 'connection.php';

    $output = '';

    if(isset($_POST["id"])) {
        if ($_POST["id"] != '') {
            $c = $_POST["id"];
            $sql = "SELECT * FROM `details_uni` WHERE id='$c'";
        } else {
            $sql = "SELECT * FROM `details_uni`";
        }

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result)){
            $uni_rank = $row['rank_allover'];
            $uni_id = $row['id'];
            echo "  <div class='form-group'>
                        <input type='hidden' value='$uni_id' name='id'>
                        <input type='text' class='form-control' value='$uni_rank' name='rank_uni'>
                    </div>
                    <div style='text-align: center'>
                        <button class='btn btn-secondary' type='submit' name='update'>UPDATE</button>
                    </div>              
            ";
        }
    }


    if(isset($_POST["uni_id"])) {
        $c = $_POST["uni_id"];
        $sql = "SELECT * FROM `course_table` WHERE versity_id='$c'";
        $result = mysqli_query($conn, $sql);
        $output .= '<option value="NULL" selected hidden>Select one...</option>';
        while($row = mysqli_fetch_array($result)){
            $output .= '<option value="'.$row["id"].'">'.$row["full_name"].'</option>';
        }
        echo $output;
    }

if(isset($_POST["course_id"])) {
    $c = $_POST["course_id"];
    $sql = "SELECT * FROM `course_table` WHERE id='$c'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $ssc = $row['ssc'];
        $hsc = $row['hsc'];
        $o_leve = $row['o_level'];
        $a_level = $row['a_level'];

        $physics = $row['physices'];
        $chemistry= $row['chemestry'];
        $mathematics = $row['mathematics'];
        $biology = $row['biology'];

        $total = $row['total_point'];

        $id_course = $row['id'];
        echo "  
                <input type='hidden' value='$id_course' name='course_id'>
                <div class='row justify-content-md-center' >
                    <div class='col-md-3'>
                        <div class='form-group'>
                            <label>SSC Result</label>
                            <input type='text' class='form-control' value='$ssc' name='ssc'>
                        </div>  
                    </div>
                    <div class='col-md-3'>
                        <div class='form-group'>
                            <label>HSC Result</label>
                            <input type='text' class='form-control' value='$hsc' name='hsc'>
                        </div>  
                    </div>
                    <div class='col-md-3'>
                        <div class='form-group'>
                            <label>A_LEVEL Result</label>
                            <input type='text' class='form-control' value='$a_level' name='a_lvl'>
                        </div>  
                    </div>
                    <div class='col-md-3'>
                        <div class='form-group'>
                            <label>O_LEVEL Result</label>
                            <input type='text' class='form-control' value='$o_leve' name='o_lvl'>
                        </div>  
                    </div>
                    <div class='col-md-3'>
                        <div class='form-group'>
                            <label>Physics Result</label>
                            <input type='text' class='form-control' value='$physics' name='phy'> 
                        </div>  
                    </div>
                    <div class='col-md-3'>
                        <div class='form-group'>
                            <label>Chemistry Result</label>
                            <input type='text' class='form-control' value='$chemistry' name='chem'>
                        </div>  
                    </div>
                    <div class='col-md-3'>
                        <div class='form-group'>
                            <label>Mathematics Result</label>
                            <input type='text' class='form-control' value='$mathematics' name='math'>
                        </div>  
                    </div>
                    <div class='col-md-3'>
                        <div class='form-group'>
                            <label>Biology Result</label>
                            <input type='text' class='form-control' value='$biology' name='bio'>
                        </div>  
                    </div>
                    <div class='col-md-3'>
                        <div class='form-group'>
                            <label>Total Result</label>
                            <input type='text' class='form-control' value='$total' name='total'>
                        </div>  
                    </div>
                </div>
                <div align='center'>
                    <button class='btn btn-secondary btn-lg' type='submit' name='update'>UPDATE</button>
                </div>
                ";
    }
}
?>