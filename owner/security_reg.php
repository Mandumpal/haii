<?php include('header.php'); 


if(isset($_POST['submit'])){
 


      if(isset($_POST['edit'])){
           
             $where_condition = array(  
                     'security_id' => $_POST["edit"]
                 );  
               
                  // All key names are collumn name of db table collumns.
                    $update_data = array(  
                       
                 
                       // 'security_id'  =>    mysqli_real_escape_string($data_obj->con, $_POST['security_id']),
                       '  location_id'  =>     mysqli_real_escape_string($data_obj->con, $_POST['location_id']),
                       'security_name'  =>     mysqli_real_escape_string($data_obj->con, $_POST['security_name']),
                       'user_name'  =>   mysqli_real_escape_string($data_obj->con, $_POST['user_name']),
                       'password'  =>   mysqli_real_escape_string($data_obj->con, $_POST['password'])
                       
                       
                       
                      );
               
       
              if($data_obj->update("security", $update_data, $where_condition))  
              {  
               
                   //header("location:chatbot.php?updated=1");  
              }



        }else{

              $insert_data = array(
                       'location_id'  =>  mysqli_real_escape_string($data_obj->con, $_POST['location_id']),
                       'security_name'  =>     mysqli_real_escape_string($data_obj->con, $_POST['security_name']),
                       //'Phone_no'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Phone_no']),
                       'user_name'  =>  mysqli_real_escape_string($data_obj->con, $_POST['user_name']),
                       'password'  =>   mysqli_real_escape_string($data_obj->con, $_POST['password'])
                         
                   
                  );


           if($data_obj->insert("security",$insert_data))
          {

            $success_message='inserted';
          }

        }

   
} // isset post end

 if(isset($_GET['edit'])){  // display input box values
       
        $where=array(
        'security_id' => $_GET["edit"]
        );
        $post=$data_obj->select_where("security",$where);
                     
       $security_id =$post->security_id;
       $location_id=  $post->location_id;
       $security_name =  $post->security_name;
       $user_name = $post->user_name;
       $password = $post->password;
       
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
        <h3><i class="fa fa-angle-right"></i>Security Registration</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Security Registration</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-gr oup">
                  <label class="col-sm-2 col-sm-2 control-label">Location ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="location_id"value="<?php if(isset($location_id)) echo  $location_id; ?>">
                  </div>
                </div><br><br><br>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="security_name"value="<?php if(isset($security_name)) echo  $security_name; ?>">
                    <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                  </div>
                <!-- </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Phone_no</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Phone_no">
                  </div>
                </div> -->

                <div class="form-group" >
                  <label class="col-sm-2 col-sm-2 control-label">User Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="user_name" value="<?php if(isset($user_name)) echo  $user_name; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="focusedInput" name="password" type="text"value="<?php if(isset($password)) echo  $password; ?>" >
                  </div>
                </div>
                <input type="submit" class="btn btn-theme" value="securityform" name="submit">
                <input type="hidden"  name="edit" value="<?php if(isset($_GET['edit'])) echo $_GET['edit'];?>">
               
               
                
               
                
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

