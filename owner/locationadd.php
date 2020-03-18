<?php include('header.php'); 


if(isset($_POST['submit'])){
 


      if(isset($_POST['edit'])){
           
             $where_condition = array(  
                     'Location_no' => $_POST["edit"]
                 );  
               
                  // All key names are collumn name of db table collumns.
                    $update_data = array(  
                       
                 
                       // 'Location_no'  =>    mysqli_real_escape_string($data_obj->con, $_POST['Location_no']),
                       'District'  =>     mysqli_real_escape_string($data_obj->con, $_POST['District']),
                       'City'  =>   mysqli_real_escape_string($data_obj->con, $_POST['City']),
                       'Capacity'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Capacity']),
                       'plot_no'  =>   mysqli_real_escape_string($data_obj->con, $_POST['plot_no']),
                       'Total_area'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Total_area'])
                       
                       
                         
                      );
               
       
              if($data_obj->update("location", $update_data, $where_condition))  
              {  
               
                   //header("location:chatbot.php?updated=1");  
              }



        }else{

              $insert_data = array(
                        // 'Location_no'  =>    mysqli_real_escape_string($data_obj->con, $_POST['Location_no']),
                       'District'  =>     mysqli_real_escape_string($data_obj->con, $_POST['District']),
                       'City'  =>   mysqli_real_escape_string($data_obj->con, $_POST['City']),
                       'Capacity'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Capacity']),
                       'plot_no'  =>   mysqli_real_escape_string($data_obj->con, $_POST['plot_no']),
                       'Total_area'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Total_area'])
                         
                   
                  );
              //exit();


           if($data_obj->insert("location",$insert_data))
          {

            $success_message='inserted';
          }

        }

   
} // isset post end

 if(isset($_GET['edit'])){  // display input box values
       
        $where=array(
        'Location_no' => $_GET["edit"]
        );
        $post=$data_obj->select_where("location",$where);
                     
       $Location_no =$post->Location_no;
       $District =  $post->District;
       $City = $post->City;
       $Capacity =  $post->Capacity;
       $plot_no = $post->plot_no;
       $Total_area= $post->Total_area;


       
   }  

    if(isset($_GET["delete"]))  
        {  
          $where = array(  
               'd_id'     =>     $_GET["delet e"]  
          );  
          if($data_obj->del("location", $where))  
          {  
               //header("location:add_event.php?deleted=1");  
          }  
    }
?>



<?php include('ownerslidebar.php'); ?>
<section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Parking Management</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Add Location</h4>
              <form class="form-horizontal style-form" method="post">
                <!-- <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Location no</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Location_no" value="">
                  </div>
                </div> -->
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">District</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="District" value="<?php if(isset($District)) echo $District; ?>">
                    <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                  </div>
                </div>

                <div class="form-group" >
                  <label class="col-sm-2 col-sm-2 control-label">City</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="City" value="<?php if(isset($City)) echo  $City; ?>">
                  </div>
                </div>
                <div class="form-group" >
                  <label class="col-sm-2 col-sm-2 control-label">Capacity</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="Capacity"value="<?php if(isset($Capacity)) echo $Capacity; ?>">
                  </div>
                </div>
                <div class="form-group" >
                  <label class="col-sm-2 col-sm-2 control-label">plot no</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="plot_no"value="<?php if(isset($plot_no)) echo $plot_no; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Total area</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="focusedInput" name="Total_area" type="text"value="<?php if(isset($Total_area)) echo $Total_area; ?>" >
                  </div>
                </div>
                <input type="submit" class="btn btn-theme" value="Add" name="submit">
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

