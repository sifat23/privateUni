<?php
include 'admin_header.php';
include 'connection.php';


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
    $update_rank = $_POST['rank_uni'];
    $uni_id = $_POST['id'];

    mysqli_query($conn,"UPDATE details_uni SET rank_allover='$update_rank' WHERE id='$uni_id'");
    mysqli_query($conn,"UPDATE course_table SET rank_allover='$update_rank' WHERE versity_id='$uni_id'");
}
?>

<div style="margin-top: 4rem">
    <div class="container">
        <div class="card" style="padding: 2rem">
            <form action="admin_rank_edit.php" method="post">
                <div class="form-group">
                    <select class="form-control" id="uniName">
                        <?php echo fill_uni_name($conn)?>
                    </select>
                </div>
                <div id="rest">

                </div>
            </form>
        </div>
    </div>
</div>




<script>
    $(document).ready(function(){
        $('#uniName').change(function(){
            var id = $(this).val();
            $.ajax({
                url:"data_file.php",
                method:"POST",
                data:{id:id},
                success:function(data){
                    $('#rest').html(data);
                }
            });
        });
    });
</script>
