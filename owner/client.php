<?php include('header.php'); 


if(isset($_POST['submit'])){
 


      if(isset($_POST['edit'])){
           
             $where_condition = array(  
                     'id' => $_POST["edit"]
                 );  
               
                  // All key names are collumn name of db table collumns.
                    $update_data = array(  
                       
                 
                       'Location_Id'  =>    mysqli_real_escape_string($data_obj->con, $_POST['Location_ID']),
                       'Name'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Name']),
                       'User_name'  =>   mysqli_real_escape_string($data_obj->con, $_POST['UserName']),
                       'Password'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Password'])
                       
                       
                         
                      );
               
       
              if($data_obj->update("parking_manager_registration", $update_data, $where_condition))  
              {  
               
                   header("location:chatbot.php?updated=1");  
              }



        }else{

              $insert_data = array(
                       'Location_Id'  =>  mysqli_real_escape_string($data_obj->con, $_POST['Location_ID']),
                       'Name'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Name']),
                       'User_name'  =>  mysqli_real_escape_string($data_obj->con, $_POST['UserName']),
                       'Password'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Password'])
                         
                   
                  );


           if($data_obj->insert("parking_manager_registration",$insert_data))
          {

            $success_message='inserted';
          }

        }

   
} // isset post end

 if(isset($_GET['edit'])){  // display input box values
       
        $where=array(
        'id' => $_GET["edit"]
        );
        $post=$data_obj->select_where("parking_manager_registration",$where);
                     
       $Location_Id =$post->Location_Id;
       $Name =  $post->Name;
       $User_name = $post->User_name;
       $Password =  $post->Password;
       
   }  

    if(isset($_GET["delete"]))  
        {  
          $where = array(  
               'd_id'     =>     $_GET["delete"]  
          );  
          if($data_obj->del("parking_manager_registration", $where))  
          {  
               //header("location:add_event.php?deleted=1");  
          }  
    }
?>



<?php include('ownerslidebar.php'); ?>
<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Parking Management Registration</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Parking Manager Registration</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Location ID</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Location_ID" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Name">
                    <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                  </div>
                </div>

                <div class="form-group" >
                  <label class="col-sm-2 col-sm-2 control-label">User Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="UserName">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="focusedInput" name="Password" type="text" >
                  </div>
                </div>
                <input type="submit" class="btn btn-theme" value="clientform" name="submit">
               
                
               
                
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

