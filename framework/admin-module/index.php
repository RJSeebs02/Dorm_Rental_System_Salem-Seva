<!---Displays the index of the Admin Module
Submenu for Admin Module is also displayed-->
<script>
function showResults(str) {
  if (str.length == 0) {
    document.getElementById("search-result").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search-result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "admin-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>

<div id="page-title">
    <h1><i class="fa-sharp fa-solid fa-user-tie"></i>&nbspAdmins</h1>
</div>
<div id="wrapper">
    <!--Submenu/Navigation bar for Admins Page-->
    <div id="submenu">
        <a href="index.php?page=admins&subpage=records"><i class="fa-solid fa-list"></i>&nbspList of Admins</a>&nbsp&nbsp
        <a href="index.php?page=admins&subpage=create"><i class="fa-sharp fa-solid fa-plus"></i>&nbspCreate New Admin</a>
        <a><span class="right">Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)"></span></a>
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
                case 'result':
                    require_once 'search.php';
                break; 
                default:
                    require_once 'read-admin.php';
                break;
            }
        ?>
    </div>
  </div>