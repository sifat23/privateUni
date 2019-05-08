<?php
    include 'header.php';
    include 'connection.php';

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
?>
    <div class="bg-local" style="padding-top: 3rem">
        <div class="container" style="margin-top: 3rem;">
            <div class="card" style="padding: 1rem;">
                <form action="search_result.php" method="post" onsubmit="return $.fn.myFunction()">
                    <div class="row justify-content-md-center">
                       <div class="col-md-4">
                           <div class="form-group" style="padding-top: 2rem; padding-bottom: 0px !important;">
                               <select class="form-control" id="edu_medium" name="edu_medium">
                                   <option value='NULL' selected hidden>What is your study medium?</option>
                                   <option value="bangla">Bangla Medium</option>
                                   <option value="english">English Medium</option>
                               </select>
                           </div>
                       </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class='col-md-4'>
                            <div class='form-group'>
                                <select class='form-control s' id='edu_group' name='edu_group'>
                                    <option value='NULL' selected hidden>What is your educational background?</option>
                                    <option value='science'>Science</option>
                                    <option value='commerce'>Commerce</option>
                                    <option value='arts'>Arts</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-md-center" id="rest">
                    </div>
                    <div class="row justify-content-md-center" id="rest_data">
                    </div>
                    <div class="row justify-content-md-center">
                        <div class='col-md-4'>
                            <div class='form-group'>
                                <small class="small" style="color: #E74C3C">(optional)</small>
                                <select class='form-control'  id='optional' name='optional'>
                                    <?php echo fill_sub_name($conn); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div align="center">
                        <input type="submit" class="btn btn-outline-primary" id="search"  name="search" value="Search">
                    </div>
                </form>
            </div>
        </div>
    </div>


<!--modal loder-->
    <div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center" style="height: 12rem;">
                    <div id="circle">
                        <div class="loader-pro">
                            <div class="loader-pro">
                                <div class="loader-pro"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="loader-txt" align="center">
                    <h3>Searching for University</h3>
                    <p>Please wait....</p>
                </div>
            </div>
        </div>
    </div>
<!--ends here-->

<script>
    // <!--this is for education medium-->
    $(document).ready(function(){
        $('#edu_medium').change(function(){
            var sub = $(this).val();
            //alert(sub)
            $.ajax({
                url:"data.php",
                method:"POST",
                data:{sub:sub},
                success:function(data){
                    $('#rest').html(data);
                }
            });
        });
    });

    // <!--this is for education group-->
    $(document).ready(function(){
        $('#edu_group').change(function(){
            var group = $(this).val();
            //alert(group)
            $.ajax({
                url:"data.php",
                method:"POST",
                data:{group:group},
                success:function(data){
                    $('#rest_data').html(data);
                }
            });
        });
    });

    $(document).ready(function() {
        $.fn.myFunction = function() {
            $("#loadMe").modal({
                backdrop: "static", //remove ability to close modal with click
                keyboard: false, //remove option to close with keyboard
                show: true //Display loader!
            });
            setTimeout(function() {
               $("#loadMe").modal("hide");
            }, 3000);
            return true;
        }
    });

    // $(document).ready(function() {
    //     $("#hello").on("click", function(e) {
    //         e.preventDefault();
    //         $("#loadMe").modal({
    //             backdrop: "static", //remove ability to close modal with click
    //             keyboard: false, //remove option to close with keyboard
    //             show: true //Display loader!
    //         });
    //         setTimeout(function() {
    //             $("#loadMe").modal("hide");
    //         }, 3500);
    //     });
    // });

</script>

<?php
 include 'footer.php';
?>