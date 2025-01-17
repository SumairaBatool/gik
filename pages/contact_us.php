<!DOCTYPE HTML>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="../assets/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="../CSS/nav.css">
<link rel="stylesheet" href="../CSS/common.css">
<link rel="stylesheet" href="../CSS/footer.css">
<link rel="stylesheet" href="../CSS/banner.css">
    <link rel="stylesheet" href="../CSS/contact_us.css">
<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/index.css">
<!-- googleapis -->
	<link rel="stylesheet" type="text/css" href="../assets/MapIt-master/MapIt-master/demo/stylesheets/styles.css">
</head>
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
							<h2 style="text-transform: uppercase;">wellcome on contact us page</h2>
						</div>
						<div class="breatcome_content">
							<ul>
								<li><a href="index.php">Home</a> <i class="fa fa-angle-right"></i> 
                                    <a href="#">admission</a> </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
    <div class="background-clr ">
        <div class="contact-us ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">
                        <div class="contact-width contact-us-text">
                            <h3 class="text margin-padding" style="color: teal; font-size: 40px; margin-bottom: 30px;">Contact Us</h3>
                            <p class="contact-icons" style="color:black;">Gatewaay to Islamic Knowledge is an islamic school where male and female both learn islamic education.If you want to get more information then you caan contact us.</p>
                            <div class="contact-icons">
                                <i class="fa-solid fa-location-dot"></i>
                                <span>Address</span>
                                <h5>Satelite Town Skardu Street -2</h5>
                            </div>
                            <div class="contact-icons">
                                <i class="fa-solid fa-envelope"></i>
                                <span>Mail</span>
                                <h5>shahhmdan@gmail.com</h5>
                            </div>
                            <div class="contact-icons">
                                <i class="fa-solid fa-phone"></i>
                                <span>Phone</span>
                                <h5>+91 0355181879</h5>
                            </div>
                            <div class="contact-icons">
                                <i class="fa-solid fa-globe-pointer"></i>
                                <span>Website</span>
                                <h5>GatewayToIslamicKnowledge</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-5">
                        <div class="contact-width">
                     <div class="col-md-12">
                        <form action="#" method="post" id="validation-form">
                            <h3 class="text" style="color: teal; margin: 20px 0; font-size: 30px;
                            font-weight: 700;">Get in touch with us</h3>
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" placeholder="name">
                            <div class="error-message" id="name-error">Name is required.</div>
        
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" placeholder="email">
                            <div class="error-message" id="email-error">Please enter a valid email address.</div>
        
                            <label for="subject">Location:</label>
                            <input type="text" id="name" name="subject" placeholder="subject">
                            <div class="error-message" id="name-error">Name is required.</div>
        
                            <label for="message">Message:</label>
                            <textarea id="outline" name="message" rows="10" cols="30" placeholder="messsage"></textarea>
                            <div></div>
                            <input type="submit" value="submit">
                        </form>
                     </div>
                            
                        </div>
                    </div>
                </div>
            </div>
          
          
        </div>
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
</body>
<script src="../js/JQuery7.3.js"></script>
<script src="../js/contact_us.js"></script>
<script src="../js/admission.js"></script>

    <!-- google maps link -->

	<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="javascripts/vendor/jquery-1.8.1.min.js"><\/script>')</script>

	<!-- JS -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOaSmNcBHf07FWaVlO4pXgyFYMjmCPAEg" ></script>
	<script type="text/javascript" src="../assets/MapIt-master/MapIt-master/demo/javascripts/vendor/jquery.mapit.min.js"></script>
	<script src="../assets/MapIt-master/MapIt-master/demo/javascripts/initializers.js"></script>
	<!-- JS ends -->

</html>