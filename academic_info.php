<?php
/**
 * Created by PhpStorm.
 * User: Namikaze
 * Date: 04-Mar-19
 * Time: 1:07 AM
 */

include 'header.php';
include 'connection.php';
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM course_table WHERE versity_id='$id'")
?>


<div style="margin-top: 6rem">
    <div class="container">
        <div class="card" style="padding: 1rem; text-align: center">
            <h1 class="card-title">Undergraduate Program</h1>
            <div>
                <table class="table table-bordered" style="text-align: center">
                    <thead>
                    <tr>
                        <th scope="col" width="600px">Course Name</th>
                        <th scope="col">Total Semester(s)</th>
                        <th scope="col">Total Credit(s)</th>
                        <th scope="col">Tution Fees</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($sql)):
                            $sub_name = $row['full_name'];
                            $credits = $row['total_credits'];
                            $semester = $row['total_semester'];
                            $fees = $row['tution_fees'];
                    ?>
                    <tr>
                        <td><?php echo $sub_name; ?></td>
                        <td><?php echo $semester; ?></td>
                        <td><?php echo $credits; ?></td>
                        <td><?php echo $fees; ?>/=</td>
                    </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
