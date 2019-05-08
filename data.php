<?php
if (isset($_POST['sub'])){
    $medium = $_POST['sub'];
    if ($medium == "bangla"){
        echo "
            <div class='col-md-4'>
                <div class='form-group'>
                   <input type='number' max='5.00' min='0' step='any' placeholder='H.S.C Result' class='form-control' maxlength='3' name='hsc'>
                </div>
            </div>
            <div class='col-md-4'>
                <div class='form-group'>
                    <input type='number' max='5.00' min='0' step='any' placeholder='S.S.C Result' class='form-control' maxlength='3' name='ssc'>
                </div>
            </div> ";

    } else {
        echo "
            <div class='col-md-4'>
                <div class='form-group'>
                   <input min='0' type='number' max='5.00' step='any' placeholder='O Level Result' class='form-control' maxlength='3' name='o_level'>
                </div>
            </div>
            <div class='col-md-4'>
                <div class='form-group'>
                    <input min='0' type='number' max='5.00' step='any' placeholder='A Level Result' class='form-control' maxlength='3' name='a_level'>
                </div>
            </div> ";
    }
}

if (isset($_POST['group'])){
    $group = $_POST['group'];
    if ($group == "science"){
        echo "
            <div class='col-md-3'>
                <div class='form-group'>
                    <input type='number' min='0' max='5.00' step='any' placeholder='Physics point h.s.c' class='form-control' maxlength='3' name='phy_marks'>
                </div>
            </div>
            <div class='col-md-3'>
                <div class='form-group'>
                    <input type='number' min='0' max='5.00' step='any' placeholder='Chemistry point h.s.c' class='form-control' maxlength='3' name='chem_marks'>
                </div>
            </div>
            <div class='col-md-3'>
                <div class='form-group'>
                    <input type='number' min='0' max='5.00' step='any' placeholder='Mathematics point h.s.c' class='form-control' maxlength='3' name='math_marks'>
                </div>
            </div>
             <div class='col-md-3'>
                <div class='form-group'>
                    <input type='number' min='0' max='5.00' step='any' placeholder='Biology point h.s.c' class='form-control' maxlength='3' name='bio_marks'>
                </div>
            </div>
            ";
    }
}
?>