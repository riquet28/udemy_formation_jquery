<?php

  if(!empty($_FILES)){
    $file = $_FILES['file'];
    $filename = $file['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $allowed = array('jpg', 'jpeg', 'png', 'mp4');
    if(!in_array($ext, $allowed)){
      $response = array('error'=>'Fichier non autorisé');
      echo json_encode($response);exit;
    }

    $uploadfile = 'files/'.uniqid().'.'.$ext;
    if(move_uploaded_file($file['tmp_name'], $uploadfile)){
      $response = array('message' => 'Fichier enregistré');
      echo json_encode($response);exit;
    }
  }

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>jQuery formation</title>

    <link href="css/bootstrap.css" rel="stylesheet">

    <style type="text/css">
      body{
        padding-top: 100px;
      }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <!-- Debut Navigation
    ======================================-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Upload en ajax</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <!-- <ul class="nav navbar-nav">

          </ul> -->
        </div>
      </div><!--/.container-->
    </nav><!--/nav-->
    <!-- Fin Navigation
    ======================================-->

    <div class="container">

      <div id="upload">
        <form action="index.php" method="post" enctype="multipart/form-data">
          <input type="file" name="file" id="file">
          <br>
          <br>
          <input type="submit" class="btn btn-primary" value="Upload">
        </form>
        <br>
        <br>
        <div class="progress" id="progress" style="display:none;">
          <div class="progress-bar" id="progressbar" role="progressbar">

          </div>
        </div>
      </div>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

  </body>
</html>
