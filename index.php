

<?php include('inlcudes/header.php') ?>
    <!-- navigation -->
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <img src="imgs/logofooter.png" style=" width: 200px; max-height: 100px;" alt="" />
        <ul class="hidenav">
            <li><a href="index.php">Home</a></li>
            <li><a href="pages/admission.php">Admission</a></li>
            <li><a href="pages/Campasses.php">Campus</a></li>
            <li><a href="pages/courses.php">Course</a></li>
            <li><a href="pages/Faculty.php">Teacher</a> </li>
            <li><a href="pages/gallery.php">Gallery</a></li>
            <li><a href="pages/Donations.php">About us</a></li>
            <li><a href="pages/contact_us.php">Contact us</a></li>
        </ul>
    </nav>
    <!-- banner -->
    <section class="bg-banner">
        <section class="slide">
            <div class="slider-container">
                <ul class="slider-wrapper" id="slider">
                    <!--Background image with center text-->
                    <div class="container-fluid custom-banner-container">
                        <div class="row">
                            <div class="banner-text-style breatcome_title_inner">
                                <h2>Gateway To Islamic Knowledge</h2>
                                <p>GIK is a school of Islamic jurisprudence that emphasizes the Muslim Unity. Its very foundations rests on the belief in Allah, Angels, Prophets, Day of Judgement, Holy Quran and other Holy Islamic Scriptures revealed upon previous Prophets.
                                     While, practices include Prayers (five times in a day) Fasting of Ramadan, Zakah and Pilgrimage journey to Kaaba.</p>
                                <div class="col offset-5" style="width: fit-content;">
                                    <!-- <a href="index.php">
                                    <button class="col" style="margin-top: 20px;">Read More</button>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <li class="slide-current">
                        <!-- Image -->
                        <img src="imgs/sir.jpg" />
                    </li>
                    <li class="slide-current">
                        <!-- Image -->
                        <img src="imgs/cplx.jpg" />
                    </li>
                    <li class="slide-current">
                        <!-- Image -->
                        <img src="imgs/mdrsafront.jpg" />
                    </li>
                    <li class="slide-current">
                        <!-- Image -->
                        <img src="imgs/banner-4.jpg" />
                    </li>
                  
                </ul>
                <!-- Nav controls -->
                <div class="drt-control control-left" id="lft-control"><</div>
                <div class="drt-control control-right" id="rht-control">></div>
                <ul class="slider-controls" id="slider-controls"></ul>
                <!-- Progressbar -->
                <div class="tempo-bar" id="barra"></div>
            </div>
        </section>
    </section>
    <!-- welcome message -->
    <section>
        <div class="container-fluid custom-head-container">
            <div class="row">
                <div class="col">
                    <h1>WELCOME TO SHAH HAMDAN INSTITUTION</h1>
                    <p style="text-align: center; color: black; margin-top: 10px; text-align:justify">
                    Madrasa SHAH HAMDAN is a school of Islamic jurisprudence that emphasizes the Muslim Unity. Its very foundations rests on the belief in Allah, Angels, Prophets, Day of Judgement, Holy Quran and other Holy Islamic Scriptures revealed upon previous Prophets. While, practices include Prayers (five times in a day) Fasting of Ramadan, Zakah and Pilgrimage journey to Kaaba. These Beliefs and Practices has been excerpted from the books: Usool Aitaqadia(deals with Beliefs) and Fiqh ul Ahwat (deals with Islamic Jurisprudence), which were written by Hazrat Shah Syed Muhammad Nurbaksh. Noorbakhshia has its own Silsila (Sufi Order) : Silsila-e-Zahab (Golden Chain). This Silsila has Imam Haqiqi (Divinely Appointed Imam): from Imam Ali (A.S) to Imam Mahdi (A.S), and Imam Izafi (Deputy to Haqiqi Imam). The linkage of Imam Izafi stems from renowned Sufi saint Maroof e Karkhi and it will continue till they day of Judgement. Noorbakhshia is the 
                    only Sufi order of Islam whose foundations have been laid upon the teachings of Aima Tahirreen (Fourteen Infallibles).</p>
                </div>
            </div>
        </div>

    </section>
    <!-- principle message -->
    <section>
        <div class="container-fluid custom-principel-message">
            <div class="row">
                <div class="col-lg-3 col-sm-12 col-md-12">
                
                    <img src="imgs/ataarif.jpg" alt="" width="320px" height="280px"
                        style="border-radius: 8px; margin-top: 0px;">
                        <h2 style="text-align:left;margin-top:15px; font-weight:bold; text-transform: uppercase;">Moulana Arif Hussain</h2>
                </div>
                <div class="col-lg-9">
                    <h2 style="margin: 10px auto;">PRINCIPLE MESSAGE</h2>
                    <P style="line-height:35px">Welcome to Shah Hamdan Instituion!We aim to keep Allah the center of all that we do, so we can maintain Him as Akbar (the Greatest) in all situations. This is what we strive to instill in our students, so that they follow an Allah-first motto in their lives. Part of living this motto is to be of service to others, for the sake of Allah, and to offer innovative, Islamic solutions to real-world challenges.

We thank you for your interest in Shah Hamdan Institution. Give your children this beautiful gift of an Islamic education through Madrasa Shah Hamdan. Explore our rigorous academic program, which is based on 34 years of experience in the field. Sign your children up at Shah Hamdan Institution, so we can nurture them together to overcome today’s challenges and prepare them for tomorrow’s opportunities.
                    </P>
                    <div class="col-lg-2 offset-lg-10">
                        <a href="">
                        <button>Read More</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
    <div class="col-12" align="center">
                    <h1 style="margin:20px auto;">Website Status</h1>
                </div>
        <div class="container-fluid custom-choose-container">
   
            <div class="row custom-row">
                <div class="row  col-sm-12 col-md-12 custom-style" style="margin-top: 20px;">
                    <div class="boxses" class="col-lg-2">
                <h3>
               
                        <?php
                      $sql = "SELECT count(*) AS users FROM user"; 
                      echo $conn->query($sql)->fetch_assoc()['users'];
                     ?>
                          <i class="fa fa-users" aria-hidden="true" style="font-size:80px; margin-left:10px;margin-top:-5px"></i>
                        </h3>
                        <p>No of Registered Users</p>
                    </div>
                    <div class="boxses" class="col-lg-2">
                        <h3>
                       
                        <?php
                      $sql = "SELECT count(*) AS adms FROM student"; 
                      echo $conn->query($sql)->fetch_assoc()['adms'];
                     ?>
                       <i class="fa fa-users" aria-hidden="true" style="font-size:80px; margin-left:10px;margin-top:-5px"></i>
                        </h3>
                        <p>No fo submitted form</p>
                    </div>
                    <div class="boxses" class="col-lg-2">
                        <h3>
                        <?php
                      $sql = "SELECT count(*) AS crs FROM subject"; 
                      echo $conn->query($sql)->fetch_assoc()['crs'];
                     ?>
                     <i class="fa fa-users" aria-hidden="true" style="font-size:80px; margin-left:10px;margin-top:-5px"></i>
                        </h3>
                        <p>No of Course offering</p>
                    </div>
                    <!-- <div class="boxses" class="col-lg-2">
                        <h3>55%</h3>
                        <p>Our Students <br>teach in<br>Different Institution</p>
                    </div> -->
                </div>

            </div>
        </div>
    </section>
    <!-- what scholer seys -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1 style="margin:20px auto;">What Scholer Say </h1>
                    <p
                        style="text-align: center; color: black; text-decoration: overline 3px solid rgb(0, 83, 83); margin-top: 10px;">
                        Don't take our word for it, see what our awesome faculty say.</p>
                </div>
                <div class="containerbox">
                    <div class="col-lg-6  col-sm-12">
                        <div class="bluebox">
                            <P class="blueboxpara">I Chose them because it gave me flexibility.I was working full-
                                time at these at the same time i was studaying so they gave me that flexibility</P>
                            <img src="imgs/kaneez-fatima.jpeg" alt="">
                            <div class="samecss">
                                <h2 style="color:darkblue !important;">Kaneez Zahra</h2>
                                <p style="color: rgb(177, 116, 3);">Khplu Balghar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="orangebox">
                            <P class="orangeboxpara">I Chose them because it gave me flexibility.I was working full-
                                <br>
                                time at these at the same time i was studaying so the OU gave me that flexibility.Also they gave me that flexibility
                                originI was working full-time at these at the same time i was studaying so
                            </P>
                            <img src="imgs/scholer1.jfif" alt="">
                            <div class="samecss" style="margin-top: 40px;">
                                <h2 style="color:darkblue !important;  font-weight: bold;">Kaneez Fatima</h2>
                                <p style="  color: rgb(177, 116, 3); font-weight: normal;margin-top:-10px;">Khaplu Surmo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
       <!-- popular course -->
       <section>
        <h1 style="padding-top: 20px;">Popular Course</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <section class="container">
                        <div class="marquee-wrapper" style="user-select: none;">
                            <div class="marquee-content scrollingX">
                                <!-- fetching and displaying information about courses from a database. -->
                            <?php
                                    // SQL query to retrieve data from the users table
                                    $sql = "SELECT * FROM course";
                                    $result = $conn->query($sql);

                                    // Check if any rows were returned
                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($row = $result->fetch_assoc()) { ?>
                                <div class="popularcoursebox">
                                    <div class="imgincludebox">
                                        <img src="<?php echo url('uploads\courses\667bb6c139e949.81096572.png') ?>" alt="" class="imgcourse">
                                        <p class="coursepara"><?=$row['title'] ?? 'unknown' ?></p>
                                        <p class="course-discriptipon" style="font-size: small;" ><?= substr($row['description'], 0,70) .'...' ?? 'unknown' ?></p>
                                        <p class="dollerfloat">Fee: <?=$row['fee']. ' pkr' ?? 'unknown' ?></p>
                                        <div class="paravote">
                                            <p> 
                                                <a href="pages/admission.php" style="  outline: none; padding: 3px; border-radius: 3px;  background-color: white; border: 1px solid teal; color: teal; border-radius: 10px;" >Enroll Now</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php } }?>
                                
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- admission are open -->
    <section>
        <div class="container-fluid">
        <div class="col" style=" margin:10px auto">
                    <h1  style="margin:20px auto;">Get Enrollment</h1>
                </div>
            <div class="row">
                <div class="parent">
                    <div class="col-lg-8 col-md-12">
                        <div class="paramount">
                            <h2 style="color:white;">Admission Are Open:</h2>
                            <p> Madrasa SHAH HAMDAN is a school of Islamic jurisprudence that emphasizes the Muslim Unity. Its very foundations rests on the belief in Allah, Angels, Prophets, 
                                Day of Judgement, Holy Quran and other Holy Islamic Scriptures revealed upon previous Prophets. While, practices include Prayers (five times in a day) Fasting of Ramadan, Zakah and Pilgrimage journey to Kaaba. These Beliefs and Practices has been excerpted from the books: Usool Aitaqadia(deals with Beliefs) and Fiqh ul Ahwat (deals with Islamic Jurisprudence), which were written by Hazrat Shah Syed Muhammad Nurbaksh.
                            </p>
                            <a href="pages/login.php"><button>Apply Now</button></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="video">
                            <video controls>
                                <source src="video/inshot.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <!-- our latest event -->
  <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col" style=" margin:10px auto">
                    <h1  style="margin:20px auto;">Our Latest Events</h1>
                </div>
                <div class="latestevent">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <!-- Swiper -->
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper" style="margin-top:40px;">
                                    <div class="swiper-slide">
                                        <div class="">
                                            <img src="imgs/admision-banner.jpg" alt="" width="300px " height="300px "
                                                style="border-radius: 10px ; border: 8px solid teal;">
                                                <h2 style="text-align: left;text-transform:uppercase">Naat competition</h2>
                                            <p class="date"  style="color:teal; text-align:left;">21/04/2024</p>
                                            <p style="text-align: left;">In month of rabe ul awal we arrange a huge naat competition in which all student of GB are participate.</p>
                                            <a href="index.php">  <button class="btn" style="">Read
                                                More</button></a>

                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="">
                                            <img src="imgs/g5.jfif" alt="" width="300px " height="300px "
                                                style="border-radius: 10px ; border: 8px solid teal;">
                                            <h2 style="text-align: left;text-transform:uppercase">Speech competition</h2>
                                            <p class="date"  style="color:teal; text-align:left;">21/04/2024</p>
                                            <p style="text-align: left;">In month of rabe ul awal we arrange a huge speech competition in which all student of GB are participate.</p>
                                            <a href="index.php">  <button class="btn" style="">Read
                                                More</button></a>

                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="">
                                            <img src="imgs/group-discussion.jpg" alt="" width="300px " height="300px "
                                                style="border-radius: 10px ; border: 8px solid teal;">
                                            <h2 style="text-align: left;">RESULT ANNOUNCEMENT</h2>
                                            <p class="date"  style="color:teal; text-align:left;">21/04/2016</p>
                                            <p style="text-align: left;">Every end of the year means in december we arranged a big exciting ceremony of result announcement.</p>
                                            <a href="index.php"> <button class="btn" style="">Read
                                                More</button></a>

                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="">
                                            <img src="imgs/tablegh.jpg" alt="" width="300px " height="300px "
                                                style="border-radius: 10px ; border: 8px solid teal;">
                                            <h2 style="text-align: left;">EID MILAAD UL NAIBE</h2>
                                            <p class="date"  style="color:teal;    text-align:left;">21/04/2016</p>
                                            <p style="text-align: left;">AT the occasion of Eid-e-Milad we arrange a big ceremony where people comes to listen Speech. </p>
                                            <a href="index.php"><button class="btn" style="">Read
                                                More</button></a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="">
                                            <img src="imgs/admision-banner.jpg" alt="" width="300px " height="300px "
                                                style="border-radius: 10px ; border: 8px solid teal;">
                                                <h2 style="text-align: left;text-transform:uppercase">Naat competition</h2>
                                            <p class="date"  style="color:teal; text-align:left;">21/04/2024</p>
                                            <p style="text-align: left;">In month of rabe ul awal we arrange a huge naat competition in which all student of GB are participate.</p>
                                            <a href="index.php">  <button class="btn" style="">Read
                                                More</button></a>

                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="">
                                            <img src="imgs/g5.jfif" alt="" width="300px " height="300px "
                                                style="border-radius: 10px ; border: 8px solid teal;">
                                            <h2 style="text-align: left;text-transform:uppercase">Speech competition</h2>
                                            <p class="date"  style="color:teal; text-align:left;">21/04/2024</p>
                                            <p style="text-align: left;">In month of rabe ul awal we arrange a huge speech competition in which all student of GB are participate.</p>
                                            <a href="index.php">  <button class="btn" style="">Read
                                                More</button></a>

                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="">
                                            <img src="imgs/group-discussion.jpg" alt="" width="300px " height="300px "
                                                style="border-radius: 10px ; border: 8px solid teal;">
                                            <h2 style="text-align: left;">RESULT ANNOUNCEMENT</h2>
                                            <p class="date"  style="color:teal; text-align:left;">21/04/2016</p>
                                            <p style="text-align: left;">Every end of the year means in december we arranged a big exciting ceremony of result announcement.</p>
                                            <a href="index.php"> <button class="btn" style="">Read
                                                More</button></a>

                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="">
                                            <img src="imgs/tablegh.jpg" alt="" width="300px " height="300px "
                                                style="border-radius: 10px ; border: 8px solid teal;">
                                            <h2 style="text-align: left;">EID MILAAD UL NAIBE</h2>
                                            <p class="date"  style="color:teal;    text-align:left;">21/04/2016</p>
                                            <p style="text-align: left;">AT the occasion of Eid-e-Milad we arrange a big ceremony where people comes to listen Speech. </p>
                                            <a href="index.php"><button class="btn" style="">Read
                                                More</button></a>

                                        </div>
                                    </div>
                            
                            
                                  
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding: 0px;">
                            <div class="latesteventanim latesteventbox2">
                                <div class="latesteventspn1">
                                    <span class="animspan"> </span>
                                    <p>Course Offers</p>
                                    <div class="latesteventspn2">
                                        <span class="animspan"></span>
                                        <p>Campus of Instition</p>
                                    </div>
                                    <div class="latesteventspn3">
                                        <span class="animspan"></span>
                                        <p>Students Applications</p>
                                    </div>
                                    <div class="latesteventspn3">
                                        <span class="animspan"></span>
                                        <p>field of Studies</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include('inlcudes/footer.php') ?>