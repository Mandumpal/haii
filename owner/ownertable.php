<?php include('header.php');
if(isset($_POST['submit'])){
 
 
      


      if(isset($_POST['edit'])){
           
             $where_condition = array(  
                     'id' => $_POST["edit"]
                 );  
               
                  // All key names are collumn name of db table collumns.
                    $update_data = array(  
                       
                 
                       'Sl_no'  =>    mysqli_real_escape_string($data->con, $_POST['SLNo']),
                       'Name'  =>     mysqli_real_escape_string($data->con, $_POST['Name']),
                       'Location'  =>   mysqli_real_escape_string($data->con, $_POST['Location']),
                  'Contact_details'  =>   mysqli_real_escape_string($data->con, $_POST['Contact Details']),
                  'Parking_details'  =>   mysqli_real_escape_string($data->con, $_POST['Parking Details']),
                  'Available_space'  =>   mysqli_real_escape_string($data->con, $_POST['Available Space'])


                       
                       
                       
                      );
               
       
              if($data->update("owner", $update_data, $where_condition))  
              {  
               
                   header("location:chatbot.php?updated=1");  
              }



        }else{

              $insert_data = array(
                       'Sl_no'  =>  mysqli_real_escape_string($data->con, $_POST['SLNo']),
                      'Name'  =>     mysqli_real_escape_string($data->con, $_POST['Name']),
                       'Location' =>  mysqli_real_escape_string($data->con,$_POST['Location']),
                    'Contact_details' =>  mysqli_real_escape_string($data->con,$_POST['Contact Details']),
                 'Parking_details'  =>   mysqli_real_escape_string($data->con, $_POST['Parking Details']),
                  'Available_space'  =>   mysqli_real_escape_string($data->con, $_POST['Available Space'])
                         
                         
                   
                  );


           if($data->insert("owner",$insert_data))
          {
            $success_message='inserted';
          }

        }

   
} // isset post end

 if(isset($_GET['edit'])){  // display input box values
       
        $where=array(
        'sl_no' => $_GET["edit"]
        );
        $post=$data_obj->select_where("owner_register",$where);
                     
       // $Sl_no =$post->SLNo;
       $Name =  $post->Name;
       $Location = $post->Location;
       $Contact_details = $post->Contact_details;
       $Parking_details = $post->Parking_details;
       $available_space = $post->available_space;
   }  

    if(isset($_GET["delete"]))  
        {  
          $where = array(  
               'sl_no'     =>     $_GET["delete"]  
          );  
          if($data_obj->del("owner_register", $where))  
          {  
               //header("location:ownertable.php?deleted=1");  
          }  
    }
?>


<?php include('ownerslidebar.php'); ?>

 <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> OWNER TABLE</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i>Owner Table</h4>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>SLNo</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Contact Details</th>
                    <th>Parking Details</th>
                    <th>Available Space</th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
 $loc_data =$data_obj->select("owner_register");
       foreach ($loc_data as  $fields) {
        
                  ?>
                  <tr>
                    <td><?php echo $fields['sl_no']; ?></td>

                    <td><?php echo $fields['Name']; ?></td>
                    <td><?php echo $fields['Location']; ?></td>

                    <td><?php echo $fields['Contact_details']; ?></td>
                    <td><?php echo $fields['Parking_details']; ?></td>
                    <td><?php echo $fields['available_space']; ?></td>

<form method="get">
                    <td><button class="btn btn-success" type="submit" name="edit" value="<?php echo $fields['sl_no']; ?>">Edit</button></td>
                    <td><button class="btn btn-danger" type="submit" name="delete" value="<?php echo $fields['sl_no']; ?>">Delete</button></td>
</form>
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

