<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <a href="<?php echo APP_URL.'dashboard'; ?>" class="brand-link">
   <img src="<?php echo PUBLIC_URL; ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
   <span class="brand-text font-weight-light">Admin Panel</span>
   </a>
   <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            <img src="<?php echo PUBLIC_URL; ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="<?php echo APP_URL.'dashboard'; ?>" class="d-block">Admin User</a>
         </div>
      </div>

      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
            <li class="nav-item">
               <a href="<?php echo APP_URL.'dashboard'; ?>" class="nav-link">
                  <i class="nav-icon fa fa-tachometer"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>

            <li class="nav-item">
               <a href="<?php echo APP_URL.'dashboard/journal-list'; ?>" class="nav-link">
                  <i class="nav-icon fa fa-book"></i>
                  <p>
                     Journal ++
                     <i class="fa fa-angle-left right"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  
                  <li class="nav-item">
                     <a href="<?php echo APP_URL.'dashboard/journal-add'; ?>" class="nav-link left_25">
                        <i class="fa fa-link nav-icon"></i>
                        <p>Add New Journal</p>
                     </a>
                  </li>

                  <li class="nav-item">
                     <a href="<?php echo APP_URL.'dashboard/journal-list'; ?>" class="nav-link left_25">
                        <i class="fa fa-link nav-icon"></i>
                        <p>Journal List</p>
                     </a>
                  </li>

               </ul>
            </li>
            
         </ul>
      </nav>
   </div>
</aside>