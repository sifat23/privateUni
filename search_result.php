<?php
include 'header.php';
include 'connection.php';
sleep(3);
$reds = array();


if (isset($_POST['search'])){
    $medium = $_POST['edu_medium'];
    $background = $_POST['edu_group'];
    $hsc= isset($_POST['hsc']) ? $_POST['hsc'] : '';
    $ssc = isset($_POST['ssc']) ? $_POST['ssc'] : '';
    $biology = isset($_POST['bio_marks']) ? $_POST['bio_marks'] : '';
    $mathematics = isset($_POST['math_marks']) ? $_POST['math_marks'] : '';
    $physics = isset($_POST['phy_marks']) ? $_POST['phy_marks'] : '';
    $chemistry = isset($_POST['chem_marks']) ? $_POST['chem_marks'] : '';
    $a_level = isset($_POST['a_level']) ? $_POST['a_level'] : '';
    $o_level = isset($_POST['o_level']) ? $_POST['o_level'] : '';
    $optional = $_POST['optional'];

   //checking optional is checked or not
   if ($optional == 'NULL'){
       //checking medium
       if ($medium == "bangla"){
           //checking group
           if ($background == "science"){
               if (empty($ssc) || empty($hsc)){
                   array_push($reds,"H.S.C/S.S.C Value Invalid");
               } else {
                   $total = $ssc + $hsc;
                   if (!empty($physics) && !empty($chemistry) && !empty($biology)) {
                       $sql = "SELECT * FROM course_table WHERE ssc<='$ssc' AND hsc<='$hsc' AND total_point<='$total' OR science='yes' OR arts='yes' OR commarce='yes' OR physices<='$physics' OR chemestry<='$chemistry' OR biology<='$biology' ORDER BY rank_allover ASC";
                   } elseif (!empty($physics) && !empty($chemistry) && !empty($mathematics)){
                       $sql = "SELECT * FROM course_table WHERE ssc<='$ssc' AND hsc<='$hsc' AND total_point<='$total' OR science='yes' OR arts='yes' OR commarce='yes' OR physices<='$physics' OR chemestry<='$chemistry' OR mathematics<='$mathematics' ORDER BY rank_allover ASC";
                   } elseif (!empty($physics) && !empty($chemistry) && !empty($mathematics) && !empty($biology)){
                       $sql = "SELECT * FROM course_table WHERE ssc<='$ssc' AND hsc<='$hsc' AND total_point<='$total' OR science='yes' OR arts='yes' OR commarce='yes' OR physices<='$physics' OR chemestry<='$chemistry' OR mathematics<='$mathematics' OR biology<='$biology' ORDER BY rank_allover ASC";
                   } else {
                       array_push($reds, "Invalid Student");
                   }
                   if (count($reds) == 0) {
                       $result = (mysqli_query($conn, $sql));
                   }
               }
           } elseif ($background == "commerce"){
               if (empty($ssc) || empty($hsc)){
                   array_push($reds,"H.S.C/S.S.C Value Invalid");
               } else {
                   $total = $ssc + $hsc;
                   $sql = "SELECT * FROM course_table WHERE ssc<='$ssc' AND hsc<='$hsc' AND total_point<='$total' AND commarce='yes' OR arts='ýes' ORDER BY rank_allover ASC";
               }
               if (count($reds) == 0) {
                   $result = (mysqli_query($conn, $sql));
               }
           } elseif ($background == "arts"){
               if (empty($ssc) || empty($hsc)){
                   array_push($reds,"H.S.C/S.S.C Value Invalid");
               } else {
                   $total = $ssc + $hsc;
                   $sql = "SELECT * FROM course_table WHERE ssc<='$ssc' AND hsc<='$hsc' AND total_point<='$total' AND commarce='yes' OR arts='ýes' ORDER BY rank_allover ASC";
               }
               if (count($reds) == 0) {
                   $result = (mysqli_query($conn, $sql));
               }
           } else {
               array_push($reds,"No Education Background Selected");
           }
       } elseif ($medium == "english"){
           if ($background == "science"){
               if (empty($a_level) || empty($o_level)){
                   array_push($reds,"A_level/O_level Value Invalid");
               } else {
                   if (!empty($physics) && !empty($chemistry) && !empty($biology)) {
                       $sql = "SELECT * FROM course_table WHERE a_leve<='$a_level' AND o_level<='$o_level' OR science='yes' OR arts='yes' OR commarce='yes' OR physices<='$physics' OR chemestry<='$chemistry' OR biology<='$biology' ORDER BY rank_allover ASC";
                   } elseif (!empty($physics) && !empty($chemistry) && !empty($mathematics)){
                       $sql = "SELECT * FROM course_table WHERE a_level<='$a_level' AND o_level<='$o_level' OR science='yes' OR arts='yes' OR commarce='yes' OR  physices<='$physics' OR chemestry<='$chemistry' OR mathematics<='$mathematics' ORDER BY rank_allover ASC";
                   } elseif (!empty($physics) && !empty($chemistry) && !empty($mathematics) && !empty($biology)){
                       $sql = "SELECT * FROM course_table WHERE a_level<='$a_level' AND o_level<='$o_level' OR science='yes' OR arts='yes' OR commarce='yes' OR physices<='$physics' OR chemestry<='$chemistry' OR mathematics<='$mathematics' OR biology<='$biology' ORDER BY rank_allover ASC";
                   } else {
                       array_push($reds, "Invalid Student");
                   }
                   if (count($reds) == 0) {
                       $result = (mysqli_query($conn, $sql));
                   }
               }
           } elseif ($background == "commerce"){
               if (empty($o_level) || empty($a_level)){
                   array_push($reds,"A_level/O_level Value Invalid");
               } else {
                   $sql = "SELECT * FROM course_table WHERE a_level<='$a_level' AND o_level<='$o_level' AND commarce='yes' OR arts='ýes' ORDER BY rank_allover ASC";
               }
               if (count($reds) == 0) {
                   $result = (mysqli_query($conn, $sql));
               }
           } elseif ($background == "arts"){
               if (empty($o_level) || empty($a_level)){
                   array_push($reds,"A_level/O_level Value Invalid");
               } else {
                   $sql = "SELECT * FROM course_table WHERE a_level<='$a_level' AND o_level<='$o_level' AND commarce='yes' OR arts='ýes' ORDER BY rank_allover ASC";
               }
               if (count($reds) == 0) {
                   $result = (mysqli_query($conn, $sql));
               }
           } else {
               array_push($reds,"No Education Background Selected");
           }
       }
       else {
           array_push($reds,"No Education Medium Selected");
       }
   } else {
       if ($medium == "bangla"){
           //checking group
           if ($background == "science"){
               if (empty($ssc) || empty($hsc)){
                   array_push($reds,"H.S.C/S.S.C Value Invalid");
               } else {
                   $total = $ssc + $hsc;
                   if (!empty($physics) && !empty($chemistry) && !empty($biology)) {
                       $sql = "SELECT * FROM course_table WHERE full_name='$optional' AND ssc<='$ssc' AND hsc<='$hsc' AND total_point<='$total' AND science='yes' AND physices<='$physics' AND chemestry<='$chemistry' AND biology<='$biology' ORDER BY rank_allover ASC";
                   } elseif (!empty($physics) && !empty($chemistry) && !empty($mathematics)){
                       $sql = "SELECT * FROM course_table WHERE full_name='$optional' AND ssc<='$ssc' AND hsc<='$hsc' AND total_point<='$total' AND science='yes' AND  physices<='$physics' AND chemestry<='$chemistry' AND mathematics<='$mathematics' ORDER BY rank_allover ASC";
                   } elseif (!empty($physics) && !empty($chemistry) && !empty($mathematics) && !empty($biology)){
                       $sql = "SELECT * FROM course_table WHERE full_name='$optional' AND ssc<='$ssc' AND hsc<='$hsc' AND total_point<='$total' AND science='yes' AND physices<='$physics' AND chemestry<='$chemistry' AND mathematics<='$mathematics' AND biology<='$biology' ORDER BY rank_allover ASC";
                   } else {
                       array_push($reds, "Invalid Student");
                   }
                   if (count($reds) == 0) {
                       $result = (mysqli_query($conn, $sql));
                   }
               }
           } elseif ($background == "commerce"){
               if (empty($ssc) || empty($hsc)){
                   array_push($reds,"H.S.C/S.S.C Value Invalid");
               } else {
                   $total = $ssc + $hsc;
                   $sql = "SELECT * FROM course_table WHERE full_name='$optional' AND ssc<='$ssc' AND hsc<='$hsc' AND total_point<='$total' AND commarce='yes' AND arts='ýes' ORDER BY rank_allover ASC";
               }
               if (count($reds) == 0) {
                   $result = (mysqli_query($conn, $sql));
               }
           } elseif ($background == "arts"){
               if (empty($ssc) || empty($hsc)){
                   array_push($reds,"H.S.C/S.S.C Value Invalid");
               } else {
                   $total = $ssc + $hsc;
                   $sql = "SELECT * FROM course_table WHERE full_name='$optional' AND ssc<='$ssc' AND hsc<='$hsc' AND total_point<='$total' AND commarce='yes' AND arts='ýes' ORDER BY rank_allover ASC";
               }
               if (count($reds) == 0) {
                   $result = (mysqli_query($conn, $sql));
               }
           } else {
               array_push($reds,"No Education Background Selected");
           }
       } elseif ($medium == "english"){
           if ($background == "science"){
               if (empty($a_level) || empty($o_level)){
                   array_push($reds,"A_level/O_level Value Invalid");
               } else {
                   if (!empty($physics) && !empty($chemistry) && !empty($biology)) {
                       $sql = "SELECT * FROM course_table WHERE full_name='$optional' AND a_leve<='$a_level' AND o_level<='$o_level' AND science='yes' AND physices<='$physics' AND chemestry<='$chemistry' AND biology<='$biology' ORDER BY rank_allover ASC";
                   } elseif (!empty($physics) && !empty($chemistry) && !empty($mathematics)){
                       $sql = "SELECT * FROM course_table WHERE full_name='$optional' AND a_level<='$a_level' AND o_level<='$o_level' AND science='yes' AND  physices<='$physics' AND chemestry<='$chemistry' AND mathematics<='$mathematics' ORDER BY rank_allover ASC";
                   } elseif (!empty($physics) && !empty($chemistry) && !empty($mathematics) && !empty($biology)){
                       $sql = "SELECT * FROM course_table WHERE full_name='$optional' AND a_level<='$a_level' AND o_level<='$o_level' AND science='yes' AND physices<='$physics' AND chemestry<='$chemistry' AND mathematics<='$mathematics' AND biology<='$biology' ORDER BY rank_allover ASC";
                   } else {
                       array_push($reds, "Invalid Student");
                   }
                   if (count($reds) == 0) {
                       $result = (mysqli_query($conn, $sql));
                   }
               }
           } elseif ($background == "commerce"){
               if (empty($o_level) || empty($a_level)){
                   array_push($reds,"A_level/O_level Value Invalid");
               } else {
                   $sql = "SELECT * FROM course_table WHERE full_name='$optional' AND a_level<='$a_level' AND o_level<='$o_level' AND commarce='yes' OR arts='ýes' ORDER BY rank_allover ASC";
               }
               if (count($reds) == 0) {
                   $result = (mysqli_query($conn, $sql));
               }
           } elseif ($background == "arts"){
               if (empty($o_level) || empty($a_level)){
                   array_push($reds,"A_level/O_level Value Invalid");
               } else {
                   $sql = "SELECT * FROM course_table WHERE full_name='$optional' AND a_level<='$a_level' AND o_level<='$o_level' AND commarce='yes' OR arts='ýes' ORDER BY rank_allover ASC";
               }
               if (count($reds) == 0) {
                   $result = (mysqli_query($conn, $sql));
               }
           } else {
               array_push($reds,"No Education Background Selected");
           }
       }
       else {
           array_push($reds,"No Education Medium Selected");
       }
   }


}

?>

<div>
    <div class="container" style="margin-top: 6rem">
        <?php if (count($reds) > 0): ?>
            <?php foreach ($reds as $red): ?>
                <div class="form-group">
                    <p style="margin-left: 1rem; margin-right: 1rem;" class="alert alert-danger"><?php echo $red; ?></p>
                </div>
            <?php endforeach ?>
        <?php endif; ?>

        <?php if (count($reds) == 0):
            while ($row = mysqli_fetch_assoc($result)):
                $uni_id = $row['versity_id'];
                $sub_name = $row['full_name'];
                $sub_semester = $row['total_semester'];
                $sub_credit = $row['total_credits'];
                $sub_program = $row['program_name'];
                $course_fee = $row['tution_fees'];

                //uni_logo_link
                $column = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM details_uni WHERE id='$uni_id'"));
                $logo_uni = $column['v_logo'];
                $uni_name = $column['university_name'];
        ?>
            <div class="card" style="padding:15px; margin-bottom: 10px;">
                <div class="row">
                    <div class="col-md-2">
                        <img src='upload/<?php echo $logo_uni; ?>' class="img-thumbnail th-thumb" alt="Cinque Terre">
                    </div>
                    <div class="col-md-8 cust">
                        <h4><?php echo $uni_name; ?></h4>
                        <p><?php echo $sub_name ?></p>
                        <p>Prgram : <?php echo ucfirst($sub_program); ?></p>
                        <div class="row">
                            <div class="col-md-2">
                                <p>Cedits : <?php echo $sub_credit; ?></p>
                            </div>
                            <div class="col-md-3">
                                <p>Semester : <?php echo $sub_semester; ?></p>
                            </div>
                        </div>
                        <p>Total Cost : <?php echo $course_fee; ?>/-</p>
                    </div>
                    <div class="col-md-2" style="margin-top: 55px; text-align: center">
                        <a href="more_uni_info.php?id=<?php echo $uni_id;?>" class="nav-link custom-link dd-btn">More <i class="fas fa-info-circle"></i></a>
                    </div>
                </div>
            </div>
        <?php
            endwhile;
            endif;
        ?>
    </div>
</div>
