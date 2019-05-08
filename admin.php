<?php
    include 'admin_header.php';
    include 'connection.php';

?>

<div class="container" style="margin-top: 1rem">
    <div class="jumbotron" style="background: #2096ff">
        <div class="card" style="padding: 2rem; text-align: center">
            <h2 class="card-title">All Versity List</h2>
            <div>
                <table class="table" style="text-align: center">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Versity Name</th>
                        <th scope="col">Rank</th>
                        <th scope="col">Adress</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = mysqli_query($conn,"SELECT * FROM details_uni ORDER BY rank_allover ASC");
                        while ($row = mysqli_fetch_assoc($sql)):
                    ?>
                        <tr>
                            <td><img style="height: 100px" src='upload/<?php echo $row['v_logo']; ?>'></td>
                            <td><?php echo $row['university_name']?></td>
                            <td><?php echo $row['rank_allover']?></td>
                            <td><?php echo $row['university_address']?></td>
                        </tr>

                    <?php endwhile; ?>
                    </tbody>


                </table>


            </div>
        </div>
    </div>
</div>



