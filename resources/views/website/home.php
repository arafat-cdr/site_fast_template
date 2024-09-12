<?php
   $page_title = 'Universepg Home';

   $seo_data = get_global_seo();
   if( $home_res && $home_res->use_global_seo != 'yes' ){
      $seo_data = html_decode( $home_res->seo_data );
   }

   $site_verify = get_site_verify();

   $canonical = APP_URL.'home';

   $journals = array();

   $home_content = 'Hello world';

?>

<?php include_once( __DIR__.'/includes/template_top.php' ); ?>

<div class="container-fluid top_30">
   

   <div class="row">

      <div class="col-sm-12 col-md-9">
         <?php echo $home_content; ?>   
      </div>

   </div>


</div>

<?php include_once( __DIR__.'/includes/template_bottom.php' ); ?>