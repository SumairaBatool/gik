<?php
// Database connection
require_once("../inlcudes/config.php");

$error = '';
$errorPassword = '';
$fname = '';
$lname = '';
$useremail ='';
$password = '';
$cpassword = '';
$role = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // echo '<pre>'; print_r($_POST); die;
    // Retrieve form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $useremail = trim(strtolower($_POST['useremail']));
    $role = $_POST['role'];
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);

    if ($password != $cpassword) {
        $errorPassword = 'password and confirm password not match';
    }
    else{
        // Hash the password for security
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $result = $conn->query("SELECT * FROM `user` WHERE email = '$useremail' ");
    
    if ($result->num_rows == 1) {
        $error  = 'This email is already exists.';
    } else {

       
        if($role == 'Student'){
            $uid = 'sid';
            $uval = strtoupper(uniqid('ST'));
        }else if($role == 'Teacher'){
            $uid = 'tid';
            $uval = strtoupper(uniqid('TC'));
        }else if($role == 'Admin'){
            $aid = 'tid';
            $uval = strtoupper(uniqid('AD'));
        }else if($role == 'Parent'){
            $aid = 'pid';
            $uval = strtoupper(uniqid('PA'));
        }else{
            $uid = 'sid';
            $uval = strtoupper(uniqid('ST'));
            $role = 'Student';
        }
        // SQL to insert data into table
        $sql = "INSERT INTO user (role, email, password) VALUES ('$role', '$useremail', '$password');";
        $sql .= " INSERT INTO $role ($uid,fname, lname, email) VALUES ('$uval','$fname', '$lname', '$useremail');";

        if ($conn->multi_query($sql) === TRUE) {
            // Redirect user to a logged-in page
            header("Location: login.php");
            exit;
        } else {
            $error  = "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    }
    }

    
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

    h2 {}

    /* Your existing CSS styles */
    /* ... */

    /* Improved styles for the form */
    .validation-form {

        width: 500px;
        max-width: 500px;
        margin: 1rem;
        padding: 2rem;
        box-shadow: 0 0 40px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
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
        color: orange;
        font-weight: bold;
    }

    .error-message {
        display: none;
        color: orange;
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
    select{
        width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    transition: border-color 0.3s;
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
                    <li><a href="../admin/index.php">Admin PaneL</a></li>
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
                                <h2 style="text-transform: uppercase;">wellcome on Register page</h2>
                            </div>
                            <div class="breatcome_content">
                                <ul>
                                    <li><a href="../index.php">Home</a> <i class="fa fa-angle-right"></i>
                                        <a href="register.php">Register</a>
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
            <div class="form-header ">
                <h2 style=" color: teal;
        background-color:teal; padding:10px 0px ; border-radius:5px; color:white;">Register </h2>
            </div>


            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" placeholder="First name" value="<?=$fname ?? ''?>" required>
            <div class="error-message" id="email-error">Please enter a valid name .</div>
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" placeholder="Last name" value="<?=$lname ?? ''?>" required>
            <div class="error-message" id="email-error">Please enter a valid name .</div>

            <label for="email">Email:</label>
            <input type="email" id="email" name="useremail" value="<?=$useremail ?? ''?>" placeholder="email" required>
            <div class="error-message" id="email-error">Please enter a valid email address.</div>
            <div class="error-message visible " style="margin-top:-10px; margin-bottom:10px"><?= $error ?></div>


             <div class="input_field">
                <label>Join As: </label>
                <div class="cusrom_select">
                    <select name="role" required>
                        <option value="">Select your role</option>
                        <!-- checks the condition is true then return value selected if false then return empty value -->
                        <option <?= ($role == 'Teacher') ? 'selected' : ''; ?> value="Teacher">Teacher</option>
                        <option <?= ($role == 'Student') ? 'Student' : ''; ?> value="Student">Student</option>
                        <!-- <option <?= ($role == 'Parent') ? 'selected' : ''; ?> value="Parent">Parent</option> -->
                    </select>
                </div>
            </div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?=$password ?? ''?>"  placeholder="password" required>
            <div class="error-message" id="password-error">Password must be at least 8 characters long.</div>

            <label for="cpassword">Confirm Password:</label>
            <input type="password" id="cpassword" name="cpassword" value="<?=$cpassword ?? ''?>"  placeholder="Confirm password" required>
            <div class="error-message" id="password-error">Password must be at least 8 characters long.</div>
            <div class="error-message visible " style="margin-top:-10px; margin-bottom:10px"><?= $errorPassword ?></div>

            <div class="forgot">
                <a href="register.php">Forgot Password?</a>
            </div>
            <input type="submit" value="Register">
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
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector(".validation-form");

            const emailInput = document.getElementById("email");
            const passwordInput = document.getElementById("password");
            const cpasswordInput = document.getElementById("cpassword");


            const emailError = document.getElementById("email-error");
            const passwordError = document.getElementById("password-error");


            form.addEventListener("submit", function(event) {
                // event.preventDefault();
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

                // if (cpasswordInput.value.length < 8) {
                //     cpasswordInput.classList.add("invalid");
                //     cpasswordError.classList.add("visible");
                //     isValid = false;
                // } else {
                //     cpasswordInput.classList.remove("invalid");
                //     cpasswordError.classList.remove("visible");
                // }



                if (!isValid) {
                    event.preventDefault();
                }
            });

            // Clear validation classes when inputs are focused
            const inputs = [nameInput, emailInput, passwordInput, confirmPasswordInput];
            inputs.forEach(input => {
                input.addEventListener("focus", function() {
                    this.classList.remove("invalid");
                });
            });
        });
    </script>
</body>

</html>