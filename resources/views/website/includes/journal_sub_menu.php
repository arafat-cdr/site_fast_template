<div class="col-sm-11 bottom_50" style="background: #eefff4;  margin-top: -50px;">
   
   <ul class="nav justify-content-center nav-pills">
     <li class="nav-item">
       <a class="nav-link <?php if( $active == 'home') { echo 'active'; } ?>" aria-current="page" href="<?php echo $home; ?>">Home</a>
     </li>
     <li class="nav-item">
       <a class="nav-link <?php if( $active == 'current_issue') { echo 'active'; } ?>" href="<?php echo APP_URL.$route_slug.'/current-issue'; ?>">Current Issue</a>
     </li>
     <li class="nav-item">
       <a class="nav-link <?php if( $active == 'archive') { echo 'active'; } ?>" href="<?php echo APP_URL.$route_slug.'/archive'; ?>">Archive</a>
     </li>
     <li class="nav-item">
       <a class="nav-link <?php if( $active == 'all_article') { echo 'active'; } ?>" href="<?php echo APP_URL.$route_slug.'/all-artilce'; ?>">All Article</a>
     </li>
     <li class="nav-item">
       <a class="nav-link <?php if( $active == 'editorial_board') { echo 'active'; } ?>" href="<?php echo APP_URL.$route_slug.'/editorial-board'; ?>">Editorial Board</a>
     </li>

   </ul>

   <ul class="nav d-flex flex-row-reverse nav-pills">
     <li class="nav-item">
       <a href="<?php echo APP_URL.$route_slug.'/rss.xml'; ?>">
         Rss Feed
       </a>
     </li>
   </ul>

</div>