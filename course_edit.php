<?php
include 'connection.php';
include 'admin_header.php';

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

if (isset($_POST['update'])){
    $ssc = $_POST['ssc'] ;
    $hsc = $_POST['hsc'] ;
    $a_level = $_POST['a_lvl'] ;
    $o_level = $_POST['o_lvl'] ;
    $physics = $_POST['phy'] ;
    $chemistry = $_POST['chem'] ;
    $biology = $_POST['bio'] ;
    $mathematics = $_POST['math'] ;
    $total = $_POST['total'] ;
    $id = $_POST['course_id'];

    $sql_up = "UPDATE `course_table` SET ssc='$ssc', hsc='$hsc', biology='$biology', physices='$physics', chemestry='$chemistry', mathematics='$mathematics', total_point='$total' WHERE id='$id'";
    mysqli_query($conn,$sql);
}
?>

<div class="container" style="margin-top: 2rem">
    <div class="card" style="padding: 2rem">
        <div class="form-group">
            <select class="form-control" id="uniName">
                <?php echo fill_uni_name($conn); ?>
            </select>
        </div>
        <div class="form-group">
            <select id="rest" class="form-control">
                <option value="NULL" selected hidden>Select Course Name...</option>
            </select>
        </div>
    </div>

    <div class="card" style="margin-top: 1rem; padding: 2rem" id="section">

    </div>
</div>


<script>
    $(document).ready(function(){
        $('#uniName').change(function(){
            var id = $(this).val();
            //alert(id);
            $.ajax({
                url:"data_file.php",
                method:"POST",
                data:{uni_id:id},
                success:function(data){
                    $('#rest').html(data);
                }
            });
        });
    });

    $(document).ready(function(){
        $('#rest').change(function(){
            var id = $(this).val();
            //alert(id);
            $.ajax({
                url:"data_file.php",
                method:"POST",
                data:{course_id:id},
                success:function(data){
                    $('#section').html(data);
                }
            });
        });
    });

</script>
