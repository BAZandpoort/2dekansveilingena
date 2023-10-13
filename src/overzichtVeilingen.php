<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.4/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
    <title>title</title>
</head>
<body class="min-h-screen bg-[#F1FAEE]">
    <?php
    include "components/navbar.php";
    include "functions/adminFunctions.php";
    include "connect.php"; 
    
    echo '<div class="flex flex-wrap gap-4">';
    if(getDataTblproducten($mysqli)){
    foreach (getDataTblproducten($mysqli) as $data) {     
        
      echo'<div class="card w-96  shadow-xl bg-white">';
      if (empty($data["foto"])) {
       echo' <figure><img src="../public/img/brokenImageIcon.png" width="240" hight="320" /></figure>';  
      } else {
      echo'
      <figure><img src="../public/img/'.$data["foto"].'" width="240" hight="320" /></figure>';
      }
      echo'
      <div class="card-body">
        <h2 class="card-title text-black">
          '.$data["naam"].'
        </h2>
       <p class="text-black">'.$data["beschrijving"].'</p>
        <div class="card-actions justify-end">';
        if (empty($data["categorie"])) {
         echo ' <div class="badge badge-outline text-black">none</div> ';
        } else {
         echo '<div class="badge badge-outline text-black">'.$data["categorie"].'</div>';
        }
         echo ' <div class="badge badge-outline text-black"> € '.$data["prijs"].'</div> 
         <span class="countdown font-mono text-2xl text-black">
            <span id="hours" style="--value:00;"></span>:
            <span id="minutes" style="--value:00;"></span>:
            <span id="seconds" style="--value:00;"></span>
          </span>
          <img src="../public/img/addfavorite.png" class="h-10 w-10" class="btn">
          <button class="btn btn-outline text-black bg-white border-white hover:text-white hover:bg-black ">Bid</button>
        </div>
      </div>
    </div>';
    $tijd = $data["eindtijd"];
    }
  }
  echo '</div>';
      ?>
      <script defer>
          var countDownDate = <?php echo strtotime($tijd) ?> * 1000;
          var now = <?php print time() ?> * 1000;
           var x = setInterval(function() {
          now = now + 1000;
   
          var distance = countDownDate - now;
   
       var days = Math.floor(distance / (1000 * 60 * 60 * 24));
       var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
       var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
       var seconds = Math.floor((distance % (1000 * 60)) / 1000);
   
       document.getElementById("hours").style = "--value:" + hours + ";"
       document.getElementById("minutes").style = "--value:" + minutes + ";"
       document.getElementById("seconds").style = "--value:" + seconds + ";"    
           }, 1000);
          <?php
    ?>
    </script>
</body>
</html>