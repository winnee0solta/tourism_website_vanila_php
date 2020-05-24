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
                        <button data-toggle="modal" data-target="#editpackageModal-' . $row['id'] . '" class="btn btn-dark">Edit Package</button> 
                        <a href="../model/removepackage.php?id=' . $row['id'] . '" class="btn btn-danger">Remove Package</a></td>
                        </tr>
                    </table>
                </div>

';
    //for edit

    echo '

<div class="modal fade" id="editpackageModal-' . $row['id'] . '" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Package</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="../model/editpackage.php" method="post" enctype="multipart/form-data">
                                <div class="form-group"> 
                                    <input name="id" style="display:none;" required value="' . $row['id'] . '">
                                </div>
                                <div class="form-group">
                                    <label>Package Name</label>
                                    <input name="name" type="text" class="form-control" required value="' . $row['name'] . '">
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <input name="location" type="text" class="form-control" required value="' . $row['location'] . '">
                                </div>
                                <div class="form-group">
                                    <label>No of Days</label>
                                    <input name="days" type="number" class="form-control" required value="' . $row['days'] . '">
                                </div>
                                <div class="form-group">
                                    <label>No of Nights</label>
                                    <input name="nights" type="number" class="form-control" required value="' . $row['nights'] . '">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input name="image" type="file" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input name="price" type="text" class="form-control" required value="' . $row['price'] . '"> 
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="desc" type="text" class="form-control" required>' . $row['desc'] . '</textarea >
                                </div>
                                <div class="form-group">
                                    <label>Image 1</label>
                                    <input name="image_1" type="file" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Image 2</label>
                                    <input name="image_2" type="file" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Image 3</label>
                                    <input name="image_3" type="file" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Image 4</label>
                                    <input name="image_4" type="file" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Image 5</label>
                                    <input name="image_5" type="file" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Image 6</label>
                                    <input name="image_6" type="file" class="form-control" >
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>
';
  }
  /* free result set */
  mysqli_free_result($result);
}


/* close connection */
mysqli_close($conn);
