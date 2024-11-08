<?php

require_once("../inlcudes/config.php");
 include('../inlcudes/header.php');

 if (empty($_SESSION['user'])) {
        header('Location: login.php');
    }
// it initializes variables to store user information
    $error = '';
    $success = '';
    $fname =  $_SESSION['user'] ?? '';
    $fathername = '';
    $age = '';
    $qulification = '';
    $district = '';
    $village = '';
    $gender = '';
    $status = '';
    $subject = '';
    $phone = '';
    $address = '';
    $language = '';
    $useremail = $_SESSION['email'] ?? '';
    $password = '';


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileDestination = '';
// checks if an image was uploaded 
    if (!empty($_FILES['image']['name'])) {
        $file = $_FILES['image'];
        // File details
        $fileName = $_FILES['image']['name'];
        $fileTmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileError = $_FILES['image']['error'];
        $fileType = $_FILES['image']['type'];

        // File extension
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        // Allowed file types
        $allowed = array('jpg', 'jpeg', 'png', 'gif','jfif');

        // Check if file type is allowed
        if (in_array($fileActualExt, $allowed)) {//function call
            // Check for upload errors
            if ($fileError === 0) {
                // Check file size
                if ($fileSize < 5000000) { // 5MB limit
                    // Unique file name
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../uploads/' . $fileNameNew;

                    // Move file to upload directory
                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        $fileDestination = 'uploads/' . $fileNameNew;;
                    } else {
                        $error = "File upload failed!";
                    }
                } else {
                    $error = "Your file is too big!";
                }
            } else {
                $error =  "There was an error uploading your file!";
            }
        } else {
            $error =  "You cannot upload files of this type!";
        }
    }


    // Retrieve form data and insert into database
    $fname = $_POST['fname'];
    $fathername = $_POST['fathername'];
    $age = $_POST['age'];
    $qualification = $_POST['qulification'];
    $district = $_POST['district'];
    $village = $_POST['village'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $course_id = $_POST['course'];
    $phone = $_POST['phone'];
   
    $address = $_POST['address'];
    $language = json_encode($_POST['language']);
    $useremail = $_POST['useremail'];
    $user_id = $_SESSION['uid'];


    if ($error == "") {

        // SQL to insert data into table
        $sql = "INSERT INTO `admissions`( `username`, `useremail`, `fathername`, `age`, `qulification`, `district`, `village`, `user_id`, `userimage`, `gender`, `status`, `subject`, `phone`, `paddress`, `languages`,`course_id`)
        VALUES ('$fname', '$useremail', '$fathername','$age', '$qualification', '$district', '$village', '$user_id', '$fileDestination', '$gender',  '$status', '$subject', '$phone', '$address', '$language', '$course_id')";

        if ($conn->query($sql) === TRUE) {
            // Redirect user to a logged-in page
            header("Location:../admin/new-admissions.php");
            $success = "Your Registration  has been successfully done.";
            $error = '';
            $fname = '';
            $fathername= '';
            $age = '';
            $qualification ='';
            $district = '';
            $village = '';
            $gender = '';
            $status ='';
            $subject = '';
            $phone = '';
            $address = '';
            $language = '';
            $useremail = '';
          
        } else {
            $error =  "Error: " . $conn->error;
        }

        // Close connection
        $conn->close();
    }
}

?>
<!-- navigation -->
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <img src="<?= url('imgs/logofooter.png')?>" style=" width: 150px;" alt="" />
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
							<h2 style="text-transform: uppercase;">wellcome on admission portal</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="../index.php">Home</a> <i class="fa fa-angle-right"></i> 
                                    <a href="#">admission</a> </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- registration form -->
<div class="container-fluid custom-fluid">
<section class="valid-form">
    <div class="container-form">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="title">
                Registration Form
            </div>
            <div style="color:red !important; padding:20px 0; text-align:center; "><?= $error ?></div>
            <div style="color:green !important; padding:20px 0; text-align:center; "><?= $success ?></div>

            <div class="form">
                <div class="input_field">
                    <label>Upload Images</label>
                    <input type="file" name="image" style=" width:100%;" required>
                </div>
                <div class="input_field">
                    <label>Name</label>
                    <input type="text" class="input" name="fname" value="<?= $fname ?>" required>
                </div>
                <div class="input_field">
                    <label>Father Name</label>
                    <input type="text" class="input" name="fathername" value="<?= $fathername ?>" required>
                </div>
                <div class="input_field">
                    <label>Age</label>
                    <input type="text" class="input" name="age" value="<?= $age ?>" required>
                </div>
                <div class="input_field">
                    <label>Qulification</label>
                    <input type="text" class="input" name="qulification" value="<?= $qulification ?>" required>
                </div>
                <div class="input_field">
                    <label>District</label>
                    <input type="text" class="input" name="district" value="<?= $district ?>" required>
                </div>
                <div class="input_field">
                    <label>village</label>
                    <input type="text" class="input" name="village" value="<?= $village ?>" required>
                </div>
                
                <div class="input_field">
                    <label>Gender</label>
                    <div class="cusrom_select">
                        <select name="gender" required>
                            <option value="">Select</option>
                            <!-- checks the condition is true then return value selected if false then return empty value -->
                            <option <?= ($gender == 'male') ? 'selected' : ''; ?> value="male">Male</option>
                            <option <?= ($gender == 'female') ? 'selected' : ''; ?> value="female">Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
                <div class="input_field">
                    <label>Marital Status</label>
                    <div class="cusrom_select">
                        <select name="status" required>
                            <option value="">Select</option>
                            <!-- Ternary Operator  -->
                            <option <?= ($status == 'married') ? 'selected' : ''; ?> value="married">Married</option>
                            <option <?= ($status == 'unmarried') ? 'selected' : ''; ?> value="unmarried">Unmarried</option>
                        </select>
                    </div>
                </div>
                <div class="input_field">
                    <label>Select Course</label>
                    <div class="cusrom_select">
                        <select name="course" required>
                            <option value="">Please Select</option>
                            <?php 
                            $result2 = $conn->query("SELECT * FROM `course` WHERE 1");
                            
                            if ($result2->num_rows > 0) {
                                while($row2 = $result2->fetch_assoc()) {
                             ?>
                            <option  value="<?=  $row2['cno']; ?>"><?=  $row2['title']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>
                <div class="input_field">
                    <label>Email Adress</label>
                    <input type="email" class="input" name="useremail" value="<?= $useremail ?>" required>
                </div>
                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="number" class="input" name="phone" value="<?= $phone ?>" required>
                </div>
                <div class="input_field">
                    <label>How Did You Here About Us</label>
                    <div class="cusrom_select">
                        <select name="gender" required>
                            <option value="">Select</option>
                            <option <?= ($gender == 'male') ? 'selected' : ''; ?> value="male">our students</option>
                            <option <?= ($gender == 'female') ? 'selected' : ''; ?> value="female">whats-app group</option>
                            <option <?= ($gender == 'female') ? 'selected' : ''; ?> value="female">website</option>
                            <option <?= ($gender == 'female') ? 'selected' : ''; ?> value="female">posters</option>
                        </select>
                    </div>                </div>
                <!-- <div class="input_field">
                    <label style="margin-right:100px;">Enroll Course</label>
                    <input type="radio" name="caste" value="genral" required><label style="margin-left:5px;">Four Year</label>
                    <input type="radio" name="caste" value="obc" required><label style="margin-left:5px;">Five Year</label>
                    <input type="radio" name="caste" value="sc" required><label style="margin-left:5px;">Short course</label>
                    <input type="radio" name="caste" value="st" required><label style="margin-left:5px;">Online</label>
                </div> -->
                <div class="input_field">
                    <label style="margin-right:100px;">laguages</label>
                    <input type="checkbox" name="language[]" value="urdu"><label style="margin-left:5px;">urdu</label>
                    <input type="checkbox" name="language[]" value="english"><label style="margin-left:5px;">english</label>
                    <input type="checkbox" name="language[]" value="arabic"><label style="margin-left:5px;">arabic</label>
                </div>
                <div class="input_field">
                    <label>Address</label>
                    <textarea class="textarea" name="address"><?= $address ?></textarea>
                </div>
                <div class="input_field terms">
                    <label class="check">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                    </label>
                    <p>Agree to terms and conditions</p>
                </div>
                <div class="input_field">
                    <input type="submit" value="Register" class="btn" name="register">
                </div>
            </div>
        </form>
    </div>
</section>
</div>


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

<!-- jquery library -->
<script src="<?= url()?>js/JQuery7.3.js"></script>
<script src="../assets/jquery-ui/jquery-ui.js"></script>
<!-- crusal slider link -->
<script src="<?= url()?>assets/QCSlider/qcslider.jquery.js"></script>
<!-- marquee slider -->
<script src="<?= url()?>assets/MarqueeSlider/main.js" defer></script>

<!-- JQuery -->
<script>window.jQuery || document.write('<script src="javascripts/vendor/jquery-1.8.1.min.js"><\/script>')</script>
<!-- scroll up -->
<script src="<?= url()?>js/jquery.scrollUp.min.js"></script>
<!-- swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- my jquery admission kly php-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- my js fun -->
<script src="<?= url()?>js"></script>
<script src="<?= url()?>js/index.js"></script>
<script src="<?= url()?>js/login.js"></script>



<script src="<?= url()?>js/main.js"></script>
</body>
</html>