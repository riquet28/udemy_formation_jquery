<?php

  require('db.php');


  if(!empty($_POST['tasks'])){
    foreach($_POST['task'] as $id){
      $req = $bdd->prepare('DELETE FROM tasks WHERE id = :id');
      $req->execute(array(':id'=>$id));
      $req->closeCursor();

    }
    $response = array('success'=>true, 'message'=>'Tache(s) supprimées');
    echo json_encode($response);
  }

?>
