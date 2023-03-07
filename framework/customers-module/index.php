<!--Index File for Customers Page-->
<div id="page-title">
    <h1><i class="fa-sharp fa-solid fa-users"></i>&nbspCustomers</h1>
</div>    
<div id="wrapper">
    <div id="submenu">
        <!--Submenu/Navigation bar for Customers Page-->
        <a href="index.php?page=customers&subpage=records"><i class="fa-solid fa-list"></i>&nbspList of Customers</a>&nbsp&nbsp
        <a href="index.php?page=customers&subpage=create"><i class="fa-sharp fa-solid fa-plus"></i>&nbspCreate New Customer</a>
    </div>
    <div id="subcontent">
        <?php
            /*Switch case for the subpage of the Customers Page */
            switch($subpage){
                case 'create':
                    require_once 'create-customer.php';
                break;
                case 'records':
                    require_once 'read-customer.php';
                break; 
                case 'profile':
                    require_once 'profile-customer.php';
                break;
                default:
                    require_once 'read-customer.php';
                break;
            }
        ?>
    </div>
</div>