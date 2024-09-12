<?php
   $page_title = 'Dashboard Page List';
   $table_name = 'journal_names';
   $redirect_to = APP_URL.'dashboard/journal-list';
   $edit_url = APP_URL.'dashboard/journal-edit'; 

   $res = get_by_table_name( $table_name );


   if( isset( $_GET['action'] ) && $_GET['action'] == 'delete' ){

      $id = (int) $_GET['id'];

      db_delete( $table_name, $id, 'id', $redirect_to );

   }

?>

<?php include_once( __DIR__.'/../includes/dashboard_template_top.php' ); ?>

<section class="content">
   <div class="card">
      
      <div class="card-header">
         <h3 class="card-title">Journal</h3>
      </div>


      <div class="card-body">
         
         <a href="<?php echo APP_URL.'dashboard/journal-add'; ?>">
            <button class="btn btn-primary">Add New</button>
         </a>

         <h3 class="top_20">
            Journal List
         </h3>


         <table class="table table-striped table-bordered">
               <thead>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Created At</th>
                  <th>Actions</th>
               </thead>

               <tbody>
                  
                  <?php if( $res ): ?>
                     <?php foreach( $res as $v ): ?>
                  <tr>
                     <td>
                        <?php echo $v->name; ?>
                     </td>
                     <td>
                        <?php echo $v->slug; ?>
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