<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Sistema de Avaliação</title>

   <!-- Bootstrap Core CSS -->
   <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

   <!-- Custom CSS -->
   <link href="agency/css/agency.css" rel="stylesheet">
   <link href="css/styles.css" rel="stylesheet">

   <!-- Custom Fonts -->
   <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
   <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
   <![endif]-->

</head>

<body id="page-top" class="index">

   @include('home.home_nav')

   @include('home.home_header')

   @include('home.home_about')

   @include('home.home_why')

   @include('home.home_how')

   @include('home.home_contact')

   <footer>
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <span class="copyright">Oto Braz Assunção &copy; SystemName 2016</span>
            </div>
            <div class="col-md-4">
               <ul class="list-inline social-buttons">
                  <li><a href="#"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li><a href="#"><i class="fa fa-facebook"></i></a>
                  </li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </footer>

   @include('home.home_modals')

   <!-- jQuery -->
   <script src="jquery/jquery.js"></script>

   <!-- Bootstrap Core JavaScript -->
   <script src="bootstrap/js/bootstrap.min.js"></script>

   <!-- Plugin JavaScript -->
   <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
   <script src="js/classie.js"></script>
   <script src="js/cbpAnimatedHeader.js"></script>

   <!-- Contact Form JavaScript -->
   <script src="agency/js/jqBootstrapValidation.js"></script>
   <script src="agency/js/contact_me.js"></script>

   <!-- Custom Theme JavaScript -->
   <script src="agency/js/agency.js"></script>

</body>

</html>
