<?php
   $page_title = 'Dashboard Media File List';
   $table_name = 'arafat_media';
   $redirect_to = APP_URL.'dashboard/arafat-media-list';
   $edit_url = APP_URL.'dashboard/arafat-media-edit';

   $res = get_by_table_name( $table_name );


   if( isset( $_GET['action'] ) && $_GET['action'] == 'delete' ){

      $id = (int) $_GET['id'];

      # We have to delete Img Also

      # Delete Img
      $res = get_first( get_on_condition( $table_name, "id='$id'" ) );

      $file = $res->file_path;

      $file_path = PUBLIC_PATH.'/'.$file;

      if( file_exists( $file_path ) ){
         unlink($file_path);
      }
      # End Img Delete

      # We have to Delete Img Also

      db_delete( $table_name, $id, 'id', $redirect_to );

   }

?>

<?php include_once( __DIR__.'/../includes/dashboard_template_top.php' ); ?>

<section class="content">
   <div class="card">
      
      <div class="card-header">
         <h3 class="card-title">Media File</h3>
      </div>


      <div class="card-body">
         
         <a href="<?php echo APP_URL.'dashboard/arafat-media-add'; ?>">
            <button class="btn btn-primary">Add New Media</button>
         </a>

         <h3 class="top_20">
            Media File List ( <?php if( $res ){ echo count($res); } ?> )
         </h3>


         <table class="table table-striped table-bordered">
               <thead>
                  <th>File Key</th>
                  <th>Group Key</th>
                  <th>guid</th>
                  <th>Mime Type</th>
                  <th>Is Img</th>
                  <th>File Preview</th>
                  <th>File Url</th>
                  <th>File Img Link</th>
                  <th>File Img Tag</th>
                  <th>Created At</th>
                  <th>Actions</th>
               </thead>

               <tbody>
                  
                  <?php if( $res ): ?>
                     <?php foreach( $res as $v ): ?>
                  <tr>
                     <td style="max-width: 100px;">
                        <?php echo $v->file_key; ?>
                     </td>
                     <td style="max-width: 100px;">
                        <?php echo $v->group_key; ?>
                     </td>
                     <td>
                        <?php echo $v->guid; ?>
                     </td>
                     <td>
                        <?php echo $v->file_mime_type; ?>
                     </td>
                     <td>
                        <?php
                           if( strpos( $v->file_mime_type , 'image/') === 0 ){
                              echo 'Img File';
                           }else{
                              echo 'Other File';
                           }
                        ?>
                     </td>

                     <td style="max-width: 120px;">
                        <?php if( strpos( $v->file_mime_type , 'image/') === 0 ): ?>
                           <img src="<?php echo PUBLIC_URL.$v->file_path; ?>" alt="Uploaded img" width="90px" height="75px">
                        <?php else: ?>
                           <img src="<?php echo PUBLIC_URL.'media_files/file.png'; ?>" alt="file img" width="90px" height="75px">
                        <?php endif; ?>
                     </td>

                     <td style="max-width: 100px;">
                        <?php echo PUBLIC_URL.$v->file_path; ?>
                     </td>

                     <td class="text-wrap">
                        <a href="<?php echo PUBLIC_URL.$v->file_path; ?>" target="__blank"> <span class="btn btn-info">View File</span> </a>
                     </td>

                     <td style="max-width: 100px;">
                        <?php if( strpos( $v->file_mime_type , 'image/') === 0 ): ?>
                           <?php

                              $str = "<img src='".PUBLIC_URL.$v->file_path."' alt='Uploaded img'>";

                              echo htmlentities( $str );

                           ?>
                        <?php endif; ?>
                     </td>


                     <td>
                        <?php echo $v->created_at; ?>
                     </td>
                     <td>
                        
                        <a href="<?php echo $edit_url; ?>?action=edit&id=<?php echo $v->id; ?>"> <button class="btn btn-primary top_20">Edit</button> </a>

                        <a href="?action=delete&id=<?php echo $v->id; ?>" onclick="return confirm('Are you sure ? want to delete?')"> <button class="btn btn-danger top_20">Delete</button> </a>

                     </td>
                  </tr>
                  <?php endforeach; ?>
                  <?php endif; ?>

               </tbody>
         </table>


      </div>
      <div class="card-footer">

      </div>
   </div>
</section>

<?php include_once( __DIR__.'/../includes/dashboard_template_bottom.php' ); ?>