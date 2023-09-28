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
<div class="navbar bg-base-100">
  <div class="flex-1">
    <a class="btn btn-ghost normal-case text-xl">2dekansveilingen</a>
  </div>
  <div class="flex">
  <div class="form-control">
        <input type="text" placeholder="Search" class="input input-bordered input-info w-full max-w-xs"/>
    </div>
  <div class="flex-none">
    <div class="dropdown dropdown-end">
      <label tabindex="0" class="btn btn-ghost btn-circle">
        <div class="indicator">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
          <span class="badge badge-sm indicator-item">8</span>
        </div>
      </label>
      <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
        <div class="card-body">
          <span class="font-bold text-lg">8 Items</span>
          <span class="text-info">Subtotal: $999</span>
          <div class="card-actions">
            <button class="btn btn-primary btn-block">View cart</button>
          </div>
        </div>
      </div>

      </div>
    </div>
</div>
<div>
    <div class="dropdown dropdown-end">
      <label tabindex="0" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
          <img src="../public/img/profile.png" />
    </div>
      </label>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
        <li>
          <a href="" class="justify-between">
            Profile
            <span class="badge">New</span>
          </a>
        </li>
        <li><a>Settings</a></li>
        <li><a href="tijdelijk">Logout</a></li>

        <li><a href="tijdelijk">Login</a></li>
      </ul>
    </div>
</div>
      </ul>
    </div>
  </div>
</div>
<br>
<div class="box-border w-25 h-85 hmd:container md:mx-auto md:float-left">
  <form action="index.php" method="POST">
  <table>
    <?php
        $sql = "SELECT * FROM tblcategorieen";
        $result = $mysqli->query($sql);
        while($row = $result->fetch_assoc()) {
          echo "
            <tr><td><input type='submit' class='link link-neutral' name='categorieID' value='".$row['categorienaam']."'></></td></tr>
          ";
        };
    ?>
  </table>
  <form>
</div>
<div>
  <?php
    if (isset($_POST['categorieID'])) {
      $categorie = $_POST['categorieID'];
      $sql = "SELECT * FROM tblproducten WHERE categorie LIKE '".$categorie."'";
      $result = $mysqli->query($sql);
      while($row = $result->fetch_assoc()) {
        echo '
        <div class="card card-compact w-96 bg-base-100 shadow-xl">
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
        ';
      };
    };
  ?>
</div>
</div>
</body>
</html>