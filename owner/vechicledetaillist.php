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
        'id' => $_GET["edit"]
        );
        $post=$data_obj->select_where("admin",$where);
                     
       $Sl_no =$post->SLNo;
       $Category =  $post->Category;
       $Area = $post->Area;
       
   }  

    if(isset($_GET["delete"]))  
        {  
          $where = array(  
               'vid' =>  $_GET["delete"]  
          );  
          if($data_obj->del("vehicle_details", $where))  
          {  
               //header("location:add_event.php?deleted=1");  
          }  
    }
?>

<?php include('ownerslidebar.php'); ?>

 <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Vechicle List</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i>Vechile List</h4>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>vid</th>
                    <th>Vechile_no</th>
                    <th>Vehicle_name</th>
                    <th>image</th>
                  <!--   <th>Ploat No</th>
                    <th>Total Area</th>
 -->


                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
 $loc_data =$data_obj->select("vehicle_details");
       foreach ($loc_data as  $fields) {
        
                  ?>
                  <tr>
                    <td><?php echo $fields['vid']; ?></td>
                    <td><?php echo $fields['Vehicle_no']; ?></td>
                    <td><?php echo $fields['Vehicle_name']; ?></td>
                    <td><img src="../images/<?php echo $fields['Image']; ?> " width="100px" height="100px"></td>
                    <!-- <td><?php echo $fields['plot_no']; ?></td>
                    <td><?php echo $fields['Total_area']; ?></td> -->
<form method="get">
<td><button class="btn btn-success">Edit</button></td>
                    <td><button class="btn btn-danger" type="submit" name="delete" value="<?php echo $fields['vid']; ?>">Delete</button></td></form>

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

