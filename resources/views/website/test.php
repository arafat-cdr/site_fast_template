<?php
   
   die('Not Allowed');

   $to = 'arafat.dml@gmail.com';
   $subject = 'Journal Publish Email';
   $body = "<h3>Hellow World</h3>\n"."<p>Hi There !</p>";

   $res = sendMail( $to, $subject, $body );

   var_dump($res);
   die('testing ...');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5 Card with Image and Centered Text</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            border-radius: 50%; /* Makes the image rounded */
            object-fit: cover; /* Ensures the image covers the space */
            width: 50%; /* Controls the width of the image */
            margin: 0 auto; /* Centers the image horizontally */
            margin-top: -30%;
        }
        .card-body {
            text-align: center; /* Centers the text */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <!-- Image with rounded corners -->
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ59XuPgWcM7vIFb2n41GquE-csAPkybPYbNg&s" class="card-img-top" alt="Image Description">
                <!-- Text centered below the image -->
                <div class="card-body">
                    <h5 class="card-title">Card Title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-md-4">
   <div class="card card-widget widget-user">
      <div class="widget-user-header bg-info">
         <h3 class="widget-user-username">Alexander Pierce</h3>
         <h5 class="widget-user-desc">Founder &amp; CEO</h5>
      </div>
      <div class="widget-user-image">
         <img class="img-circle elevation-2" src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg" alt="User Avatar">
      </div>
      <div class="card-footer">
         <div class="row">
            <div class="col-sm-4 border-right">
               <div class="description-block">
                  <h5 class="description-header">3,200</h5>
                  <span class="description-text">SALES</span>
               </div>
            </div>
            <div class="col-sm-4 border-right">
               <div class="description-block">
                  <h5 class="description-header">13,000</h5>
                  <span class="description-text">FOLLOWERS</span>
               </div>
            </div>
            <div class="col-sm-4">
               <div class="description-block">
                  <h5 class="description-header">35</h5>
                  <span class="description-text">PRODUCTS</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
