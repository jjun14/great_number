<?php 
  session_start();
  // session_destroy();

 ?>

<html>
  <head>
    <title>Great Number Game</title>
    <style>
      div.container {
        width: 650px;
        border: 1px solid silver;
        margin: 0px auto;
      }

      div.box {
        display: inline-block;
        vertical-align: top;
        width: 200px;
        height: 200px;
        border: 1px solid silver;
        text-align: center;
      }

      div.wrong {
        background-color: red;
      }
      div.correct {
        background-color: green;
      }

      form {
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h3>Welcome to the great number game</h3>
      <p>I am thinkin of a number</p>
<!--       <div class="box wrong">
        Too Low
      </div>
      <div class="box correct">
        Correct The number was 55
        <form action="process.php" method='post'>
          <input type="submit" value='reset'>
        </form>
      </div>
      <div class="box wrong">
        Too High
      </div> -->
      <?php
        if(isset($_SESSION['low'])){
          echo($_SESSION['low']);
          unset($_SESSION['low']);
        } else if(isset($_SESSION['high'])){
          echo($_SESSION['high']);
          unset($_SESSION['high']);
        } else if(isset($_SESSION['correct'])){ 
      ?>
          <div class="box correct">
            <p>Correct the number was <?= $_SESSION['rand']; ?>!</p>
            <form action="process.php" method='post'>
              <input type="hidden" name='action' value='reset'>
              <input type="submit" value='reset'>
            </form>
          </div>

      <?php  }


      ?>
      <?php 
        if(!isset($_SESSION['correct']))
        { 
?>
          <p>Take a guess!</p>
          <form action="process.php" method='post'>
            <input type="text" name='guess'>
            <input type="hidden" name='action' value='guess'>
            <input type="submit" value='submit'>
          </form>
<?php   }
       ?>
    </div>
  </body>
</html>

<?php 

  echo("<h1>SESSION</h1>");
  var_dump($_SESSION);

 ?>