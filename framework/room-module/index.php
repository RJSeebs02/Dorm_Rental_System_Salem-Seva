<!--Index File for Room Page-->
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
    xmlhttp.open("GET", "room-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>

<div id="page-title">
    <h1><i class="fa-sharp fa-solid fa-door-closed"></i>&nbspRooms</h1>
</div> 
<div id="wrapper">
    <div id="submenu">
        <!--Submenu/Navigation bar for Room Page-->
        <a href="index.php?page=rooms&subpage=records"><i class="fa-solid fa-list"></i>&nbspList of Rooms</a>&nbsp&nbsp
        <a href="index.php?page=rooms&subpage=create"><i class="fa-sharp fa-solid fa-plus"></i>&nbspCreate New Room</a>
        <a><span class="right">Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)"></span></a>
    </div>
    <div id="subcontent">
        <?php
        switch($subpage){
                /*Switch case for the subpage of the Room Page */
                case 'create':
                    require_once 'create-room.php';
                break;
                case 'records':
                    require_once 'read-room.php';
                break; 
                case 'profile':
                    require_once 'profile-room.php';
                break;
                case 'result':
                    require_once 'search.php';
                break;
                default:
                    require_once 'read-room.php';
                break;
            }
        ?>
    </div>
</div>