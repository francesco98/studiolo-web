<html>

<head>
    <link rel="stylesheet" type="text/css" href="<?= ($utilityObject->getStyle)('bootstrap.min') ?>">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://kit.fontawesome.com/9fcb7fa616.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?= ($utilityObject->getStyle)('style') ?>">

    <title> <?= $utilityObject->title ?> | Studiolo</title>

</head>

<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">STUDIOLO</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="/blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="/contacts">Contattaci</a>
                    </li>
                    <?php
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
                    ?>
                        <li class="nav-item d-flex">
                            <a class="nav-link js-scroll-trigger my-auto" href="/admin">
                                <i class="fas fa-cog"></i>
                            </a>
                        </li>
                        <li class="nav-item d-flex">
                            <a class="nav-link js-scroll-trigger my-auto" href="/logout">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item d-flex">
                            <a class="nav-link js-scroll-trigger my-auto" href="/admin">
                                <i class="fas fa-lock"></i>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>