<?php
include "./connect.php";
include "./functions/userFunctions.php";
require 'lang.php';
?>
<div class="navbar bg-[#F1FAEE]">
    <div class="navbar-start">
        <a href="index.php" class="btn btn-ghost normal-case text-xl text-black"><?= __('2nd chance auctions')?></a>
    </div>
    <div class="navbar-center">
        <details class="dropdown mb-0">
            <summary class="m-1 btn btn-ghost text-black"><?= __('Categories')?></summary>
            <ul name="categorieknop" tabindex="0" class="p-2 shadow menu dropdown-content z-[1] rounded-box w-25">
            </ul>
        </details>
        <input type="text" placeholder=<?= __('Search')?> class="input input-bordered bg-transparent md:w-auto" />
    </div>
    <div class="navbar-end">
    <div class="dropdown">
  <label tabindex="0" class="btn m-1"><?= __('Languages')?></label>
  <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
    <li><a href="index.php?lang=nl">Nederlands</a></li>
    <li><a href="index.php?lang=en">English</a></li>
    <li><a href="index.php?lang=fr">Français</a></li>
  </ul>
</div>
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <img src="../public/img/favourite.png" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <span class="badge badge-sm indicator-item">8</span>
                </div>
            </label>
            <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
                <div class="card-body">
                    <span class="font-bold text-lg">8<?= __('Items') ?></span>
                    <div class="card-actions">
                        <button class="btn btn-primary btn-block"><?= __('View Favorites')?></button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if(isset($_SESSION["login"])){
        ?>
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                <?php
                if($_SESSION["login"]){
                    $userid = $_SESSION["login"];
                    $image = getProfilePicture($mysqli,$userid);
                    print'<img src="../public/img/'.$image.'"/>';
                }
                ?>
                </div>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-black text-white rounded-box w-52">
                <li>
                    <a href="aanpassenGebruikers.php" class="justify-between">
                        <?= __('Profile')?>
                    </a>
                </li>
                <li><a><?= __('Settings')?></a></li>
                    <li><a href="productToevoegen.php"><?= __('Add Product')?></a></li>
                    <li><a href="loguit.php"><?= __('Logout')?></a></li>
            </ul>
        </div>
        <?php
        }else{
            print'<a href="login.php" class="btn btn-ghost text-black ml-2">'. __('Login').'</a>';
        }
        ?>
    </div>
</div>

