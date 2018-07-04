<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php myfram\core\base\View::getMeta(); ?>
    <style>
        .panel{
            margin-top: 5px;
            padding: 5px;
            background: #ccc;
            border-radius: 5px;
            text-align: center;
        }
    </style>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="/css/sticky-footer.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>

<!-- Begin page content -->
<div class="fancyNav">
    <ul>
        <li><a href="/"><img src="/images/home-icon-silhouette.svg">Главна</a></li>
        <li><a href="/posts/">Статья</a></li>
        <li><a href="/user/signup/">Регистрация</a></li>
        <li><a href="/user/login/">Вход</a></li>
        <li><a href="/user/logout/">Выход</a></li>
    </ul>
</div>
<main role="main" class="container">
   <!-- <button class="button" id="test">Test</button>-->
    <? if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?
        echo $_SESSION['error'];
        $_SESSION['error'] = null;
        ?>
    </div>
    <? endif; ?>
    <? if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?
            echo $_SESSION['success'];
            $_SESSION['success'] = null;
            ?>
        </div>
    <? endif; ?>
    <?=$content?>
</main>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<?php
foreach ($scripts as $script){
    echo $script;
}
?>
</body>
</html>