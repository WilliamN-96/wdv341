
    <?php
    //setting variables for file upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["newFile"]["name"]);
    $uploadOK = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //check if the image file is actually an image or a fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["newFile"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      }

      //check if the file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

      //check the size of the file
      if ($_FILES["newFile"]["size"] > 400000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      //allowing of certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
             echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

        //check if uploadOK is set to 0 by an error
        if($uploadOK === 0){
            echo "Sorry, your file was not uploaded.";
        }

        //If everything works, try to upload the file
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($_FILES["newFile"]["tmp_name"], $target_file)) {
              echo "The file ". htmlspecialchars( basename( $_FILES["newFile"]["name"])). " has been uploaded.";
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
          }


    ?>
