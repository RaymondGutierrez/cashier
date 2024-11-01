<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Sms4</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.0.5/css/boxicons.min.css">
</head>
<body>
<!-- palitan mo nalang mga nakalagay dyan sa side base sa system nyo -->
    <div class="sidenav" id="sidenav">
        <h4 class="text-center" style="color: white; font-size: 20px;">Registrar Department</h4><br><br>
        
        <div class="avatar-container text-center">
            <img src="image/avatar.jpg" alt="Avatar" class="avatar">
            <p class="username text-white">Boy Bawang</p>
            <p class="email text-white">admin@gmail.com</p>
        </div>
        
        <div class="container mt-5">
            <div class="dropdownSmsprofile">
                <a class="dropdown-a" href="index.php" style="text-decoration: none;"><i class='bx bx-grid-alt'></i> Dashboard</a>  
            </div>
            
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                    <i class='bx bx-user'></i> Admin Profile <i class="fa fa-caret-down" style="float: right;"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Account</span></a>
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Security</span></a>
                </div>
            </div>
    
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                    <i class='bx bx-user'></i>Cashier<i class="fa fa-caret-down" style="float: right;"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="balance.php" style="text-decoration: none;"><span>Transaction</span></a>
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Payment History</span></a>
                </div>
            </div>
    
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                    <i class='bx bx-user'></i> Student Information <i class="fa fa-caret-down" style="float: right;"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Student Personal Information</span></a>
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Student Personal Information</span></a>
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Student Personal Information</span></a>
                </div>
            </div>
    
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                    <i class='bx bx-money'></i> Document <i class="fa fa-caret-down" style="float: right;"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Document Request</span></a>
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Document Request</span></a>
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Document Request</span></a>
                </div>
            </div>
    
            <div class="dropdownSmsprofile">
                <button class="dropdown-btn" onclick="toggleDropdown(this)">
                    <i class='bx bx-file'></i> Curriculum <i class="fa fa-caret-down" style="float: right;"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-a" href="#" style="text-decoration: none;"><span>Courses</span></a>
                </div>
            </div>
    
            <div class="dropdownSmsprofile">
                <a class="dropdown-a" href="#" style="text-decoration: none;"><i class='bx bx-file'></i> <span>Email</span></a>  
            </div>
    
            <div class="dropdownSmsprofile">
                <a class="dropdown-a" href="#" style="text-decoration: none;"><i class='bx bx-log-out'></i> <span>LogOut</span></a>  
            </div>
        </div>
    </div>
    
    
<div class="main" id="mainContent">
    <button class="btn" id="toggleButton">&nbsp; ☰ &nbsp;</button>
    <hr>
    <h2 class="text-left" style="font-size: 22px;">Dashboard</h2><br>
    
    <!-- dito ka mag start -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    //SideNav
    const toggleButton = document.getElementById('toggleButton');
    const sidenav = document.getElementById('sidenav');
    const mainContent = document.getElementById('mainContent');

    toggleButton.addEventListener('click', () => {
        sidenav.classList.toggle('hidden');
        mainContent.classList.toggle('shift');
    });

    // Dropdown
    function toggleDropdown(button){
    button.classList.toggle("active");
    var dropdownContent = button.nextElementSibling;
    dropdownContent.style.display = (dropdownContent.style.display === "block") ? "none" : "block";
}

    window.onclick = function(event){
        if (!event.target.matches('.dropdown-btn')) {
            var dropdowns = document.getElementsByClassName("dropdown-container");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block"){
                    openDropdown.style.display = "none";
                }
            }
        }
    };


</script>
</body>
</html>
