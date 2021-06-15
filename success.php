<!DOCTYPE html>
<html lang="en" class="full-screen">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>CEO Awards | Complete</title>
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
 <!-- My custom css -->
 <link type="text/css" rel="stylesheet" href="./css/style.css" media="screen,projection" />

</head>

<body class="success-page">
 <!-- Insert script -->
 <?php
  include("config.php");
  session_start();

	if(isset($_POST['btn_insert']))
	{
    $caption=$_POST['caption'];
    $image_path=$_POST['side_hustle_crop'];

    // $images2=$_FILES['side_hustle_crop']['name'];
		// $tmp_dir2=$_FILES['side_hustle_crop']['tmp_name'];
		// $imageSize2=$_FILES['side_hustle_crop']['size'];

		// $upload_dir='upload/';
		// $imgExt2=strtolower(pathinfo($images2,PATHINFO_EXTENSION));
		// $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
		// $sideProfile=rand(1000, 1000000).".".$imgExt2;
		// move_uploaded_file($tmp_dir2, $upload_dir.$sideProfile);
		$stmt=$db_conn->prepare('INSERT INTO morethan_award( side, caption ) VALUES ( :spic, :desc )');
    $stmt->bindParam(':desc', $caption);
		$stmt->bindParam(':spic', $image_path);
		if($stmt->execute())
		{
      ?>
 <script>
 console.log("new record successul");
 window.location.href = ('success.php');
 </script>
 <?php
		}else {
			?>
 <script>
 console.log("Error");
 window.location.href = ('index.php');
 </script>
 <?php
		}

    $_SESSION['user_id'] = $image_path;
	}
?>
 <!-- end Insert script -->
 <header class="clearfix">
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
 <section id="banner">
  <div class="container">
   <div id="downloadable" class="content">
    <!-- <span id="slant-acr"></span> -->
    <img id="default-bg" src="img/the-ceo-awards-filter-new.png" alt="Generated Image Background">
    <?php
      // $last_id = 1;
      $last_id = $_SESSION['user_id'];
      // $last_id = $db_conn->lastInsertId();
      $select_stmt=$db_conn->prepare("SELECT * FROM morethan_award WHERE side=:id LIMIT 1"); //sql select query
      $select_stmt->bindParam(':id', $last_id );
      $select_stmt->execute();
      while($row=$select_stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div id="download-content">
     <!-- <p><?php echo session_id(); ?></p>
        <p><?php echo $_SESSION['user_id']; ?></p> -->
      <div id="merged-img" class="clearfix">
        <div class="caption">
          <p>"<?php echo $row['caption']; ?>"</p>
        </div>
      <div id="side-img" style="width: 100%;"><img src="<?php echo $row['side']; ?>" width="1000px" height="1000px"></div>
      <!-- <div id="side-img" style="width: 100%;"><img src="upload/<?php //echo $row['side']; ?>" width="1000px" height="1000px"></div> -->
     </div>
    </div>
    <?php } ?>
   </div>
  </div>
 </section>
 <section id="congratulation">
  <div class="row">
   <div class="col-12 col-sm-6">
    <h2>Congratulations!</h2>
    <p>
     Watermark generated.
     Share this picture on your social media pages or download to share.
    </p>
    <ul>
     <li>
      <a id="download-img" href="#downloadPreviewImage">
       <i class="fa fa-download fa-3x" aria-hidden="true"></i>
       <p>Download</p>
      </a>
     </li>
    </ul>
    <div id="downloadPreviewImage" style="display: none;">
     <img id="posterCase" src="#" alt="#Morethan" />
    </div>
   </div>
 </section>

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
 <!-- html2canvas Javascript -->
 <script type="text/javascript" src="./js/html2canvas.js"></script>
 <!-- custom Javascript -->
 <script type="text/javascript" src="./js/main.js"></script>
 <!-- custom Javascript To convert Div to Image-->
 <script type="text/javascript">
 $(document).ready(function() {
  var element = $("#downloadable"); // global variable
  var getCanvas; // global variable
  setTimeout(function() {
   html2canvas(element, {
    onrendered: function(canvas) {
     $("#downloadPreviewImage").append(canvas);
     getCanvas = canvas;
    }
   });
  }, 1000);

  $("#download-img").on('click', function() {
   var imgageData = getCanvas.toDataURL("image/png");
   // Now browser starts downloading it instead of just showing it
   var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
   $("#download-img").attr("download", "The CEO Awards.png").attr("href", newData);
  });

  $("#share-img").on('click', function() {
   $('#image_share_icon').slideDown();
   $('html, body').animate({
    scrollTop: $("#image_share_icon").offset().top
   }, 500);
   // var dataURL = getCanvas.toDataURL();
   var dataURL = getCanvas.toDataURL("image/png");
   // Saving the generated to the server
   $.ajax({
    type: "POST",
    url: "https://www.morethan.ng/save_image.php",
    data: {
     img: dataURL
    }
   }).done(function(msg) {
    var thumb = $('#posterCase');

    thumb.load(function() {
     // $('#preview').removeClass('loading');
     thumb.unbind();
    });
    thumb.attr('src', msg);
    //  alert(msg);
    $("#my_facebook").on('click', function() {
     var u = 'https://morethan.ng/' + msg;
     // t=document.title;
     var t = 'I_Am_More';
     window.open('http://www.facebook.com/sharer.php?u=' + encodeURIComponent(u) + '&t=' + encodeURIComponent(
      t), 'sharer', 'toolbar=0,status=0,width=626,height=436');
     return false;
    });
    var tweetImg = 'https://morethan.ng' + msg;
    var tweetUrl = 'https://twitter.com/intent/tweet?text=I%20Am%20More.%20' + tweetImg + '%20@morethan';
    $("#my_twitter a").attr("href", tweetUrl);
   });
  });
 });
 </script>
</body>

</html>
