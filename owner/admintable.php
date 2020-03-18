<?php include('header.php'); 

if(isset($_POST['submit'])){
 
 
      


      if(isset($_POST['edit'])){
           
             $where_condition = array(  
                     'id' => $_POST["edit"]
                 );  
               
                  // All key names are collumn name of db table collumns.
                    $update_data = array(  
                       
                 
                       'Sl_no'  =>    mysqli_real_escape_string($data->con, $_POST['SLNo']),
                       'Category'  =>     mysqli_real_escape_string($data->con, $_POST['Category']),
                       'Area'  =>   mysqli_real_escape_string($data->con, $_POST['Area'])
                       
                       
                       
                      );
               
       
              if($data->update("admin", $update_data, $where_condition))  
              {  
               
                   header("location:chatbot.php?updated=1");  
              }



        }else{

              $insert_data = array(
                       'Sl_no'  =>  mysqli_real_escape_string($data->con, $_POST['SLNo']),
                      'Category'  =>     mysqli_real_escape_string($data->con, $_POST['Category']),
                       'Area' =>  mysqli_real_escape_string($data->con,$_POST['Area'])
                         
                   
                  );


           if($data->insert("admin",$insert_data))
          {
            $success_message='inserted';
          }

        }

   
} // isset post end

 if(isset($_GET['edit'])){  // display input box values
       
        $where=array(
        'id' => $_GET["edit"]
        );
        $post=$data->select_where("vehicle_type",$where);
                     
       $id =$post->id;
       $Vehicles =$post->Vehicles;
       $Size = $post->Size;
       
   }  

    if(isset($_GET["delete"]))  
        {  
          $where = array(  
               'id'     =>     $_GET["delete"]  
          );  
          if($data_obj->del("vehicle_type", $where))  
          {  
               //header("location:add_event.php?deleted=1");  
          }  
    }
?>

<?php include('ownerslidebar.php'); ?>

 <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> CATEGORY TABLE</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i>Category Table</h4>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>SLNo</th>
                    <th>Category</th>
                    <th>Area</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
 $loc_data =$data_obj->select("vehicle_type");
       foreach ($loc_data as  $fields) {
        
                  ?>
                  <tr>
                    <td><?php echo $fields['id']; ?></td>

                    <td><?php echo $fields['Vehicles']; ?></td>
                    <td><?php echo $fields['Size']; ?></td>
<td>
<a href="cat_vehicle.php?edit=<?php echo $fields['id']; ?>" type="button" class="btn btn-success">Edit</a>
</td>
                   <form method="get">
                    <!-- <td><button class="btn btn-success" type="submit" name="edit" value="<?php echo $fields['id']; ?>">Edit</button></td> -->
                    <td><button class="btn btn-danger" type="submit" name="delete" value="<?php echo $fields['id']; ?>">Delete</button></td>
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

