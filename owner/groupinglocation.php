<?php include('header.php');
if(isset($_POST['submit'])){
 
 
      


      if(isset($_POST['edit'])){
           
             $where_condition = array(  
                     'id' => $_POST["edit"]
                 );  
               
                  // All key names are collumn name of db table collumns.
                    $update_data = array(  
                       
                 
  'location_entered_by_user'  =>    mysqli_real_escape_string($data->con, $_POST['User Entered Location']),
                  'about_6km'  =>     mysqli_real_escape_string($data->con, $_POST['Select about 6km']),  
    'location_from_owner_table'  =>   mysqli_real_escape_string($data->con, $_POST['Location from Owner Table'])
       
                       
                      );
               
       
              if($data->update("grouping_location", $update_data, $where_condition))  
              {  
               
                   header("location:chatbot.php?updated=1");  
              }



        }else{

              $insert_data = array(

  'location_entered_by_user'  =>    mysqli_real_escape_string($data->con, $_POST['User Entered Location']),
                  'about_6km'  =>     mysqli_real_escape_string($data->con, $_POST['Select about 6km']),  
   'location_from_owner_table'  =>   mysqli_real_escape_string($data->con, $_POST['Location from Owner Table'])
                  );


           if($data->insert("grouping_location",$insert_data))
          {
            $success_message='inserted';
          }

        }

   
} // isset post end

 if(isset($_GET['edit'])){  // display input box values
       
        $where=array(
        'id' => $_GET["edit"]
        );
        $post=$data->select_where("grouping_location",$where);
                     
       $location_entered_by_user =$post->User_Entered_Location;
       $about_6km =  $post->Select_about_6km;
       $location_from_owner_table = $post->Location_from_Owner_Table;
   }  

    if(isset($_GET["delete"]))  
        {  
          $where = array(  
               'd_id'     =>     $_GET["delete"]  
          );  
          if($data->del("grouping_location", $where))  
          {  
               //header("location:add_event.php?deleted=1");  
          }  
    }
?>


<?php include('ownerslidebar.php'); ?>

 <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> GROUPING OF LOCATION TABLE</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> Grouping of Location</h4>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>User Entered Location</th>
                    <th>Select about 6km</th>
                    <th>Location from Owner Table</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /col-md-12 -->
          
        </div>
       
      </section>
    </section>
  

<?php include('footer.php'); ?>

