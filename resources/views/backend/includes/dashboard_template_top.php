<?php
   if( !has_login() ){
      header('location:'.LOGIN_FORM);
      exit();
   }

   if( isset($_GET['logout']) ){
      logout();
   }

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo $page_title; ?></title>

      <?php include_once( __DIR__.'/load_css.php' ); ?>

   </head>
   <body class="hold-transition sidebar-mini">
      <div class="wrapper">
         <?php include_once(  __DIR__.'/top_menu.php' ); ?>
         <?php include_once(  __DIR__.'/left_nav_menu.php' ); ?>

         <div class="content-wrapper">
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1><?php echo $page_title; ?></h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active"><?php echo $page_title; ?></li>
                        </ol>
                     </div>
                  </div>
               </div>
            </section>



            <div class="top_20">
              <!-- flash msg -->
              <?php if( isset($_SESSION['is_flush_msg']) && $_SESSION['is_flush_msg'] ): ?>

               <div class="alert alert-<?php echo $_SESSION['alert_class']; ?> alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fa fa-check"></i> Info !</h5>

                  <strong><?php echo $_SESSION['msg_1']; ?></strong> <?php echo $_SESSION['msg_2']; ?>
               
               </div>

               <?php delete_flush(); ?>

              <?php endif; ?>
              <!-- end flash msg -->
            </div>

