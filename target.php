<?php

  if(!empty($_GET)){
    $text = strip_tags($_GET['text']);
    $length = strlen($text);

    echo 'Le text compte '.$length.' caractères';
  }

?>
