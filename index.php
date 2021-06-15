<!DOCTYPE html>
<html lang="en" class="full-screen">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>CEO Awards</title>
 <!--Favicon-->
 <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
 <!-- Lato GoogleFont-->
 <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
 <!-- Font Awesome-->
 <link href="font/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
 <!-- Bootstrap core css-->
 <link type="text/css" rel="stylesheet" href="./css/bootstrap.min.css" media="screen,projection" />
 <!-- Material Design Bootstrap -->
 <link type="text/css" rel="stylesheet" href="./css/mdb.min.css" media="screen,projection" />
 <link type="text/css" rel="stylesheet" href="./css/mdb.lite.min.css" media="screen,projection" />
 <!-- Cropper css-->
 <link href="./css/cropper.css" rel="stylesheet" type="text/css">
 <!-- My custom css -->
 <link type="text/css" rel="stylesheet" href="./css/style.css" media="screen,projection" />

</head>

<body class="home">
 <section id="home">
  <header class="clearfix fixed">
   <div class=" container">
    <!-- logos -->
    <div id="logos" class="pull-right">
     <div class="navbar-brand">
      <a href="index.php">
       <img src="img/new-accesslogo.png" alt="New Access Logo" />
      </a>
     </div>
     <!-- <div class="navbar-brand"><img src="img/diamondlogo.png" alt="Diamond Logo" /></div> -->
    </div>
   </div>
  </header>
  <section id="banner" style="background: url('img/page-bg.png') no-repeat right 56px fixed; background-color: #000;">
   <div class="container">
    <div class="content-header d-flex align-items-start">
     <img src="./img/page-header.png" alt="Page Header">
    </div>
    <div class="d-md-flex align-items-center justify-content-end text-right mt-5">
     <h2  class="mr-4" style="font-size: 2rem; font-weight: bold; color: #fff; margin-bottom: 0px;">Watermarking Portal</h2>
     <a href="#start" id="start-scroll" class="btn btn-start">Begin Here</a>
    </div>
   </div>
  </section>
 </section>
 <section id="start">
  <div class="row">
   <div class="col-12 col-sm-12">
    <!-- Offset -->
    <div id="form-step-wrap">
     <form id="morethan" action="success.php" method="post" enctype="multipart/form-data">
      <fieldset>
       <!-- Side gig -->
       <div id="step-side-hustle" class="slider-step step image_area" data-back-to="step-main-hustle">
        <div class="row">
         <div class="col-12 col-sm-6 ">
          <div class="file-upload-wrapper">
           <h3>Upload image</h3>
           <div id="image-upload-case" class="image-upload" style="position: relative;">
            <div id="side-hustle-prev-case" style="top: 0px;">
             <img id="side-hustle-prev" name="side_hustle"src="#" alt="Your Side Gig Image" />
             <button id="btn-file-reset" class="btn btn-start" type="button" style="position: absolute; top: 0; z-index: 999999; padding: 5px 10px; margin-top: 0; font-weight: bolder;">X</button>
             <!-- <button id="crop_wish" class="btn btn-crop" type="button" style="position: absolute; bottom: 0; z-index: 999999; padding: 5px 10px; margin-top: 0; font-weight: bolder;"><i class="fa fa-crop" aria-hidden="true"></i></button> -->
            </div>
            <label id="watermark_drag" for="input-file-side-hustle">
             <div>
              <img src="./img/icon-upload.png" alt="Upload Icon">
              <p>Drop your image here or <span>browse</span></p>
             </div>
            </label>
            <input type="file" name="side_hustle" id="input-file-side-hustle" class="file-upload" tabindex="6" style="position: absolute; top: 0; left: -100%; opacity: 0; width: 1000%; height: 100%; display: block;">
           </div>
           <input type="text" name="caption" placeholder="Enter your watermark caption here" tabindex="7" class="form-control" required>
           <input type="text" name="side_hustle_crop" id="input-file-side-hustle-crop" tabindex="7" style="display: none;">
           <p id="error3"></p>
          </div>
         </div>
        </div>
        <div class="row call-to-action">
         <div class="col-xs-12">
          <input id="create-image" name="btn_insert" type='submit' value='Complete' tabindex="6" class="btn btn-orange" />
         </div>
        </div>
       </div>
      </fieldset>

      <div class="clear"></div>
     </form>
     <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Crop Image Before Upload</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="img-container">
                <div class="row">
                  <div class="col-md-8">
                    <img src="" id="sample_image" />
                  </div>
                  <div class="col-md-4">
                    <div class="preview"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="crop" class="btn btn-primary">Crop</button>
              <button type="button" id="modal-btn-file-reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
			</div>
    </div>
    <!-- Offset -->
   </div>
  </div>
 </section>
 <footer>
  <div class="container">
    <p>Copyright 2021 Access Bank PLC. All rights reserved.</p>
  </div>
  </div>
 </footer>

 <!--jQuery first-->
 <script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="./js/jquery-2.1.1.min.js"></script>
 <!-- jQuery Ui -->
 <script type="text/javascript" src="./js/jquery-ui.min.js"></script>
 <!-- jQuery migrate -->
 <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
 <!-- Bootstrap tooltips -->
 <script type="text/javascript" src="./js/popper.min.js"></script>
 <!-- Bootstrap core JavaScript -->
 <script type="text/javascript" src="./js/bootstrap.min.js"></script>
 <!-- Cropper Javascript -->
 <script type="text/javascript" src="./js/cropper.js"></script>
 <!-- html2canvas Javascript -->
 <script type="text/javascript" src="./js/html2canvas.js"></script>
 <!-- custom Javascript -->
 <script type="text/javascript" src="./js/main.js"></script>
 <script type="text/javascript">
 $(document).ready(function() {
  $(' #btn-file-reset, #modal-btn-file-reset ').on('click', function() {
   $('#input-file-side-hustle').val('');
   $('#input-file-side-hustle-crop').val('');
   $("#side-hustle-prev").attr("src", " ");
   $("#side-hustle-prev-case").hide();
   $("#morethan #step-side-hustle label").removeClass("hide-me");
  });
 });
 </script>
</body>

</html>
