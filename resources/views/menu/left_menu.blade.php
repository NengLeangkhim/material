 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void();" onclick="go_to('dashboard')" class="brand-link" style="background: #fff;">
      <img src="dist/img/favicon.png" alt="TURBOTECH Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><b><span style="color: red !important">TURBO</span><span style="color: #1fa8e0 !important">TECH</span></b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar" style="background:#1fa8e0">
    <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- ================CRM====================-->

          <?php
            echo $_SESSION['module'];
          // foreach ($_SESSION['module'] as $item){
          //   echo "<li class='nav-item has-treeview'>";
          //   echo "<a href='javascript:void(0);' class='nav-link active'>";
          //   echo "<i class='nav-icon  {$item->parent->icon} '></i>";
          //   echo " <p>";
          //   echo  $item->parent->module_name;
          //   if(($item->child))
          //   {echo "<i class='right fas fa-angle-left'></i>";}
          //   echo "</p></a>";
          //  if($item->child)
          //     {
          //       foreach ($item->child as $rr) {
          //           if(isset($rr->link)){
          //             echo " <ul class='nav nav-treeview sub_menu'> ";
          //             echo "  <li class='nav-item menu'  > ";
          //             echo "  <a href='javascript:void(0);' class='nav-link  ' ​value='$rr->link'  name='menu'> ";
          //             echo "  <i class='far fa-circle nav-icon'​></i> ";
          //             echo "  <p>$rr->module_name</p> ";
          //             echo "  </a></li></ul> ";
          //           }else{
          //             echo " <ul class='nav nav-treeview sub_menu'> ";
          //             echo "  <li class='nav-item has-treeview menu'  > ";
          //             echo "  <a href='javascript:void(0);' class='nav-link  ' ​value='{$rr->parent->link}'  name='menu'> ";
          //             echo "  <i class='far fa-circle nav-icon'​></i> ";
          //             echo "  <p>{$rr->parent->module_name}</p> ";
          //             echo "  </a></li> </ul>";
          //           }
          //       }
          //   }
          //   echo " </li>  ";
          //   }
        ?>
        </ul>
      </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>