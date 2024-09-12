<?php
   $page_title = 'Dashboard Media File Add';

   $table_name = 'arafat_media';

   $redirect_to = APP_URL.'dashboard/arafat-media-list';

   if( isset( $_POST['btn'] ) ){

      // pr($_FILES);
      // pr($_POST);
      // die('die here');

      $file_mime_type = $_FILES['file_to_upload']['type'];

      $file_to_upload = single_file_upload( $_FILES['file_to_upload'], PUBLIC_PATH.'/media_files/' );

      $file_to_upload_name = str_replace( 'public/', '', $file_to_upload );


      $data = array(
        'group_key' => strtolower( str_replace( ' ', '_', trim( $_POST['group_key'] ) ) ),
        'file_key' => strtolower( str_replace( ' ', '_', trim( $_POST['file_key'] ) ) ),
        'file_path' => $file_to_upload_name,
        'file_mime_type' => $file_mime_type,
        'guid' => generate_guid(),
        'created_at' => get_mysql_type_date(),
      );

      db_insert( $table_name, $data, $redirect_to );

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
            
            <div class="form-group">
               <label>Meddia File Key:</label>
               <input type="text" name="file_key" class="form-control" autocomplete="off" placeholder="File Key Example: logo_img" required>
            </div>

            <div class="form-group">
               <label>Meddia File Group Key:</label>
               <input type="text" name="group_key" class="form-control" autocomplete="off" placeholder="Group Key For Group Access Example site_img_list">
            </div>


            <div class="form-group">
               <label>Meddia File:</label>
               <input type="file" name="file_to_upload" class="form-control" autocomplete="off" placeholder="File Key Example: logo_img" required>
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