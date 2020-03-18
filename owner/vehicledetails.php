<?php include('header.php'); 


if(isset($_POST['submit'])){

      // Get Image Dimension
    $fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
   
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
   
    // Get image file extension
    $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);
    $loc_image = $_FILES["file-input"]["name"];
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["file-input"]["tmp_name"])) {
        $response = array(
            "type" => "error",
            "message" => "Choose image file to upload."
        );
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
        $response = array(
            "type" => "error",
            "message" => "Upload valiid images. Only PNG and JPEG are allowed."
        );
        echo $result;
    }    // Validate image file size
    else if (($_FILES["file-input"]["size"] > 2000000)) {
        $response = array(
            "type" => "error",
            "message" => "Image size exceeds 2MB"
        );
    }    // Validate image file dimension
     else if ($width > "600" || $height > "748") {
        $response = array(
            "type" => "error",
            "message" => "Image dimension should be within 600X748"
        );
    }  else {
        $target = "images/" . basename($_FILES["file-input"]["name"]);
        if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
            $response = array(
                "type" => "success",
                "message" => "Image uploaded successfully."
            );
        } else {
            $response = array(
                "type" => "error",
                "message" => "Problem in uploading image files."
            );
        }
    }


 


      if(isset($_POST['edit'])){
           
             $where_condition = array(  
                     'id' => $_POST["edit"]
                 );  
               
                  // All key names are collumn name of db table collumns.
                    $update_data = array(  
                       
                 
                       'User_no'  =>    mysqli_real_escape_string($data_obj->con, $_POST['User_no']),
                       'Name'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Name']),
                       'Phone_no'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Phone_no']),
                       'User_name'  =>   mysqli_real_escape_string($data_obj->con, $_POST['UserName']),
                       'Password'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Password'])
                       
                       
                       
                      );
               
       
              if($data_obj->update("user_registration", $update_data, $where_condition))  
              {  
               
                   header("location:chatbot.php?updated=1");  
              }



        }else{

              $insert_data = array(
                       'Vehicle_no'  =>  mysqli_real_escape_string($data_obj->con, $_POST['Vehicle_no']),
                       'Vehicle_name'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Vehicle_name']),
                       'Image'  =>   $loc_image)
                         
                   
                  );


           if($data_obj->insert("vehicle_details",$insert_data))
          {

            $success_message='inserted';
          }

        }

   
} // isset post end

 if(isset($_GET['edit'])){  // display input box values
       
        $where=array(
        'id' => $_GET["edit"]
        );
        $post=$data_obj->select_where("user_registration",$where);
                     
       $User_no =$post->User_no;
       $Name =  $post->Name;
       $Phone_no =  $post->Phone_no;
       $User_name = $post->User_name;
       $Password = $post->Password;
       
   }  

    if(isset($_GET["delete"]))  
        {  
          $where = array(  
               'd_id'     =>     $_GET["delete"]  
          );  
          if($data_obj->del("user_registration", $where))  
          {  
               //header("location:add_event.php?deleted=1");  
          }  
    }
?>



<?php include('ownerslidebar.php'); ?>
<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Vehicles Details</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Vehicles Details</h4>
              <form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
                <div class="form-gr oup">
                  <label class="col-sm-2 col-sm-2 control-label">Vehicle_no</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Vehicle_no">
                  </div>
                </div><br><br><br>
                <div class="form-gr oup">
                  <label class="col-sm-2 col-sm-2 control-label">Vehicle_name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Vehicle_name">
                  </div>
                </div><br><br><br>
                <div class="form-gr oup">
                  <label class="col-sm-2 col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file-input">
                  </div>
                </div>

                <input type="submit" class="btn btn-theme" value="vehicleform" name="submit">
               
                
               
                
              </form>
            </div>
          </div>
        </div>
          <!-- col-lg-12-->
        </div>
        
        
        
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
<?php include('footer.php'); ?>

