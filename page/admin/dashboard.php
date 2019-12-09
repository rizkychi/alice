<?php
    $query_unverified = mysqli_query($conn, "SELECT * FROM tb_user WHERE user_role = '2' && user_verified = '0'");
    
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 card mt-5">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NIDN</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        if (mysqli_num_rows($query_unverified) > 0) {
                            while ($result = mysqli_fetch_array($query_unverified)) {
                            ?>  
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo$result['user_id'];?></td>
                                    <td><?php echo  $result['user_name'];?></td>
                                    <td><a href='#'><span class='badge badge-lg badge-success'>Terima</span></a></td>
                                </tr>
                            <?php $i++;
                            }
                        } else {
                            echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
                        }
                    ?>
                </tbody>
            </table>      
        </div>
        <div class="col-md-8">
        </div>
    </div>
</div>