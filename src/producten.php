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
  <div class="navbar-start">
  <div class="flex-1">
    <a class="btn btn-ghost normal-case text-xl">2dekansveilingen</a>
  </div>
  <?php
  
    echo '
        <details class="dropdown mb-0">
        <summary class="m-1 btn">Categorieën</summary>
        <ul name="categorieknop" tabindex="0" class="p-2 shadow menu dropdown-content z-[1] rounded-box w-25">';
            $sql = "SELECT * FROM tblcategorieen";
            $result = $mysqli->query($sql);
            while($row = $result->fetch_assoc()) {
              echo '
                <li><a href="producten.php?gekozenCategorie='.$row['categorienaam'].'" class="link link-neutral" name="categorieID">'.$row['categorienaam'].'</a></li>
              ';
            };
        echo '
        </ul>
        </details>
    ';
  ?>
  </div>
  <div class="flex w-75">
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
  </div>
          </div>
</div>
</div>
<div class="flex flex-col w-full">
    <div class="divider"></div> 
</div>

    <div class="flex x-45 float right">
  <?php
    if (isset($_GET['gekozenCategorie'])) {
      $categorie = $_GET['gekozenCategorie'];
      $sql = "SELECT * FROM tblproducten WHERE categorie LIKE '".$categorie."'";
      $result = $mysqli->query($sql);
      while($row = $result->fetch_assoc()) {
        echo '
        <div class="card card-compact w-96 bg-base-100 shadow-xl float-right">
          <figure><img id="productFoto" src="../public/img/'.$row['foto'].'" alt="'.$row['foto'].'"/></figure>
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