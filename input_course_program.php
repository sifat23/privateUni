<?php
include 'connection.php';
include 'admin_header.php';



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

function fill_sub_name($conn){
    $output = '';
    $sql = "SELECT * FROM subject";
    $result = mysqli_query($conn, $sql);
    $output .= '<option value="NULL" selected hidden>Please Select a Course Name</option>';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '<option value="'.$row["sub_name"].'">'.$row["sub_name"].'</option>';
    }
    return $output;
}

if (isset($_POST['submit'])){
    $prog = $_POST['program'];
    $uni_id =$_POST['university'];
    $course = $_POST['subject'];

    $t_sem = $_POST['course_sem'];
    $t_credit = $_POST['course_credits'];
    $t_fees = $_POST['course_fees'];
    $hsc = $_POST['min_hsc'];
    $ssc = $_POST['min_ssc'];
    $o_level = $_POST['min_o'];
    $a_level = $_POST['min_a'];
    $sub_group = $_POST['group_priority'];
    $biology = isset($_POST['bio_marks']) ? $_POST['bio_marks'] : '';
    $mathematics = isset($_POST['math_marks']) ? $_POST['math_marks'] : '';
    $physics = isset($_POST['phy_marks']) ? $_POST['phy_marks'] : '';
    $chemistry = isset($_POST['chem_marks']) ? $_POST['chem_marks'] : '';
    //for universty rank
    $sql_name = "SELECT rank_allover FROM details_uni WHERE id='$uni_id'";
    $usernameQuery = mysqli_query($conn, $sql_name);
    $row = mysqli_fetch_assoc($usernameQuery);
    $uni_rank = $row['rank_allover'];


    if ($prog == 'NULL'){
        array_push($reds,"Please select a program");
    } else {
        if ( $uni_id == 'NULL'){
            array_push($reds,"Please select a university");
        } else {
            if ($course == 'NULL'){
                array_push($reds,"Please select a course");
            } else {
                if (empty($t_sem) || empty($t_credit) || empty($t_fees) || empty($hsc) || empty($ssc)  || empty($o_level) || empty($a_level)){
                    array_push($reds,"Invalid or empty filed");
                } else {
                    if ($sub_group == 1){
                            $sql = "INSERT INTO course_table(full_name,program_name,total_semester,total_credits,tution_fees,rank_allover,versity_id,science,arts,commarce,biology,physices,mathematics,chemestry,ssc,hsc,a_level,o_level)
                              VALUES ('$course','$prog','$t_sem','$t_credit','$t_fees','$uni_rank','$uni_id','yes','no','no','$biology','$physics','$mathematics','$chemistry','$ssc','$hsc','$a_level','$o_level')";
                        mysqli_query($conn,$sql);
                        array_push($greens,"data stored");
                    } elseif ($sub_group == 2){
                            $sql = "INSERT INTO course_table(full_name,program_name,total_semester,total_credits,tution_fees,rank_allover,versity_id,science,arts,commarce,ssc,hsc,a_level,o_level) 
                              VALUES ('$course','$prog','$t_sem','$t_credit','$t_fees','$uni_rank','$uni_id','yes','yes','yes','$ssc','$hsc','$a_level','$o_level')";
                        mysqli_query($conn,$sql);
                        array_push($greens,"data stored");
                    } else {
                        array_push($reds,"Select education group");
                    }
                }

            }
        }
    }

}
?>

<div style="margin-top: 3rem">
    <div class="container">

        <?php if (count($greens) > 0): ?>
            <?php foreach ($greens as $green): ?>
                <p class="alert alert-success"><?php echo $green; ?></p>
            <?php endforeach ?>
        <?php endif; ?>

        <?php if (count($reds) > 0): ?>
            <?php foreach ($reds as $red): ?>
                <p class="alert alert-danger"><?php echo $red; ?></p>
            <?php endforeach ?>
        <?php endif; ?>

        <form action="input_course_program.php" method="post">
            <div class="card" style="padding: 20px">
                <div class="row justify-content-md-center">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="group_priority" id="group_priority">
                                <option value="NULL" selected hidden>Select a education group</option>
                                <option value="1">Science</option>
                                <option value="2">Science/Arts/Commerce</option>
                            </select>
                        </div>
                    </div>
                </div><hr>
                <div class="row justify-content-md-center">
                    <div class="col-md-4">
                       <div class="form-group">
                           <select class="form-control" name="program">
                               <option value="NULL" selected hidden>Please Select a Program</option>
                               <option value="Undergraduate">Undergraduate</option>
                           </select>
                       </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="university">
                                <?php echo fill_uni_name($conn); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="subject">
                                <?php echo fill_sub_name($conn); ?>
                            </select>
                        </div>
                    </div>
                </div><hr>

                <div class="row justify-content-md-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter total semester" maxlength="2" name="course_sem">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter total credits" maxlength="3" name="course_credits">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter total tution fees" maxlength="9" name="course_fees">
                            </div>
                        </div>
                </div><hr>

                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" max="3" step="any" class="form-control" placeholder="Minimum S.S.C Result" maxlength="3" name="min_ssc">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" max="3" step="any" class="form-control" placeholder="Minimum H.S.C Result" maxlength="3" name="min_hsc">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" max="3" step="any" class="form-control" placeholder="Minimum O-Level Result" maxlength="3" name="min_o">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" max="3" step="any" class="form-control" placeholder="Minimum A-Level Result" maxlength="3" name="min_a">
                        </div>
                    </div>
                </div><hr>

                <div class="row justify-content-md-center">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" max="5.00" step="any" placeholder="Physices point h.s.c" class="form-control" maxlength="3" name="phy_marks">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" max="5.00" step="any" placeholder="Chemistry point h.s.c" class="form-control" maxlength="3" name="chem_marks">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" max="5.00" step="any" placeholder="Mathematics point h.s.c" class="form-control" maxlength="3" name="math_marks">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="number" max="5.00" step="any" placeholder="Biology point h.s.c" class="form-control" maxlength="3" name="bio_marks">
                        </div>
                    </div>
                </div>

                <div align="center">
                    <button type="submit" name="submit" class="btn btn-outline-secondary btn-lg">INSERT</button>
                </div>
            </div>
        </form>
    </div>
</div>