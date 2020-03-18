<?php include('header.php'); 

if(isset($_POST['submit'])){
 
 
      


      if(isset($_POST['edit'])){
           
             $where_condition = array(  
                     'id' => $_POST["edit"]
                 );  
               
                  // All key names are collumn name of db table collumns.
                    $update_data = array(  
                       
                 
                       'Sl_no'  =>    mysqli_real_escape_string($data_obj->con, $_POST['SLNo']),
                       'Category'  =>     mysqli_real_escape_string($data_obj->con, $_POST['Category']),
                       'Area'  =>   mysqli_real_escape_string($data_obj->con, $_POST['Area'])
                       
                       
                       
                      );
               
       
              if($data_obj->update("admin", $update_data, $where_condition))  
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
               'Location_no' =>  $_GET["delete"]  
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
        <h3><i class="fa fa-angle-right"></i>Location List</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i>Location List</h4>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>Location</th>
                    <th>District</th>
                    <th>City</th>
                    <th>Capacity</th>
                    <th>Ploat No</th>
                    <th>Total Area</th>



                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
 $loc_data =$data_obj->select("location");
       foreach ($loc_data as  $fields) {
        
                  ?>
                  <tr>
                    <td><?php echo $fields['Location_no']; ?></td>
                    <td><?php echo $fields['District']; ?></td>
                    <td><?php echo $fields['City']; ?></td>
                    <td><?php echo $fields['Capacity']; ?></td>
                    <td><?php echo $fields['plot_no']; ?></td>
                    <td><?php echo $fields['Total_area']; ?></td>

<td>
<a href="locationadd.php?edit=<?php echo $fields['Location_no']; ?>"type="button" class="btn btn-success">Edit</a>
</td>
                    <td><form method="get"><button class="btn btn-danger" type="submit" name="delete" value="<?php echo $fields['Location_no']; ?>">Delete</button></td></form>

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

