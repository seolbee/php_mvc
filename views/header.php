<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-5.11.2-web/fontawesome-free-5.11.2-web/css/all.min.css">
</head>
<body>
    <nav>
        <div class="profile">
            <img src="/image/profile.png" alt="profile_image">
            <p>adminBlog</p>
        </div>
        <div class="sns">
            <i class="fab fa-twitter"></i>
            <i class="fab fa-facebook"></i>
            <i class="fab fa-instagram"></i>
        </div>
        <ul>
            <li class="li <?= $active == "main" ? "active" :""?>">
                <a href="/"><i class="fas fa-home"></i>home</a>
            </li>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']->id == "admin") : ?>
                <li class="li <?= $active == "write" ? "active" :""?>">
                    <a href="/write"><i class="fas fa-edit"></i>write</a>
                </li>
                <li class="li <?= $active == "admin" ? "active" :""?>">
                    <a href="/admin"><i class="far fa-user"></i>admin</a>
                </li>
            <?php endif;?>
        </ul>
    </nav>
    <header>
        <form action="/" class="search" method="get">
            <button><i class="fas fa-search"></i></button>
            <input type="text" id="search" placeholder="Search" name="word">
        </form>
        <div class="myProflie">
            <?php if (isset($_SESSION['user'])) : ?>
                <span><?=$_SESSION['user']->nicname?></span>
                <a href="/logout"><i class="fas fa-sign-out-alt"></i></a>
            <?php else : ?>
                <a href="/login"><i class="fas fa-sign-in-alt li <?= $active == "login" ? "active" :""?>"></i></a>
                <a href="/register"><i class="fas fa-user-plus li <?= $active == "register" ? "active" :""?>"></i></a>
            <?php endif;?>
        </div>
    </header>
    <script src="script.js">
    </script>
    <section class="main">