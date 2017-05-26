<?php

  if(!empty($_GET)){
    $text = strip_tags($_GET['text']);
    $length = strlen($text);
    $upper = strtoupper($text);

    $response = [
      'message' => 'Le texte compte '.$length.' caratères',
      'uppercase' => 'Voici le texte en majuscule : '.$upper
    ];

    echo json_encode($response);
  }

?>
