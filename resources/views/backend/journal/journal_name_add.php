<?php
   $page_title = 'Dashboard Journal Add';

   $table_name = 'journal_names';

   $redirect_to = APP_URL.'dashboard/journal-list';

   if( isset( $_POST['btn'] ) ){

      $data = array(
        'name' => $_POST['name'],
        'seo_data' => validate($_POST['seo_data']),
        'slug' => str_replace(" ", "-", strtolower( $_POST['slug'] )),
        'created_at' => get_mysql_type_date(),
      );

      db_insert( $table_name, $data, $redirect_to );

   }

?>

<?php include_once( __DIR__.'/../includes/dashboard_template_top.php' ); ?>

<section class="content">
   <div class="card">
      
      <div class="card-header">
         <h3 class="card-title">Title</h3>
      </div>


      <div class="card-body">
         
         <form action="" method="post">
            
            <div class="form-group">
               <label>Journal Name:</label>
               <input type="text" name="name" class="form-control" autocomplete="off" placeholder="Journal Name">
            </div>

            <div class="form-group">
               <label>Journal Slug:</label>
               
               <input type="text" name="slug" class="form-control" autocomplete="off" placeholder="Journal Slug">

            </div>

            <div class="form-group">
               <label>Seo Data:</label>
               
               <textarea name="seo_data" class="form-control" placeholder="Enter Seo data if you want to use This as SEO" rows="15"></textarea>

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