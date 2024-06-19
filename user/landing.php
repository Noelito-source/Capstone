

<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Palangoy Multi-Purpose Cooperative</title>
        <link rel="stylesheet" type="text/css" href="lands.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    </head>
<style>

</style>
    <body>
        <div class="loader-bg">
            <div class="circle">
                <div class="wave"></div>
            </div>
        </div>




    <!--Navbar Start-->
        <header>
            <a href="../admin/lgn.php">
<h3 id="PWBS">PWBS</h3></a>
                <div class="bx bx-menu" id="menu-icon"></div>
                    <ul>
                        <li><a href="#about-us" class="active">Home</a></li>
                        
                        <li><a href="#foot1">Contact Us</a></li>
                
                    </ul>
               
<a href="./login.php">
                <button class="login-btn">
                    
                    <span><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none" href = "login.html"></svg> Log In </span>
                </button></a>
        </header>
    <!--Navbar End-->

    <!--About Us Start-->
    
        <section class="home" id="about-us">
            <div class="home-text">
                <h1>Palangoy Multi-Purpose Cooperative</h1>
                <p>This water billing website is created to make paying bills in Palangoy Multi-Purpose Cooperative easier and more convenient. <br> With a little touch on the screen and you will have an access  to pay your water bills.</p>

                <div class="social">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram' ></i></a>
                    <a href="#"><i class='bx bxl-youtube' ></i></a>
                </div>
            </div>

            <div class="home">
                <img src="../images/Logo.png">
            </div>
        </section>
    <!--About Us End-->

    <!--Wave Start-->
        
    <!--Wave End-->

   



    <!--Contact End-->

   
    <!--MGMT STAFF End-->
    <!--What We Do Start-->
    <section class="what">
        <h1>WHAT WE DO</h1>
        <P>Our cooperative was founded in 2008. PMPC Water Brand bottle is great for drinking, <br> cooking, activities, and even for children. </P>

        <div class="container-what">
            <div class="card-what">
                <div class="icon-what">
                    <img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/000000/external-laboratory-world-cancer-awareness-flatart-icons-outline-flatarticons.png"/>
                </div>
                <div class="content-what">
                    <div class="detail">
                        <h2>Quality Check</h2>
                        <p>Tsaka ko na to lalagyan</p>
                    </div>
                </div>
            </div>

            <div class="card-what">
                <div class="icon-what">
                    <img src="https://img.icons8.com/wired/64/1A1A1A/biosand-filter.png"/>
                </div>
                <div class="content-what">
                    <div class="detail">
                        <h2>Filtration Level</h2>
                        <p>Tsaka ko na to lalagyan</p>
                    </div>
                </div>
            </div>

           

            <div class="card-what">
                <div class="icon-what">
                    <img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/1A1A1A/external-awareness-world-cancer-awareness-flatart-icons-outline-flatarticons.png"/>
                </div>
                <div class="content-what">
                    <div class="detail">
                        <h2>Water Awareness</h2>
                        <p>Tsaka ko na to lalagyan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--What We Do End-->


   
    <!--Footer End-->
    <section class="footer" id="foot1">
        <h1>Thank you for using PMPC</h1>
        <p>You may follow us on our social media</p>

        <div class="wrapper">
            <a href="#">
                <li class="icon facebook">
                    <span class="tooltip">Facebook</span>
                    <span><i class='bx bxl-facebook'></i></span>
                </li>
            </a>

            <a href="#">
                <li class="icon twitter">
                    <span class="tooltip">Twitter</span>
                    <span><i class='bx bxl-twitter'></i></span>
                </li>
            </a>
            
            <a href="#">
                <li class="icon instagram">
                    <span class="tooltip">Instagram</span>
                    <span><i class='bx bxl-instagram-alt'></i></span>
                </li>
            </a>

            <a href="#">
                <li class="icon gmail">
                    <span class="tooltip">Gmail</span>
                    <span><i class='bx bxl-gmail' ></i></span>
                </li>
            </a>
        </div>
    </section>
    <!--Link to Js-->
    <script type="text/javascript" src="home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        var swiper = new Swiper(".gallery", {
          zoom: true,
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          autoplay: {
              delay: 2500,
              disableOnInteraction: false
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });
    </script>

    <script>
        var swiper = new Swiper(".quote_slider", {
        zoom: true,
        navigation: {
            nextEl: ".swiper-button-next2",
            prevEl: ".swiper-button-prev2",
        },
        });
    </script>

    <script>
        var swiper = new Swiper(".staff_slider", {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination3",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next3",
            prevEl: ".swiper-button-prev3",
        },
        });
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        setTimeout(function(){
            $('.loader-bg').fadeToggle();
        }, 1500);
    </script>
    </body>