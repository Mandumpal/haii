<?php include('header.php'); 

if(isset($_POST['submit'])){
 
 
      


      if(isset($_POST['edit'])){
           
             $where_condition = array(  
                     'Booking_No' => $_POST["edit"]
                 );  
               
                  // All key names are collumn name of db table collumns.
                    $update_data = array(  
                       
                 
                       'Booking_No'  =>    mysqli_real_escape_string($data_obj->con, $_POST['Booking_No']),
                       'Current_Location'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Current_Location']),
                       'Booked_Location'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Booked_Location']),
                       ' vehicle'  =>    mysqli_real_escape_string($data_obj->con, $_POST['vehicle']),
                       'vehicle_No'  =>    mysqli_real_escape_string($data_obj->con, $_POST['vehicle_No']),

                       
                       
                       
                      );
               
       
              if($data_obj->update("booking", $update_data, $where_condition))  
              {  
               
                   header("location:chatbot.php?updated=1");  
              }



        }else{

              $insert_data = array(
                       'Sl_no'  =>  mysqli_real_escape_string($data_obj->con, $_POST['SLNo']),
                      'Category'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Category']),
                       'Area' =>  mysqli_real_escape_string($data_obj->con,$_POST['Area'])
                         
                   
                  );


           if($data_obj->insert("admin",$insert_data))
          {
            $success_message='inserted';
          }

        }

   
} // isset post end

 if(isset($_GET['edit'])){  // display input box values
       
        $where=array(
        'Booking_No' => $_GET["edit"]
        );
        $post=$data_obj->select_where("booking",$where);
                     
       $Booking_No =$post->Booking_No;
       $Current_Location =  $post->Current_Location;
       $Booked_Location = $post->Booked_Location;
       $vehicle =$post->vehicle;
       $vehicle_No =$post->vehicle_No;


       
   }  

    if(isset($_GET["delete"]))  
        {  
          $where = array(  
               'Booking_No' =>  $_GET["delete"]  
          );  
          if($data_obj->del("booking", $where))  
          {  
               //header("location:add_event.php?deleted=1");  
          }  
    }
?>

<?php include('ownerslidebar.php'); ?>

 <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Booking List</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i>Booking List</h4>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>Booking_No</th>
                    <th>Current_Location</th>
                    <th>Booked_Location</th>
                    <th>vehicle</th>
                    <th>vehicle_No</th>

                  <!--   <th>Ploat No</th>
                    <th>Total Area</th>
 -->


                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
 $loc_data =$data_obj->select("booking");
       foreach ($loc_data as  $fields) {
        
                  ?>
                  <tr>
                    <td><?php echo $fields['Booking_No']; ?></td>
                    <td><?php echo $fields['Current_Location']; ?></td>
                    <td><?php echo $fields['Booked_Location']; ?></td>
                    <td><?php echo $fields['vehicle']; ?></td>
                    <td><?php echo $fields['vehicle_No']; ?></td>

                    <!-- <td><?php echo $fields['plot_no']; ?></td>
                    <td><?php echo $fields['Total_area']; ?></td> -->

<td>
<a href="booking_reg.php?edit=<?php echo $fields['Booking_No']; ?>"type="button" class="btn btn-success">Edit</a>
</td>
                    <td><form method="get"><button class="btn btn-danger" type="submit" name="delete" value="<?php echo $fields['Booking_No']; ?>">Delete</button></td></form>


                    <td></td>
                  </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /col-md-12 -->
          
        </div>
       
      </section>
    </section>
  

<?php include('footer.php'); ?>

