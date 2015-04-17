<?php 
  session_start();

  // echo("<h1>SESSION</h1>");
  // var_dump($_SESSION); 
  // echo("<h1>POST</h1>");
  // var_dump($_POST);

  if(!isset($_SESSION['rand'])){
    $_SESSION['rand'] = rand(1, 100);
  }

  if(isset($_POST['action']) && $_POST['action'] == 'guess'){
    if($_POST['guess'] < $_SESSION['rand']){
      $_SESSION['low'] = "<div class='box wrong'>Too Low!</div>";
    } else if($_POST['guess'] > $_SESSION['rand']) {
      $_SESSION['high'] = "<div class='box wrong'>Too high!</div>";
    } else if($_POST['guess'] == $_SESSION['rand']){
      $_SESSION['correct'] = true;
    }
  } else if(isset($_POST['action']) && $_POST['action'] == 'reset') {
      unset($_SESSION['rand']);
      unset($_SESSION['correct']);
  }

  header('Location: index.php');
  exit();

 ?>