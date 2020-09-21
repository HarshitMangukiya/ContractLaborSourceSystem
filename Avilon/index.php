<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Avilon Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/app_logo.png" rel="icon">
  <link href="img/app_logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Avilon
    Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
 <style type="text/css">
   .her2{
        text-align: center;
    border-radius: 3px;
    background-color: white;
    box-shadow: 0px 0px 50px 0px rgba(132, 144, 255, 0.7);
    padding: 5px 5px;
    border: 5px solid transparent;

   }
 </style>
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="" class="scrollto"><img src="img/app_logo.png" width="55px" height="55px"> VAY-D</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#features">How to Play</a></li>
          <li><a href="#advanced-features">Features</a></li>
          <li><a href="#terms">Terms & Condition</a></li>
          <li><a href="#privacy">Privacy Policy</a></li>
          <li><a href="#faq">FAQ</a></li>
   <!--        <li class="menu-has-children"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="menu-has-children"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li> -->
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-text">
      <h2>Welcome to VAY-D</h2>
      <p>We are team of talanted designers making websites with Bootstrap</p>
      <p style="margin-bottom:10px;">For Android</p>
      <a href="index.php?file=app_logo.png" class="har">Download Now</a>
      <?php
      if(!empty($_GET['file']))
      {
        $filename=basename($_GET['file']);
        $filepath='img/'.$filename;
        if(!empty($filename)&&file_exists($filepath))
        {
          // header("Cache-Control:public");
          // header("Content-Description:File Transfer");
          // header("Content-Disposition:attachment; filename=$filename");
          // header("content-Transfer-Emcoding:binary");
          // // header("location:index.php");
          // readfile($filepath);

                 header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
          // exit;

        }
        else
        {
          echo "This File does not exits.";
        }
      }
      ?>    
      <p style="margin-bottom:10px;">For IOS</p>
      <a href="#" class="har">Download Now</a>
    </div>


 <!--    <div class="product-screens">

      <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
        <img src="img/product-screen-1.png" alt="">
      </div>

      <div class="product-screen-2 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.6s">
        <img src="img/product-screen-2.png" alt="">
      </div>

      <div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">
        <img src="img/product-screen-3.png" alt="">
      </div>

    </div> -->

  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about" class="section-bg">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">About Us</h3>
          <span class="section-divider"></span>
          <!-- <p class="section-description">
            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque<br>
            sunt in culpa qui officia deserunt mollit anim id est laborum
          </p> -->
        </div>

        <div class="row">
<!--            <div class="col-lg-2 about-img wow fadeInLeft">
            <img src="img/about-img.jpg" alt="">

           <img src="img/app_logo.png" width="100px" height="100px">

          </div> -->
          <div class="col-lg-3 content wow fadeIncenter">
          </div>

          <div class="col-lg-6 content wow fadeIncenter" style="margin-bottom:10px;">
            <!-- <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elite storium paralate</h2>
            <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3> -->
           <!-- <img src="img/app_logo.png" width="100px" height="100px"> -->
            <p>
              we are coming with an amazing application named as "VAY-D" in which you can play the quiz and yes of course you will get rewards by playing this quiz.upcoming cricket match or anything about politics or anything about current affairs you can easily make predictions and yes you can win a cash. </p>
<!-- 
            <ul>
              <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>

            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Libero justo laoreet sit amet cursus sit amet dictum sit. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec
            </p> -->
          </div>
           <div class="col-lg-3 content wow fadeIncenter">
          </div>

        </div>

      </div>
    </section><!-- #about -->

<section  class="section-bg">
        <div class="container">
       <!--    <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
              <div class="title text-center">
                <h1 class="mb-10">Featured Labor Categories</h1>
                <p>Who are in extremely love with eco friendly system.</p>
              </div>
            </div>
          </div>  -->           
          <div class="row">
            <div class="col-lg-2">
              <div class="her2" style="padding:18px;">
               <img src="img/icon/contest.png" alt="" width="60px" height="60px" style="margin-bottom:5px;">   
                <p>Daily Quiz</p>
              </div>
            </div>
                        <div class="col-lg-2">
              <div class="her2">
               <img src="img/icon/earn-money.png" alt="" width="60px" height="60px" style="margin-bottom:5px;">   
                <p>Easy to Money Withdraw</p>
              </div>
            </div>
                        <div class="col-lg-2">
              <div class="her2">
               <img src="img/icon/multiple.png" alt="" width="60px" height="60px" style="margin-bottom:5px;">   
                <p>Multiple Question Category</p>
              </div>
            </div>
                        <div class="col-lg-2">
              <div class="her2">
               <img src="img/icon/helpline.png" alt="" width="60px" height="60px" style="margin-bottom:5px;">   
                <p>24/7 Customer Support</p>
              </div>
            </div>
                        <div class="col-lg-2">
              <div class="her2" style="padding:9px;">
               <img src="img/icon/contest.png" alt="" width="60px" height="60px">   
                <p>Earn Money Point</p>
              </div>
            </div>
                        <div class="col-lg-2">
              <div class="her2" style="padding:20px;">
               <img src="img/icon/contest.png" alt="" width="60px" height="60px">   
                <p>User Friendly</p>
              </div>
            </div>
            <!-- <div class="col-lg-2">
              <div class="single-fcat">
                <a href="category.php?caid=<?php echo "4"; ?>">
                  <img src="img/construction-building.png" alt="">
                </a>
                <p>Color Work</p>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="single-fcat">
                <a href="category.php?caid=<?php echo "8"; ?>">
                  <img src="img/labor-work.png" alt="">
                </a>
                <p>Labor Work</p>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="single-fcat">
                <a href="category.php?caid=<?php echo "11"; ?>">
                  <img src="img/industrial-worker.png" alt="">
                </a>
                <p>General work</p>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="single-fcat">
                <a href="category.php?caid=<?php echo "9"; ?>">
                  <img src="img/manual-handling-64.png" alt="">
                </a>
                <p>Manual Labor Work</p>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="single-fcat">
                <a href="category.php?caid=<?php echo "10"; ?>">
                  <img src="img/construction-64.png" alt="">
                </a>
                <p>Construction</p>
              </div>      
            </div>                                     -->                  
          </div>
        </div>  
      </section>
  <!-- <section id="more-features" class="section-bg">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">More Features</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="ion-ios-stopwatch-outline"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
              <h4 class="title"><a href="">Dolor Sitema</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata nodera clas.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="ion-ios-heart-outline"></i></div>
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade.</p>
            </div>
          </div>

        <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
            </div>
          </div>

        </div>
      </div>
    </section> --><!-- #more-features -->


    <!--==========================
      Product Featuress Section
    ============================-->
    <section id="features">
      <div class="container" style="margin-bottom:20px;">

        <div class="row" style="margin-bottom:100px;">

          <div class="col-lg-12">
            <div class="section-header wow fadeIn" data-wow-duration="1s">
              <h3 class="section-title" align="text-center">How to Play</h3>
              <span class="section-divider"></span>
            </div>
          </div>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-5 features-img">
            <img src="img/step1.jpeg" alt="" class="wow fadeInLeft" style="height:350px;">
          </div>  

          <!-- <div class="col-lg-8 col-md-7 "> -->

              <div class="col-lg-8 col-md-7">
                <div class="icon" style="font-size:30px;"><!-- <i class="ion-ios-speedometer-outline"></i> -->Step-1</div>
                <h4 class="title"><a href="#">Login or Registar</a></h4>
                <p class="description">User can log in and registration with nominal information like contact number, name and birthdate.</p>
              </div>

              <div class="col-lg-8 col-md-7"  style="margin-top:40px;text-align:right;">
                <div class="icon" style="font-size:30px;"><!-- <i class="ion-ios-speedometer-outline"></i> -->Step-2</div>
                <h4 class="title"><a href="#">Select Your Category</a></h4>
                <p class="description">User can choose various types of category according to their interest.</p>
              </div>

          <div class="col-lg-4 col-md-5 features-img">
            <img src="img/step2.jpeg" alt="" class="wow fadeInLeft" style="height:350px;">
          </div>  

         <div class="col-lg-4 col-md-5 features-img">
            <img src="img/step3.jpeg" alt="" class="wow fadeInLeft" style="height:350px;">
          </div>  

          <!-- <div class="col-lg-8 col-md-7 "> -->

              <div class="col-lg-8 col-md-7">
                <div class="icon" style="font-size:30px;"><!-- <i class="ion-ios-speedometer-outline"></i> -->Step-3</div>
                <h4 class="title"><a href="#">Select Your Question</a></h4>
                <p class="description">User can choose the question according to joining amount and winning amount.</p>
              </div>


              <div class="col-lg-8 col-md-7"  style="margin-top:40px;text-align:right;">
                <div class="icon" style="font-size:30px;"><!-- <i class="ion-ios-speedometer-outline"></i> -->Step-4</div>
                <h4 class="title"><a href="#">Select Your Answer</a></h4>
                <p class="description">User can give an answer according to their prediction and strategy. And they will get winning money.</p>
              </div>

          <div class="col-lg-4 col-md-5 features-img">
            <img src="img/step4.jpeg" alt="" class="wow fadeInLeft" style="height:350px;">
          </div>  

           <div class="col-lg-4 col-md-5 features-img">
            <img src="img/step5.jpeg" alt="" class="wow fadeInLeft" style="height:350px;">
          </div>  

          <!-- <div class="col-lg-8 col-md-7 "> -->

              <div class="col-lg-8 col-md-7">
                <div class="icon" style="font-size:30px;"><!-- <i class="ion-ios-speedometer-outline"></i> -->Step-5</div>
                <h4 class="title"><a href="#">Confirm and Payment</a></h4>
                <p class="description">Do payment and join question, you can join many times.</p>
              </div>


            <!--   <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.1s">
                <div class="icon"><i class="ion-ios-flask-outline"></i></div>
                <h4 class="title"><a href="">Dolor Sitema</a></h4>
                <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata noble dynala mark.</p>
              </div>
              <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.2s">
                <div class="icon"><i class="ion-social-buffer-outline"></i></div>
                <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur teleca starter sinode park ledo.</p>
              </div>
              <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.3s">
                <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
                <h4 class="title"><a href="">Magni Dolores</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum dinoun trade capsule.</p>
              </div> -->
            

          <!-- </div> -->

        </div>

      </div>

    </section><!-- #features -->

    <!--==========================
      Product Advanced Featuress Section
    ============================-->
    <section id="advanced-features">

      <div class="features-row section-bg">
        <div class="container">



        <div class="row" style="margin-bottom:50px;">

          <div class="col-lg-12">
            <div class="section-header wow fadeIn" data-wow-duration="1s">
              <h3 class="section-title" style="font-size:30px;color:black;font-style:initial;">AMAZING FEATURES OF OUR APP</h3>
              <span class="section-divider"></span>
            </div>
          </div>
        </div>

          <div class="row">
 
            <div class="col-12">
              <img class="advanced-feature-img-right wow fadeInRight" src="img/referral.jpeg" alt="" style="height:555px;">
              <div class="wow fadeInLeft">
                <h2><img src="img/checkbox.png" width="40px" height="40px"> Join the VAY-D community by simply downloading our Application from Apple App Store or download from our website.</h2>

                <h2><img src="img/checkbox.png" width="40px" height="40px"> You can transfer your wallet VAY-D coin to your friends.</h2>
                <h2><img src="img/checkbox.png" width="40px" height="40px"> Invite your friends & get Rs.5 cash bonus per friend.</h2>
                <h2><img src="img/checkbox.png" width="40px" height="40px"> Your referral bonus and joining bonus directly usable.</h2>                
                <h2><img src="img/checkbox.png" width="40px" height="40px"> Join unlimited quiz.</h2>
                <h2><img src="img/checkbox.png" width="40px" height="40px"> Play more, level up & get amazing rewards.</h2>
                <h2><img src="img/checkbox.png" width="40px" height="40px"> All major credit, debit cards & net banking from leading banks acceptable.</h2>

                <!-- <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>



    <!--   <div class="features-row">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-left" src="img/advanced-feature-2.jpg" alt="">
              <div class="wow fadeInRight">
                <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                <i class="ion-ios-paper-outline" class="wow fadeInRight" data-wow-duration="0.5s"></i>
                <p class="wow fadeInRight" data-wow-duration="0.5s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <i class="ion-ios-color-filter-outline wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s"></i>
                <p class="wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                <i class="ion-ios-barcode-outline wow fadeInRight" data-wow-delay="0.4" data-wow-duration="0.5s"></i>
                <p class="wow fadeInRight" data-wow-delay="0.4s" data-wow-duration="0.5s">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
              </div>
            </div>
          </div>
        </div>
      </div> -->

      <!-- <div class="features-row section-bg">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-right wow fadeInRight" src="img/advanced-feature-3.jpg" alt="">
              <div class="wow fadeInLeft">
                <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                <i class="ion-ios-albums-outline"></i>
                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </section><!-- #advanced-features -->


      <section id="terms">

      <div class="features-row section-bg" >
        <div class="container">



        <div class="row" style="margin-bottom:50px;">

          <div class="col-lg-12">
            <div class="section-header wow fadeIn" data-wow-duration="1s">
              <h3 class="section-title">Terms & Condition</h3>
              <span class="section-divider"></span>
            </div>
          </div>
        </div>

          <div class="row">
 
            <div class="col-12">
              <!-- <img class="advanced-feature-img-right wow fadeInRight" src="img/referral.jpeg" alt="" style="height:555px;"> -->
              <div class="wow fadeInLeft">
                <p>By downloading or using the app, these terms will automatically apply to you – you should make sure therefore that you read them carefully before using the app. You’re not allowed to copy, or modify the app, any part of the app, or our trademarks in any way. You’re not allowed to attempt to extract the source code of the app, and you also shouldn’t try to translate the app into other languages, or make derivative versions. The app itself, and all the trade marks, copyright, database rights and other intellectual property rights related to it, still belong to VayD team.</p>
                <p>Along the same lines, VayD team cannot always take responsibility for the way you use the app i.e. You need to make sure that your device stays charged – if it runs out of battery and you can’t turn it on to avail the Service, VayD team cannot accept responsibility.</p>
                <p>With respect to VayD team’s responsibility for your use of the app, when you’re using the app, it’s important to bear in mind that although we endeavour to ensure that it is updated and correct at all times, we do rely on third parties to provide information to us so that we can make it available to you. VayD team accepts no liability for any loss, direct or indirect, you experience as a result of relying wholly on this functionality of the app.</p>
                <p>A person of sound mind, who is above 18 years of age may use this Platform.

               The Platform may not be used by residents of Assam, Odisha, Nagaland, Sikkim and Telangana. In addition to this, certain games may be restricted in some additional states. Contact our Vay-D team for more information on who may use the platform.
</p>
              <h4>Contact Us</h4>
              <p>If you have any questions or suggestions about my Terms and Conditions, do not hesitate to contact me at contact_us@vayd.net.</p>

                <!-- <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>



   
    </section><!-- #advanced-features -->
    

   <section id="privacy">

      <div class="features-row section-bg" style="margin-bottom:10px;">
        <div class="container">

        <div class="row" style="margin-bottom:50px;">

          <div class="col-lg-12">
            <div class="section-header wow fadeIn" data-wow-duration="1s">
              <h3 class="section-title">Privacy Policy</h3>
              <span class="section-divider"></span>
            </div>
          </div>
        </div>

          <div class="row">
 
            <div class="col-12">
              <!-- <img class="advanced-feature-img-right wow fadeInRight" src="img/referral.jpeg" alt="" style="height:555px;"> -->
              <div class="wow fadeInLeft">
                <p>
VayD team built the Vay-D app as a Free app. This SERVICE is provided by VayD team at no cost and is intended for use as is.

This page is used to inform visitors regarding my policies with the collection, use, and disclosure of Personal Information if anyone decided to use my Service.

If you choose to use my Service, then you agree to the collection and use of information in relation to this policy. The Personal Information that I collect is used for providing and improving the Service. I will not use or share your information with anyone except as described in this Privacy Policy.

The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible at Vay-D unless otherwise defined in this Privacy Policy.</p>
                <h4>Information Collection and Use</h4>

                <p>
For a better experience, while using our Service, I may require you to provide us with certain personally identifiable information, including but not limited to Profile pic, Mobile number, Birth date etc. The information that I request will be retained on your device and is not collected by me in any way.

The app does use third party services that may collect information used to identify you.

Link to privacy policy of third party service providers used by the app

Google Analytics for Firebase</p>
                <h4>Log Data</h4>

                <p>I want to inform you that whenever you use my Service, in a case of an error in the app I collect data and information (through third party products) on your phone called Log Data. This Log Data may include information such as your device Internet Protocol (“IP”) address, device name, operating system version, the configuration of the app when utilizing my Service, the time and date of your use of the Service, and other statistics.</p>
                <p>I may update our Privacy Policy from time to time. Thus, you are advised to review this page periodically for any changes. I will notify you of any changes by posting the new Privacy Policy on this page.

This policy is effective as of 2020-09-13</p>
     

                <!-- <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>



   
    </section><!-- #advanced-features -->

    <!--==========================
      Call To Action Section
    ============================-->
   <!--  <section id="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Call To Action</h3>
            <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section> --><!-- #call-to-action -->

    <!--==========================
      More Features Section
    ============================-->
   <!--  <section id="more-features" class="section-bg">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">More Features</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="ion-ios-stopwatch-outline"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
              <h4 class="title"><a href="">Dolor Sitema</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata nodera clas.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="ion-ios-heart-outline"></i></div>
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
            </div>
          </div>

        </div>
      </div>
    </section> --><!-- #more-features -->

    <!--==========================
      Clients
    ============================-->
   <!--  <section id="clients">
      <div class="container">

        <div class="row wow fadeInUp">

          <div class="col-md-2">
            <img src="img/clients/client-1.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-2.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-3.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-4.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-5.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-6.png" alt="">
          </div>

        </div>
      </div>
    </section> --><!-- #more-features -->

    <!--==========================
      Pricing Section
    ============================-->
    <!-- <section id="pricing" class="section-bg">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">Pricing</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box wow fadeInLeft">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> month</span></h4>
              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Quam adipiscing vitae proin</li>
                <li><i class="ion-android-checkmark-circle"></i> Nec feugiat nisl pretium</li>
                <li><i class="ion-android-checkmark-circle"></i> Nulla at volutpat diam uteera</li>
                <li><i class="ion-android-checkmark-circle"></i> Pharetra massa massa ultricies</li>
                <li><i class="ion-android-checkmark-circle"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <a href="#" class="get-started-btn">Get Started</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="box featured wow fadeInUp">
              <h3>Business</h3>
              <h4><sup>$</sup>29<span> month</span></h4>
              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Quam adipiscing vitae proin</li>
                <li><i class="ion-android-checkmark-circle"></i> Nec feugiat nisl pretium</li>
                <li><i class="ion-android-checkmark-circle"></i> Nulla at volutpat diam uteera</li>
                <li><i class="ion-android-checkmark-circle"></i> Pharetra massa massa ultricies</li>
                <li><i class="ion-android-checkmark-circle"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <a href="#" class="get-started-btn">Get Started</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="box wow fadeInRight">
              <h3>Developer</h3>
              <h4><sup>$</sup>49<span> month</span></h4>
              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Quam adipiscing vitae proin</li>
                <li><i class="ion-android-checkmark-circle"></i> Nec feugiat nisl pretium</li>
                <li><i class="ion-android-checkmark-circle"></i> Nulla at volutpat diam uteera</li>
                <li><i class="ion-android-checkmark-circle"></i> Pharetra massa massa ultricies</li>
                <li><i class="ion-android-checkmark-circle"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <a href="#" class="get-started-btn">Get Started</a>
            </div>
          </div>

        </div>
      </div>
    </section> --><!-- #pricing -->


    <!--==========================
      Frequently Asked Questions Section
    ============================-->
    <section id="faq">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">Frequently Asked Questions</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <ul id="faq-list" class="wow fadeInUp">
          <li>
            <a data-toggle="collapse" class="collapsed" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="ion-android-remove"></i></a>
            <div id="faq1" class="collapse" data-parent="#faq-list">
              <p>
                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="ion-android-remove"></i></a>
            <div id="faq2" class="collapse" data-parent="#faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="ion-android-remove"></i></a>
            <div id="faq3" class="collapse" data-parent="#faq-list">
              <p>
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="ion-android-remove"></i></a>
            <div id="faq4" class="collapse" data-parent="#faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="ion-android-remove"></i></a>
            <div id="faq5" class="collapse" data-parent="#faq-list">
              <p>
                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="ion-android-remove"></i></a>
            <div id="faq6" class="collapse" data-parent="#faq-list">
              <p>
                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- #faq -->

    <!--==========================
      Our Team Section
    ============================-->
  <!--   <section id="team" class="section-bg">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">Our Team</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        <div class="row wow fadeInUp">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-1.jpg" alt=""></div>
              <h4>Walter White</h4>
              <span>Chief Executive Officer</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-2.jpg" alt=""></div>
              <h4>Sarah Jhinson</h4>
              <span>Product Manager</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-3.jpg" alt=""></div>
              <h4>William Anderson</h4>
              <span>CTO</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-4.jpg" alt=""></div>
              <h4>Amanda Jepson</h4>
              <span>Accountant</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section> --><!-- #team -->

    <!--==========================
      Gallery Section
    ============================-->
    <!-- <section id="gallery">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">Gallery</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-1.jpg" class="gallery-popup">
                <img src="img/gallery/gallery-1.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-2.jpg" class="gallery-popup">
                <img src="img/gallery/gallery-2.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-3.jpg" class="gallery-popup">
                <img src="img/gallery/gallery-3.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-4.jpg" class="gallery-popup">
                <img src="img/gallery/gallery-4.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-5.jpg" class="gallery-popup">
                <img src="img/gallery/gallery-5.jpg" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-6.jpg" class="gallery-popup">
                <img src="img/gallery/gallery-6.jpg" alt="">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section> --><!-- #gallery -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container">
        <div class="row wow fadeInUp">

          <div class="col-lg-4 col-md-4">
            <div class="contact-about">
              <h3><img src="img/app_logo.png" width="50px" height="50px"> VAY-D Quiz</h3>
              <!-- <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p> -->
              <!-- <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
              </div> -->
               <div>
                <i class="ion-ios-email-outline" style="font-size:50px;"></i>
                <p>Contact_us@vayd.net</p>
              </div>

            </div>
          </div>
<!-- 
          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="ion-ios-location-outline"></i>
                <p>A108 Adam Street<br>New York, NY 535022</p>
              </div>

              <div>
                <i class="ion-ios-email-outline"></i>
                <p>info@example.com</p>
              </div>

              <div>
                <i class="ion-ios-telephone-outline"></i>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>
          </div> -->

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <h2>Contact Us</h2>
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>2020 VAY-D Team</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Avilon
            -->
            <!-- Designed by <a href="https://bootstrapmade.com/">H.M Teachnology</a> -->
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#privacy">Privacy Policy</a>
            <a href="#terms">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
