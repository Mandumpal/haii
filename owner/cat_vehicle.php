<?php include('header.php'); 


if(isset($_POST['submit'])){
 


      if(isset($_POST['edit'])){
           
             $where_condition = array(  
                     'id' => $_POST["edit"]
                 );  
               
                  // All key names are collumn name of db table collumns.
                    $update_data = array(  
                       
                 
                       '  Vehicles'  =>    mysqli_real_escape_string($data_obj->con, $_POST['Vehicles']),
                       'Size'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Size']),
                       // 'Phone_no'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Phone_no']),
                       // 'User_name'  =>   mysqli_real_escape_string($data_obj->con, $_POST['UserName']),
                       // 'Password'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Password'])
                       
                       
                       
                      );
               
       
              if($data_obj->update("vehicle_type", $update_data, $where_condition))  
              {  
               
                  // header("location:chatbot.php?updated=1");  
              }



        }else{

              $insert_data = array(
                       'Vehicles'  =>  mysqli_real_escape_string($data_obj->con, $_POST['Vehicles']),
                       'Size'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Size'])
                         
                   
                  );


           if($data_obj->insert("vehicle_type",$insert_data))
          {

            $success_message='inserted';
          }

        }

   
} // isset post end

 if(isset($_GET['edit'])){  // display input box values
       
        $where=array(
        'id' => $_GET["edit"]
        );
        $post=$data_obj->select_where("vehicle_type",$where);
                     
       $Vehicles =$post->Vehicles;
       $Size =  $post->Size;
       // $Phone_no =  $post->Phone_no;
       // $User_name = $post->User_name;
       // $Password = $post->Password;
       
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
        <h3><i class="fa fa-angle-right"></i>Category Registration</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>Category Registration</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-gr oup">
                  <label class="col-sm-2 col-sm-2 control-label">Vehicles</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Vehicles"value="<?php if(isset($Vehicles)) echo $Vehicles; ?>"
                    >
                  </div>
                </div><br><br><br>
                <div class="form-gr oup">
                  <label class="col-sm-2 col-sm-2 control-label">Size</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Size"value="<?php if(isset($Size)) echo $Size; ?>">
                  </div>
                </div>
                
                <input type="submit" class="btn btn-theme" value="vehicleform" name="submit">
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

