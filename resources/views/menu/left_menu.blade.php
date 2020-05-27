 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="dist/img/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">TURBOTECH</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">  
        <!-- ================CRM====================-->
          <?php 
        if (is_array($menu ?? '') || is_object($menu ?? '')){
          foreach ($menu ?? '' as $m) {   
            echo "<li class='nav-item has-treeview '>";
            echo "<a href='#' class='nav-link active'>";
            echo "<i class='nav-icon fas fa-tachometer-alt'></i>";
            echo " <p>";
            echo $m->name;           
            echo "<i class='right fas fa-angle-left'></i>";
            echo "</p></a>";
            $menuid=$m->id;
              foreach ($sub_menu ?? '' as $sub_m) {
                if($sub_m->menu_id==$menuid){               
                  echo " <ul class='nav nav-treeview'> ";
                  echo "  <li class='nav-item'> ";
                  echo "  <a href='#' class='nav-link'> ";
                  echo "  <i class='far fa-circle nav-icon'></i> ";
                  echo "  <p>$sub_m->name</p> ";
                  echo "  </a></li></ul> ";
                }            
              }
            echo " </li>  ";
            }
        }
        ?>    
        </ul>
      </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>