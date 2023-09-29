<?php
include "connect.php"; 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex x-45">
  <?php
    if (isset($_GET['gekozenCategorie'])) {
      $categorie = $_GET['gekozenCategorie'];
      $sql = "SELECT * FROM tblproducten WHERE categorie LIKE '".$categorie."'";
      $result = $mysqli->query($sql);
      while($row = $result->fetch_assoc()) {
        echo '
        <div class="card card-compact w-96 bg-base-100 shadow-xl float-right">
          <figure><img id="productFoto" src="'.$row['foto'].'" alt="'.$row['foto'].'"/></figure>
            <div class="card-body">
              <h2 id="productNaam" class="card-title">'.$row['naam'].'</h2>
              <p id="productPrijs"></p>
              <p id="productBeschrijving">'.$row['beschrijving'].'</p>
              <div id="aankoop" class="card-actions justify-end">
                <button id="aankoopKnop" class="btn btn-primary">Buy Now</button>
              </div>
            </div>
        </div>
        <div class="divider divider-horizontal"></div>
        ';
      };
    };
  ?>
</div>
</body>
</html>