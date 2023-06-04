<!--Index File for Rent Page-->
<div id="page-title">
    <h1><i class="fa-sharp fa-solid fa-pen-to-square"></i>&nbspRental</h1>
</div>    
<div id="wrapper">
    <div id="submenu">
        <!--Submenu/Navigation bar for Rent Page-->
        <a href="index.php?page=rent&subpage=records"><i class="fa-solid fa-list"></i>&nbspList of Rent</a>&nbsp&nbsp
        <a href="index.php?page=rent&subpage=create"><i class="fa-sharp fa-solid fa-plus"></i>&nbspCreate Rent</a>
    </div>
    <div id="subcontent">
        <?php
        /*Switch case for the subpage of the Rent Page */
            switch($subpage){
                case 'create':
                    require_once 'create-rent.php';
                break;
                case 'records':
                    require_once 'read-rent.php';
                break; 
                case 'profile':
                    require_once 'profile-rent.php';
                break; 
                case 'remove':
                    require_once 'cancel-rent.php';
                break;
                default:
                    require_once 'read-rent.php';
                break;
            }
        ?>
    </div>
</div>
