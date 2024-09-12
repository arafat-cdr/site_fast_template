<?php
   $page_title = 'Dashboard Journal Edit';

   $table_name = 'journal_names';

   $redirect_to = APP_URL.'dashboard/journal-list';

   if( isset( $_POST['btn'] ) ){

      $edit_id = (int) $_POST['edit_id'];

      $data = array(
        'name' => $_POST['name'],
        'seo_data' => validate($_POST['seo_data']),
        'slug' => str_replace(" ", "_", strtolower( $_POST['slug'] )),
      );

      db_update( $table_name, $edit_id,  $data, $redirect_to );

   }

   $has_edit = false;
   if( isset( $_GET['action'] ) && $_GET['action'] == 'edit' ){
      $id = (int) $_GET['id'];

      $has_edit = get_first( get_on_condition( $table_name, "id='$id'" ) );

   }

   // pr($has_edit);

?>

<?php include_once( __DIR__.'/../includes/dashboard_template_top.php' ); ?>

<section class="content">



   <div class="card">
      
      <a href="<?php echo $redirect_to; ?>">
         <button class="btn btn-primary">Journal List</button>
      </a>

      <div class="card-header">
         Journal Edit Page
      </div>

      <div class="card-body">
         
        

         <form action="" method="post">
            <input type="hidden" name="edit_id" value="<?php echo $has_edit->id; ?>">
            <div class="form-group">
               <label>Journal Name:</label>
               <input type="text" name="name" class="form-control" value="<?php echo $has_edit->name; ?>" autocomplete="off" placeholder="Journal Name">
            </div>

            <div class="form-group">
               <label>Journal Slug:</label>
               <input type="text" name="slug" class="form-control" value="<?php echo $has_edit->slug; ?>" autocomplete="off" placeholder="Journal Slug">
            </div>

            <div class="form-group">
               <label>Seo Data:</label>
               
               <textarea name="seo_data" class="form-control" placeholder="Enter Seo data if you want to use This as SEO" rows="15"><?php echo html_decode($has_edit->seo_data); ?></textarea>

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