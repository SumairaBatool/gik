
<?php

require_once("../inlcudes/config.php");

$error = "";

// Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Retrieve form data
//     $useremail = $_POST['useremail'];
//     $password = $_POST['password'];
//     // Validate user credentials
//     $sql = "SELECT * FROM users WHERE useremail = '$useremail'";
//     $result = $conn->query($sql);

//     if ($result->num_rows == 1) {
//         $row = $result->fetch_assoc();
//         // Verify password
//         if (password_verify($password, $row['userpassword'])) {
//             // Password is correct, set session variables
//             $_SESSION['userInfo']['userid'] = $row['id'];
//             $_SESSION['userInfo']['username'] = $row['username'];
//             $_SESSION['userInfo']['useremail'] = $row['useremail'];
//             $_SESSION['userInfo']['options'] =  (object) $row;
            
    
//             // Redirect to logged-in page
//             header("Location:admission.php");
//             exit();
//         } else {
//             $error = "Wrong email or password. Login failed!!";
//         }
//     } else {
//         $error = "User not found";
//     }
// }
?>


<?php

if (isset($_POST['submit'])) {
   
  echo $email = $_POST['useremail'];
  echo $password = $_POST['password'];
  
  $sql = "SELECT * FROM user WHERE email ='".$email."' and password = '".$password."' ";
              $result = $conn->query($sql);
             
              if ($result->num_rows > 0) {
               // output data of each row
                 while($row = $result->fetch_assoc()) {
                  $_SESSION['role'] = $row['role'];

                   $sql2 = "SELECT * FROM ".$_SESSION['role']." WHERE email ='".$email."'";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                        while($row2 = $result2->fetch_assoc()) {
                          
                          $_SESSION['user'] = $row2['fname']." ".$row2['lname'];
                          $_SESSION['email'] = $row2['email'];
                          if($_SESSION['role']=='Admin'){
                            $_SESSION['uid']=$row2['aid'];
                          }else  if($_SESSION['role']=='Student'){
                            $_SESSION['uid']=$row2['sid'];
                          }else if($_SESSION['role']=='Parent'){
                            $_SESSION['uid']=$row2['pid'];
                          }else if($_SESSION['role']=='Teacher'){
                            $_SESSION['uid']=$row2['tid'];
                          }
                        }

                    }

                    header("Location: ../admin/");
                     }         }else{ $error = "<p style='width:100%;text-align:center; color:red;'>Incorrect username or password</p>";}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../CSS/nav.css">
    <link rel="stylesheet" href="../CSS/common.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/banner.css">
    <title>Log in</title>
</head>
<style>
    .contain {

        margin: 0;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        background-color: gainsboro;
        /* margin-top: 50px; */
    }

    .form-header {
        background-color: #f7f7f7;
        border-bottom: 1px solid #f0f0f0;
        padding: 25px;
        text-align: center;
    }

    .heading h2 {
        margin: 0;
    }


    /* Your existing CSS styles */
    /* ... */

    /* Improved styles for the form */
    .validation-form {

        width: 500px;
        max-width: 500px;
        margin: 1rem;
        padding: 2rem;
        box-shadow: 0 0 40px rgba(0, 0, 0, 0.2);
        border-radius:10px;
        background: #ffffff;
        background-color: #f5f5f5;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: teal;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
        transition: border-color 0.3s;
    }

    input[type="submit"] {
        background-color: teal;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 20px;
    }

    input[type="submit"]:hover {
        background-color: #DCE0E1;
        color:orange;
        font-weight: bold;
    }

    .error-message {
        display: none;
        color:orange;
        font-size: 14px;
        margin-top: 5px;
    }

    .visible {
        display: block;
    }

    .forgot a {
        color: #5997d4;
    }

    .forgot {
        margin-top: 10px;
    }

    /* Rest of your existing styles */
    /* ... */
</style>

<body>
    <!-- header -->
    <header>
        <div class="container-fluid p-4 custom-container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-2 order-sm-1 order-lg-1 col-sm-6 custom-col">
                    <li><a href="#">URDU</a></li><br>
                    <li><a href="#">ARABIC</a></li>
                </div>
                <div class="col-lg-8 order-sm-3 order-lg-2 col-sm-12 custom-col">
                    <li><a href="#">SATELITE TOWN SKARDU, STREET NO-2</a></li><br>
                    <li><a href="#">+921818999872</a></li><br>
                    <li><a href="#">SATUARDY-THHRUSDAY:5:00AM-3:00PM</a></li>
                </div>
                <div class="col-lg-2 order-sm-2 order-lg-3 col-sm-6 custom-col">
                    <li><a href="login.php">LOGIN</a></li><br>
                    <li><a href="../admin/users.php">Admin panel</a></li>
                </div>
            </div>
        </div>
    </header>
    <!-- navigation -->
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <img src="../imgs/logofooter.png" style=" width: 150px;" alt="" />
        <ul class="hidenav">
            <li><a href="../index.php">Home</a></li>
            <li><a href="admission.php">Admission</a></li>
            <li><a href="Campasses.php">Campus</a></li>
            <li><a href="courses.php">Course</a></li>
            <li><a href="Faculty.php">Teachers</a> </li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="Donations.php">About us</a></li>
            <li><a href="contact_us.php">Contact us</a></li>
        </ul>
    </nav>
    <!-- banner -->
    <section>
        <div class="breatcome_area d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breatcome_title">
                            <div class="breatcome_title_inner pb-2">
                                <h2 style="text-transform: uppercase;">wellcome on login page</h2>
                            </div>
                            <div class="breatcome_content">
                                <ul>
                                    <li><a href="../index.php">Home</a> <i class="fa fa-angle-right"></i>
                                        <a href="login.php">login</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="contain">
        <form action="#" method="post" class="validation-form">
            <div class="form-header">
                <h2 style="  color: teal; background-color:teal; padding:10px 0px ; border-radius:5px; color:white;" >Log in</h2>
            </div>

            <div style="color:red !important; padding:20px 0; text-align:center; "  ><?=$error?></div>

            <label for="email">Email:</label>
            <input type="email" id="email" name="useremail" value="<?= $useremail ?? '' ?>" placeholder="email">
            <div class="error-message" id="email-error">Please enter a valid email address.</div>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?=$password ?? '' ?>" placeholder="password">
            <div class="error-message" id="password-error">Password must be at least 8 characters long.</div>

            <div class="forgot">
                <a href="#">Forgot Password?</a>
            </div>

            <button name="submit" value="submit" type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
            <div class="forgot">
                <a href="register.php">Not Register? <b>Register now</b> </a>
            </div>


        </form>
    </div>

 <!-- footer -->
 <footer id="footer">
        <div class="container-fluid">
            <div class="row" style="">
                <div class="col-sm-12 col-md-3" style="" class="custom-css-footer">
                    <img src="../imgs/logofooter.png" alt="" style="width: 200px;">
                    <p class="f--para">GIK, Gateway to Islamic Knowledge 
                        is the gateway where people 
                        character polished and make them success for akhirah.</p>
                </div>
                <div class=" col-sm-12 col-md-3" style="" class="custom-css-footer">
                    <h4 class="footer-title">Our Courses</h4>
                    <ol class="link-link">
                        <li class="custom-list">
                            <a href="../index.php" class="footer-items">Tafseer ul Quran</a>
                        </li>
                        <li class="custom-list">
                            <a href="../index.php" class="footer-items">Tajweed ul Quran</a>
                        </li>
                        <li class="custom-list">
                            <a href="../index.php" class="footer-items">Hafz ul Quran</a>
                        </li>
                        <li class="custom-list">
                            <a href="../index.php" class="footer-items">Makriem Ikhlaq</a>
                        </li>
                        <li class="custom-list">
                            <a href="../index.php" class="footer-items">Dars E Hadith</a>
                        </li>
                        <li class="custom-list">
                            <a href="../index.php" class="footer-items">Pand Nama</a>
                        </li>
                        <li class="custom-list">
                            <a href="../index.php" class="footer-items">Tarjuma and Tafseer</a>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-12 col-md-3" style="" class="custom-css-footer">
                    <h4 class="footer-title">Quick Links</h4>
                    <ol class="link-link">
                        <li class="custom-list">
                            <a href="../index.php" class="footer-items">Home</a>
                        </li>
                        <li class="custom-list">
                            <a href="../index.php" class="footer-items">About Us</a>
                        </li>
                        <li class="custom-list">
                            <a href="../index.php" class="footer-items">Our Faculty</a>
                        </li>
                        <li class="custom-list">
                            <a href="../index.php" class="footer-items">Gallery</a>
                        </li>
                        <li class="custom-list">
                            <a href="../index.php" class="footer-items">FAQ's</a>
                        </li>
                        <li class="custom-list">
                            <a href="../index.php" class="footer-items">Privacy Policy</a>
                        </li>
                        <li class="custom-list">
                            <a href="../index.php" class="footer-items">Contact Us</a>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-12 col-md-3" style="" class="custom-css-footer">
                    <h4 class="footer-title">Institution Address</h4>
                    <p class="footer-info">SATELITE town near prishan choke and army public school skardu</p><br>
                    <a href="#" class="followus">Follow Us</a>
                    <a href="#" class="f-icon">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="#" class="f-icon">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#" class="f-icon">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="f-icon">
                        <i class="fa-brands fa-skype"></i>
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <p class="copy-right">© Gateway to Islamic Knowledge.All Rights Reserved. </p>
                </div>
                <div class="col-md-4  ml-auto">
                    <a href="../index.php" class="footer-lest-text ">Privacy Policy <span class="privacy">/</span> </a>
                    <a href="../index.php" class="footer-lest-text"> Terms & Conditions </a>
                </div>
            </div>
        </div>
    </footer>
    <script src="jquery.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.querySelector(".validation-form");

            const emailInput = document.getElementById("email");
            const passwordInput = document.getElementById("password");


            const emailError = document.getElementById("email-error");
            const passwordError = document.getElementById("password-error");


            form.addEventListener("submit", function (event) {
                let isValid = true;


                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailInput.value)) {
                    emailInput.classList.add("invalid");
                    emailError.classList.add("visible");
                    isValid = false;
                } else {
                    emailInput.classList.remove("invalid");
                    emailError.classList.remove("visible");
                }

                if (passwordInput.value.length < 8) {
                    passwordInput.classList.add("invalid");
                    passwordError.classList.add("visible");
                    isValid = false;
                } else {
                    passwordInput.classList.remove("invalid");
                    passwordError.classList.remove("visible");
                }



                if (!isValid) {
                    event.preventDefault();
                }
            });

            // Clear validation classes when inputs are focused
            const inputs = [nameInput, emailInput, passwordInput, confirmPasswordInput];
            inputs.forEach(input => {
                input.addEventListener("focus", function () {
                    this.classList.remove("invalid");
                });
            });
        });
    </script>
</body>

</html>