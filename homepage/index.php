
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naukri Khoj</title>
</head>
<body>
    <!--HEADER FOR THE HOMEPAGE-->
    <div class="container">
        <header>
            <img class="logo" src="../Assets/logo.png" alt=""><h1>Naukri Khoj</h1>
            
            <h3>Work search platform for low wage workforce</h3>
            <a href="./homepageHindi.html">Hindi</a>
            
        </header>
    </div>
    <!--NAV BAR-->
    <div class="container">
        <div class='nav-bar'>
            <a href="#about-us">About us</a>
            <a href="#work-seeker">Work Seeker</a>
            <a href="#work-provider">Work Provider</a>
            <a href="#incubation">My Business</a>
            <a href="#contact-us">Contact Us</a>

        </div>
        
    </div>
    <!--ABOUT US SECTION-->
    <section id="about-us" class="container-about-us">
        <h3>About Naukri Khoj</h3>
        <p>The current COVID19 situation has left many people unemployed and looking for jobs and incomes. The pandemic has hit low wage workers
            more drastically. The project aims at providing job opportunities for the
            low wage workforce which forms a strong community in India.
        </p>
        <p>
            Our Objectives- 
            <ul>
                <li>Boost the job opportunities for the low wage workforce with better reach and networking.</li>
                <li>Engender skill development and self reliance of the lower strata of
                    society.</li>
                <li>Act as a business incubator to help launch small businesses by
                    connecting people with philanthropists/investors/charity organizations.</li>
            </ul>

        </p>
        <p>People working in the organised sector- with well paid stable jobs have
            websites like LinkedIn, Shine and Indeed which help them find lucrative
            career opportunities and well paid jobs promoting them to be financially
            independent. There is no such service promoting job opportunities for the
            low wage workforce.
        </p>
        <p>Our website takes this privilege from the well-to-do class and aims to
           provide it to the low wage workers who help India as a country with their
           hard work and efforts.
        </p>

       


        <!--SLIDER FOR IMAGES-->
        <div class="slider-image">
            <div class="slider-wrapper">
                <div class="slider">
                  <input type="radio" name="slider" class="trigger" id="one" checked="checked" />
                  <div class="slide">
                    <figure class="slide-figure">
                      <img class="slide-img" src="../Assets/img6.png" />
                    </figure><!-- .slide-figure -->
                  </div><!-- .slide -->
                  <input type="radio" name="slider" class="trigger" id="two" />
                  <div class="slide">
                    <figure class="slide-figure">
                      <img class="slide-img" src="../Assets/img4.png" />
                    </figure><!-- .slide-figure -->
                  </div><!-- .slide -->
                  <input type="radio" name="slider" class="trigger" id="three" />
                  <div class="slide">
                    <figure class="slide-figure">
                      <img class="slide-img" src="../Assets/img5.png" />
                    </figure><!-- .slide-figure -->
                  </div><!-- .slide -->
                </div><!-- .slider -->
                <ul class="slider-nav">
                  <li class="slider-nav__item"><label class="slider-nav__label" for="one">1</label></li>
                  <li class="slider-nav__item"><label class="slider-nav__label" for="two">2</label></li>
                  <li class="slider-nav__item"><label class="slider-nav__label" for="three">3</label></li>
                </ul><!-- .slider-nav -->
              </div><!-- .slider-wrapper -->
              
        </div>
        <div id="video-sec">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/cxxiXjEzLlw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/AebX789aMNw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>


    </section>
    <!--WORK SEEKER SECTION-->
    <section id="work-seeker" class="container-work-seeker">
        <h3>Are you a work seeker?</h3>
             
        <p>Our target audience is the Low Wage Workforce- applying for jobs
            Construction Companies, Restaurant chains, Factories, Business in
            general, requiring workforce, Domestic help,laundry service,
            watchman etcetera. Haven't registered yet? <a href="../work-seeker/register.html">Register here.</a>
        </p>
        <a href="../jobs/list.php"><button>Click here to view jobs listed</button></a>
        <button>Click here to view jobs listed</button>

        <form action="../work-seeker/profile.html" id="login-work-seeker">
            <label for="phone-no">Phone no:</label>
            <input type="number" name="phone-no" id="phone-no">
            <br></br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <br></br>
            <a href="../forgotPass.html">Forgot password?</a>
            <br></br>
            <input type="submit" name="login" id="login-btn" value="Log In">
            
        </form>


    </section>
    <!--WORK PROVIDER SECTION-->
    <section id="work-provider" class="container-work-provider">
        <h3>Are you a work provider?</h3>
             
        <p>Help the low wage workforce by posting job openings. Enter your name, or the company name to log in.
            Haven't registered yet? <a href="../work-provider/register.html">Register here.</a> 
        </p>


        <?php if(!isset($_SESSION['username'])) { ?>
        <form action="../jobs/checkPassProvider.php" method="POST" id="login-work-provider">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
            <br></br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <br></br>
            <a href="../forgotPass.html">Forgot password?</a>
            <br></br>
            <input type="submit" name="login" id="login-btn" value="Log In" >
        </form>
            <?php  if(isset($_GET["feedback"])){
            echo $_GET["feedback"];
        }}
            ?>


       
        <?php if(isset($_SESSION['username']))
{
    echo "<script>window.location.assign('../work-provider/profile.php')</script>";
  ?>
<?php 
      }
      ?>
        
    </section>
   
    <!--CONTACT US SECTION-->
    <footer id="contact-us">
        Contact: ----------
        <br></br>
        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3766.8915502615405!2d72.8536084149074!3d19.243557651684846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b13affffffff%3A0xfd071f1d3a7844ef!2sSt.%20Francis%20Institute%20of%20Technology!5e0!3m2!1sen!2sin!4v1602675310782!5m2!1sen!2sin" width="200" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
           
        </iframe>
        <br>
        We are located at
    
    </footer>
    <script type = "text/javascript" src="https://gistlangserver.in/content/wsltoolbar/scripts/gotranslateweblocalizer/latest/static/gotwl.min.js"></script>

    <script type = "text/javascript">
    window.onload = function(){
        showSnippetBar();
    }
    </script>
</body>
</html>