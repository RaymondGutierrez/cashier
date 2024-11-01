<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Sms4</title>
    <link rel="stylesheet" href="./css/template.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div id="sidenav" class="sidenav">
        <img src="bcplogo.png" alt="img" class="bcplogo">
        <ul class="nav-link">
            <li class="bellNotiff">
            <a href="#" class="active">
                <i class='bx bx-bell'></i>
            </a>
            </li>
            <li class="userProfile">
            <a href="#">
                 <i class='bx bx-user'></i>
            </a>
            </li>
            <img src="avatar.jpg" alt="avatar" class="avatar"><br><br>
            <table class="user-profile">
              <tr>
                <td><span class="user-name"><b>Lexi Crempie Lore</b></span></td>
              </tr>
              <tr>
                  <td> <span class="user-mail">20156548@bcp.edu.ph</span></td>    
              </tr>
            </table>        
        </ul><br>

        <table class="dashboard">
          <tr>
            <td>
              <ul class="nav-links">
              <li>
                <a href="#">
                  <i class='bx bx-grid-alt' ></i>
                  <span class="links_name">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class='bx bx-user' ></i>
                  <span class="links_name">Sms Profile</span>
                </a>
              </li>
            </ul>   
            </td>
          </tr>            
        </table>

        <table class="administrative"><br><br>
          <span class="main"><b>ADMINISTRATIVE</b></span><br>
          <span class="sub"><b>Administrative Control</b></span>
          <tr>
            <td>
              <ul class="nav-links">
              <li>
                <a href="#">
                  <i class='bx bx-user' ></i>
                  <span class="links_name">Administration</span>
                </a>
              </li>
            </ul>   
            </td>
          </tr>            
        </table>

        <table class="admission"><br><br>
          <span class="main"><b>ADMISSION</b></span><br>
          <span class="sub"><b>Student Admission</b></span>
          <tr>
            <td>
              <ul class="nav-links">
              <li>
                <a href="#">
                  <i class='bx bx-file' ></i>
                  <span class="links_name">Student Download</span>
                </a>
              </li>
            </ul>   
            </td>
          </tr>            
        </table><br>

        <div class="dropdownCashier">
        <span class="main"><b>CASHIERING</b></span><br>
        <span class="sub"><b>Cashiering Action</b></span><br><br>
        <button class="dropdown-btn"> <i class='bx bx-money' ></i>
          <span class="droplinks_name">Cashiering</span>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a class="dropdown-a" href="tracker.php"><span class="droplinks_name">Receipt Tracker</span></a>
          <a class="dropdown-a" href="loading.php"><span class="droplinks_name">Class Loading</span></a>
          <a class="dropdown-a" href="grade.php"><span class="droplinks_name">Registrar Grade</span></a>
          <a class="dropdown-a" href="approval.php"><span class="droplinks_name">Approval</span></a>
          
        </div>

      </div>

        <table class="enrollment"><br><br>
          <span class="main"><b>ENROLLMENT</b></span><br>
          <span class="sub"><b>Enrollment Information</b></span>
          <tr>
            <td>
              <ul class="nav-links">
              <li>
                <a href="#">
                  <i class='bx bx-file' ></i>
                  <span class="links_name">Enrollment</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class='bx bx-receipt' ></i>
                  <span class="links_name">Create Student Record</span>
                </a>
              </li>
             
            </ul>   
            </td>
          </tr>            
        </table>

        <table class="otherService"><br><br>
          <span class="main"><b>OTHER SERVICES</b></span><br>
          <tr>
            <td>
              <ul class="nav-links">
              <li>
                <a href="#">
                  <i class='bx bx-file' ></i>
                  <span class="links_name">Non Academic Affairs</span>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class='bx bx-file' ></i>
                  <span class="links_name">Appointment</span>
                </a>
              </li>
            </ul>   
            </td>
          </tr>            
        </table><br><br>
    </div>
    <div id="uppernav">
        <div class="upnav">
        <button class="openbtn" onclick="toggleNav()">☰</button>
    </div>
<!--#################################################################################-->

    <div class="container">
        <!-- dito ka mag simula-->
    
    </div>
</div>


    <script type="text/javascript">
    function toggleNav() {
    const sidenav = document.getElementById("sidenav");
    const uppernav = document.getElementById("uppernav");

    if (sidenav.style.left === "0px") {
        sidenav.style.left = "-280px";
        uppernav.style.marginLeft = "0";
    } else {
        sidenav.style.left = "0";
        uppernav.style.marginLeft = "280px";
    }
}

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}


    </script>
</body>
</html>
