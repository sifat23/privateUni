<?php
include 'connection.php';

if(isset($_POST["sub"])):
    if($_POST["sub"] == "science"):
        echo "
<div class='form-group'>
    <select class='form-control'> 
    <option value='NULL' selected hidden>Which subject you completed already in HSC?</option>
    <option value='math'>Math</option>
    <option value='biology'>Biology</option>
    <option></option>
    </select>            
</div>
            ";
    endif;
endif;
?>