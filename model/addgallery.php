<?php

include 'connection.php';
 
    $name = $_POST['name']; 

    //TODO: function can be used
    //upload image  
    $target_dir = "../images/gallery/";
    $image = basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"],$target_dir . $image);
 

    $sql = "INSERT  INTO  gallery  VALUES (NULL,'$name','$image')";
    $result = $conn->query($sql);
    // if ($result === TRUE) {
    //     echo "New record created successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
    //redirect  
    header('Location: ' . '../dashboard/gallery.php');

 

