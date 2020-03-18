<?php include('header.php');
if(isset($_POST['submit'])){
 
 
      


      if(isset($_POST['edit'])){
           
             $where_condition = array(  
                     'id' => $_POST["edit"]
                 );  
               
                  // All key names are collumn name of db table collumns.
                    $update_data = array(  
                       
                 
                       'Sl_no'  =>    mysqli_real_escape_string($data_obj->con, $_POST['SLNo']),
                       'Name'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Name']),
                       'Location'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Location']),
                  'Contact_details'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Contact Details']),
                  'Parking_details'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Parking Details']),
                  'Available_space'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Available Space'])


                       
                       
                       
                      );
               
       
              if($data_obj->update("owner_register", $update_data, $where_condition))  
              {  
               
                   header("location:chatbot.php?updated=1");  
              }



        }else{

              $insert_data = array(
                       // 'Sl_no'  =>  mysqli_real_escape_string($data_obj->con, $_POST['SLNo']),
                      'Name'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Name']),
                       'Location' =>  mysqli_real_escape_string($data_obj->con,$_POST['Location']),
                    'Contact_details' =>  mysqli_real_escape_string($data_obj->con,$_POST['Contact_details']),
                 'Parking_details'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Parking_details']),
                  'Available_space'  =>   mysqli_real_escape_string($data_obj->con, $_POST['available_space'])
                         
                         
                   
                  );


           if($data_obj->insert("owner_register",$insert_data))
          {
            $success_message='inserted';
          }

        }

   
} // isset post end

 if(isset($_GET['edit'])){  // display input box values
       
        $where=array(
        'id' => $_GET["edit"]
        );
        $post=$data_obj->select_where("owner_register",$where);
                     
       $Sl_no =$post->SLNo;
       $Name =  $post->Name;
       $Location = $post->Location;
       $Contact_details = $post->Contact_Details;
       $Parking_details = $post->Parking_Details;
       $Available_space = $post->Available_Space;
   }  

    if(isset($_GET["delete"]))  
        {  
          $where = array(  
               'd_id'     =>     $_GET["delete"]  
          );  
          if($data_obj->del("owner_register", $where))  
          {  
               //header("location:add_event.php?deleted=1");  
          }  
    }
?>

<?php include('ownerslidebar.php'); ?>
<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>owner_register Registration</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i>owner_register Registration</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Name">
                    <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                  </div>
                </div>
                <div class="form-gr oup">
                  <label class="col-sm-2 col-sm-2 control-label">Location</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Location">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Contact details</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Contact_details">
                  </div>
                </div>

                <div class="form-group" >
                  <label class="col-sm-2 col-sm-2 control-label">Parking details</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="Parking_details">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">available space</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="focusedInput" name="available_space" type="text" >
                  </div>
                </div>
                <input type="submit" class="btn btn-theme" value="ownerform" name="submit">
               
                
               
                
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

