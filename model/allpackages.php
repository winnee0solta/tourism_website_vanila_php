<?php

include 'connection.php';


$sql = "SELECT * FROM packages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // $row = mysqli_fetch_assoc($result);

    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <div style="cursor:pointer;" class="card card-body d-flex" data-toggle="collapse" data-target="#collapseExample' .   $row['id'] . '" aria-expanded="false" >
        <div>
         <h5 class="card-title"><i class="fas fa-chevron-down"></i> Package : ' .   $row['name'] . ' </h5></div>
         
        </div>
 <div class="card card-body collapse"  id="collapseExample' .   $row['id'] . '">
                   

                    <table class="table">
                        <tr>
                            <td>Image</td>
                            <td> <img src="../images/' .

            $row['image']
            .
            '"class="img-fluid" style="max-height:200px;"> </td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>' . $row['location'] . '</td>
                        </tr>
                        <tr>
                            <td>Days</td>
                          <td>' . $row['days'] . '</td>
                        </tr>
                        <tr>
                            <td>Nights</td>
                          <td>' . $row['nights'] . '</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                          <td>Rs ' . $row['price'] . '</td>
                        </tr>
                          <tr>
                            <td>Description</td>
                          <td>' . $row['desc'] . '</td>
                        </tr>
                          <tr>
                            <td>Image 1</td>
                            <td> <img src="../images/' .

            $row['img_1']
            .
            '"class="img-fluid" style="max-height:200px;"> </td>
                        </tr>
                          <tr>
                            <td>Image 2</td>
                            <td> <img src="../images/' .

            $row['img_2']
            .
            '"class="img-fluid" style="max-height:200px;"> </td>
                        </tr>
                          <tr>
                            <td>Image 3</td>
                            <td> <img src="../images/' .

            $row['img_3']
            .
            '"class="img-fluid" style="max-height:200px;"> </td>
                        </tr>
                          <tr>
                            <td>Image 4</td>
                            <td> <img src="../images/' .

            $row['img_4']
            .
            '"class="img-fluid" style="max-height:200px;"> </td>
                        </tr>
                          <tr>
                            <td>Image 15</td>
                            <td> <img src="../images/' .

            $row['img_5']
            .
            '"class="img-fluid" style="max-height:200px;"> </td>
                        </tr>
                          <tr>
                            <td>Image 6</td>
                            <td> <img src="../images/' .

            $row['img_6']
            .
            '"class="img-fluid" style="max-height:200px;"> </td>
                        </tr>
                        <tr>
                        <td>
                        Actions
                        </td>
                        <td>
                        <a href="../model/removepackage.php?id='. $row['id'].'" class="btn btn-danger">Remove Package</a></td>
                        </tr>
                    </table>
                </div>

';
    }
    /* free result set */
    mysqli_free_result($result);
}


/* close connection */
mysqli_close($conn);
 