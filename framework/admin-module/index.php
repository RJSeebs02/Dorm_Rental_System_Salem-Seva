<!---Displays the index of the Admin Module
Submenu for Admin Module is also displayed-->
<div id="page-title">
    <h1><i class="fa-sharp fa-solid fa-user-tie"></i>&nbspAdmins</h1>
</div>
<div id="wrapper">
    <!--Submenu/Navigation bar for Admins Page-->
    <div id="submenu">
        <a href="index.php?page=admins&subpage=records"><i class="fa-solid fa-list"></i>&nbspList of Admins</a>&nbsp&nbsp
        <a href="index.php?page=admins&subpage=create"><i class="fa-sharp fa-solid fa-plus"></i>&nbspCreate New Admin</a>
    </div>
    <div id="subcontent">
        <?php
            /*Switch case for the subpage of the Admins Page */
            switch($subpage){
                case 'create':
                    require_once 'create-admin.php';
                break;
                case 'records':
                    require_once 'read-admin.php';
                break; 
                case 'profile':
                    require_once 'profile-admin.php';
                break; 
                case 'remove':
                    require_once 'remove-admin.php';
                break; 
                default:
                    require_once 'read-admin.php';
                break;
            }
        ?>
    </div>
  </div>