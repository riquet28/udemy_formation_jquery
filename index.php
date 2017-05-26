<?php

function isAjax()
{
  return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

$bdd = new PDO('mysql:host=localhost;dbname=udemy_ajax', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$bdd->exec('SET NAMES utf8');

if(!empty($_POST))
{
  extract($_POST);
  $pseudo = strip_tags($pseudo);
  $email = strip_tags($email);
  $message = strip_tags($message);

  $errors = array();
  if(empty($pseudo)){
    array_push($errors, 'Indiquez votre pseudo');
  }
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    array_push($errors, 'Indiquez un email valide');
  }
  if(empty($message)){
    array_push($errors, 'Indiquez votre message');
  }

  if(count($errors) == 0)
  {
    $req = $bdd->prepare('INSERT INTO comments (pseudo, email, message) VALUES (:pseudo, :email, :message)');
    $req->execute(array(':pseudo'=>$pseudo, ':email'=>$email, ':message'=>$message));
    $req->closeCursor();

    $success = 'Commentaire ajouté';

    if(isAjax()){
      $response = array(
        'success'=>$success,
        'pseudo'=>$pseudo,
        'message'=>$message
      );
      echo json_encode($response);exit;
    }

    unset($pseudo, $email, $message);
  }
  else{
    if(isAjax()){
      $response = array('errors'=>$errors);
      echo json_encode($response);exit;
    }
  }
}

$req = $bdd->prepare('SELECT * FROM comments ORDER BY id DESC');
$req->execute();
$comments = $req->fetchAll(PDO::FETCH_OBJ);
$req->closeCursor();

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
          <a class="navbar-brand" href="#">Formulaire AJAX</a>
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

      <video src="videos/video.mp4" type="video/mp4" controls width="480" height="360"></video>

      <br>
      <br>

      <div id="comments">
        <?php if($comments):
        foreach ($comments as $c):?>
          <h4><?=$c->pseudo;?></h4>
          <p><?=nl2br($c->message);?></p>
        <?php endforeach; endif;?>
      </div>

      <br>
      <br>

      <?php
      if(!empty($errors)):?>
        <div class="alert alert-danger">
          <?php foreach ($errors as $e):?>
            <p><?=$e;?></p>
          <?php endforeach;?>
        </div>
      <?endif;?>

      <?php if(isset($success)):?>
        <div class="alert alert-success">
          <?=$success;?>
        </div>
      <?php endif;?>

      <form id="form" action="index.php" method="post">
        <input type="text" name="pseudo" value="<?=isset($pseudo) ? $pseudo : false;?>" id="pseudo" placeholder="Pseudo" class="form-control">
        <br>
        <br>
        <input type="text" name="email" id="email" value="<?=isset($email) ? $email : false;?>" placeholder="Email" class="form-control">
        <br>
        <br>
        <textarea name="message" id="message" placeholder="Message" class="form-control"><?=isset($message) ? $message : false;?></textarea>
        <br>
        <br>
        <input type="submit" id="submit" class="btn btn-primary" value="Envoyer">
      </form>

    </div>

    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>

  </body>
</html>
