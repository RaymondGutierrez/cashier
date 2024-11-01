<!DOCTYPE html>
<html lang="en">
  <?php include './layout/head1.php' ?>
<body class="d-flex justify-content-center align-items-center ">
  
<div class="container">
        <div class="login-box">
            <div class="txt">
              <P><b>BESTLINK COLLEGE OF THE <br> PHILIPPINES </b></P>
            </div>
            <h2>Sign in</h2>
            <form id="loginForm">
                <div class="input-group">
                    <label for="username">Username *</label>
                    <input type="text" id="txt_username" name="txt_username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password *</label>
                    <input type="password" id="txt_password" name="txt_password" placeholder="Password" required>
                </div>
                <button type="submit">Sign in</button>
                <p class="signup-link">Don't have an account? <a href="#">Sign up</a></p>
            </form>
        </div>
    </div>
<?php include './layout/footer.php' ?>
</body>
</html>


<script src="./js/jquery/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        $('#loginForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting the traditional way
            
            // Collect form data
            const formData = {
                user_email: $('#txt_username').val(),
                user_password: $('#txt_password').val()
            };
            
            $.ajax({
                url: 'http://localhost/backend/auth-file/login.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    const status = response.message;
                    const jwt = response.jwt;

                    if(status!="Invalid User"){
                        localStorage.setItem('jwt', jwt);
                        window.location.href = 'index.php'; 
                    }
                    else{
                        alert("Error " + status);
                        $("#span_error").removeClass('d-none');
                        $("#txt_username").addClass('border border-danger');
                        $("#txt_password").addClass('border border-danger');

                    }
 

                },
                error: function(xhr, status, error) {
                    alert("An error occurred: " + error);
                }
            });
        });
    });
</script>
