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
               'security_id' =>  $_GET["delete"]  
          );  
          if($data_obj->del("security", $where))  
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
                    <th>security_id</th>
                    <th>location_id</th>
                    <th>security_name</th>
                    <th>user_name</th>
                    <th>password</th>

                  <!--   <th>Ploat No</th>
                    <th>Total Area</th>
 -->


                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
 $loc_data =$data_obj->select("security");
       foreach ($loc_data as  $fields) {
        
                  ?>
                  <tr>
                    <td><?php echo $fields['security_id']; ?></td>
                    <td><?php echo $fields['location_id']; ?></td>
                    <td><?php echo $fields['security_name']; ?></td>
                    <td><?php echo $fields['user_name']; ?></td>
                    <td><?php echo $fields['password']; ?></td>

                    <!-- <td><?php echo $fields['plot_no']; ?></td>
                    <td><?php echo $fields['Total_area']; ?></td> -->
<td>
<a href="security_reg.php?edit=<?php echo $fields['security_id']; ?>"type="button" class="btn btn-success">Edit</a>
</td>
                    <td><form method="get"><button class="btn btn-danger" type="submit" name="delete" value="<?php echo $fields['security_id']; ?>">Delete</button></td></form>

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

