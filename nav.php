<!-- <style>
    ul, li{
        list-style: none;
    }
    a{
        text-decoration:none;
        color: #000;
    }
    a:hover{
        text-decoration: underline;
    }
    header{
        width:100%;
        border-bottom: 1px solid #ddd;
    }
    .header{
        width: 80%;
        margin: 0 auto;
    }
    .background{
        width:80%;
        margin: 20px auto;
        text-align: center;
        position: relative;
    }
    .logo{
        display: inline-block;
    }
    .logo > h1 > a:hover{
        text-decoration:none;
    }
    nav{
        display:inline-block;
    }
    nav > ul{
        display:flex;
    }
    nav > ul > li{
        display:flex;
        flex: 1;
        padding: 5px 10px;
    }
    .content{
        padding: 20px;
    }
    table{
        margin: 0 auto;
        border-top: 2px solid #000;
        width: 80%;
        border-collapse: collapse;
    }
    table > tbody > tr > th{
        border-bottom: 1px solid #333;
        background: #eee;
        padding: 10px 0px;
    }
    table > tbody > tr > td{
        border-bottom: 1px solid #ccc;
        padding: 10px 0px;
    }
    textarea{
        margin-top: 10px;
        width: 80%;
        height: 500px;
        font-size: 15px;
        border-radius: 5px;
    }
    #button{
        background-color: #00afff;
        border: none;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
    }
    input{
        width: 80%;
        height: 30px;
        margin: 10px;
        padding: 0;
        font-size: 15px;
        border: none;
        border-radius: 5px;
        border: 1px solid #999;
    }
    .tage{
        position: absolute;
        right: 155px;
        margin-top: 10px;
    }
    .content{
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }
    .title{
        text-align: left;
        padding-left: 150px;
        margin-bottom: 0;
        font-weight: bold;
    }
</style> -->
        
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="./index.php" class="navbar-brand ">자유게시판</a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link " href="/list.php">게시판</a></li>
        <li class="nav-item"><a class="nav-link " href="/form.php">글쓰기</a></li>
    </ul>
    <ul class="navbar-nav">
        <?php if(isset($_SESSION['user'])):?>
            <li class="nav-item"><?= $_SESSION['user']->nickname ?>님</li>
            <li class="nav-item"><a href="/logout.php">로그아웃</a></li>
        <?php else : ?>
            <li class="nav-item"><a href="/login.php" class="nav-link ">로그인</a></li>
            <li class="nav-item"><a href="/register.php" class="nav-link ">회원가입</a></li>
        <?php endif; ?>
    </ul>
</nav>