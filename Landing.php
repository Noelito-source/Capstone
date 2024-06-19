<php>

<!DOCTYPE html>

<html>
    <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>Palangoy Multi-Purpose Cooperative</title>
        <link rel="stylesheet" type="text/css" href="./css/Landing.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
     
    </head>

    <body>
        <div class="loader-bg">
            <div class="circle">
                <div class="wave"></div>
            </div>
        </div>




    <!--Navbar Start-->
        <header>
<h3 id="PWBS">PWBS</h3>
            
               
<a href="login.php">
                <button class="login-btn">
                    
                    <span><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none" href = "login.html"></svg> Log In </span>
                </button></a>
        </header>
    <!--Navbar End-->

    <!--About Us Start-->
    
        <section class="home" id="about-us">
            <div class="home-text">
                <h1>Palangoy Multi-Purpose <br> Cooperative</h1>
                <p>This water billing website is created to make paying bills in Palangoy Multi-Purpose Cooperative easier and more convenient. <br> With a little touch on the screen and you will have an access  to pay your water bills.</p>

                <div class="social">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram' ></i></a>
                    <a href="#"><i class='bx bxl-youtube' ></i></a>
                </div>
            </div>

            <div class="home">
                <img src="./images/Logo.png">
            </div>
        </section>
    <!--About Us End-->

    <!--Wave Start-->
        <div class="custom-shape-divider-bottom-1671505610">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
        </div>
    <!--Wave End-->

   




    <!--What We Do Start-->
    
   
    <!--Footer End-->
   
    <!--Link to Js-->
    <script type="text/javascript" src="./Landing.js"></script>
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
    <style>
body {
  height: 600px; /* Make this site really long */
  width: 1600px; /* Make this site really wide */
  overflow: hidden; /* Hide scrollbars */
}
</style>
    </body></php>