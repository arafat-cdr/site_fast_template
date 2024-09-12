<?php
   $page_title = 'Dashboard Media File Edit';

   $table_name = 'arafat_media';

   $redirect_to = APP_URL.'dashboard/arafat-media-list';

   if( isset( $_POST['btn'] ) ){

      $edit_id = (int) $_POST['edit_id'];

      // pr($_FILES);
      // pr($_POST);
      // die('die here');

      


      $data = array(
        'group_key' => strtolower( str_replace( ' ', '_', trim( $_POST['group_key'] ) ) ),
        'file_key' => strtolower( str_replace( ' ', '_', trim( $_POST['file_key'] ) ) ),
        'updated_at' => get_mysql_type_date(),
      );


      # Check if we have files
      if( $_FILES['file_to_upload']['size'] ){

         $file_mime_type = $_FILES['file_to_upload']['type'];

         $file_to_upload = single_file_upload( $_FILES['file_to_upload'], PUBLIC_PATH.'/media_files/' );

         $file_to_upload_name = str_replace( 'public/', '', $file_to_upload );

         $data['file_path'] = $file_to_upload_name;
         $data['file_mime_type'] = $file_mime_type;

         # -----------------------------------------

         # Delete Img
         $res = get_first( get_on_condition( $table_name, "id='$edit_id'" ) );

         $file = $res->file_path;

         $file_path = PUBLIC_PATH.'/'.$file;
         if( file_exists( $file_path ) ){
            unlink($file_path);
         }
         # End Img Delete

         # -----------------------------------------

      }

      db_update( $table_name, $edit_id,  $data, $redirect_to );


   }

   $has_edit = false;
   if( isset( $_GET['action'] ) && $_GET['action'] == 'edit' ){
      $id = (int) $_GET['id'];

      $has_edit = get_first( get_on_condition( $table_name, "id='$id'" ) );

   }


?>

<?php include_once( __DIR__.'/../includes/dashboard_template_top.php' ); ?>

<section class="content">
   <div class="card">
      
      <div class="card-header">
         <h3 class="card-title">Meddia File Add</h3>
      </div>


      <div class="card-body">
         
         <form action="" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="edit_id" value="<?php echo $has_edit->id; ?>">

            <div class="form-group">
               <label>Meddia File Key:</label>
               <input type="text" name="file_key" value="<?php echo $has_edit->file_key; ?>" class="form-control" autocomplete="off" placeholder="File Key Example: logo_img" required>
            </div>

            <div class="form-group">
               <label>Meddia File Group Key:</label>
               <input type="text" name="group_key" value="<?php echo $has_edit->group_key; ?>" class="form-control" autocomplete="off" placeholder="Group Key For Group Access Example site_img_list">
            </div>


            <div class="form-group">
               <label>Meddia File:</label>

               <br>

               <?php if( strpos( $has_edit->file_mime_type , 'image/') === 0 ): ?>
                  <img src="<?php echo PUBLIC_URL.$has_edit->file_path; ?>" alt="Uploaded img" width="300px" height="150px">
               <?php else: ?>
                  <img src="<?php echo PUBLIC_URL.'media_files/file.png'; ?>" alt="file img" width="300px" height="150px">
               <?php endif; ?>

               <br>
               <br>

               <a href="<?php echo PUBLIC_URL.$has_edit->file_path; ?>" target="__blank"> <span class="btn btn-info">View File</span> </a>

               <br>
               <br>

               <input type="file" name="file_to_upload" class="form-control" autocomplete="off" placeholder="File Key Example: logo_img">
            </div>

            <div class="form-group">
              
              <input type="submit" name="btn" value="Submit" class="form-control btn btn-success col-md-1">

            </div>


         </form>

      </div>
      <div class="card-footer">
      </div>
   </div>
</section>

<?php include_once( __DIR__.'/../includes/dashboard_template_bottom.php' ); ?>