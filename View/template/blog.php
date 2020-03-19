<?php
$utilityObject->fixedBar = true;
?>
<section class="minh-100">
    <div class="container">
        <div class="mb-4 text-center">
            <h1 class="font-weight-bold">Il nostro <i class="fas fa-blog"></i>log</h1>
            <h5 class="font-italic font-weight-light">
                Per rimanere sempre aggiornato sullo sviluppo
            </h5>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Studiolo</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </nav>

        <?php
        if (count($object->articles) == 0) {
        ?>
            <div class="alert alert-warning" role="alert">
                Nessun articolo presente!
            </div>
        <?php

        } else {
            $firstArticle = array_pop($object->articles);
        ?>
            <div class="row pt-3 pb-1">
                <div class="col-md-12 text-center">
                    <h5 class="text-uppercase text-muted font-weight-bold">In primo piano</h5>
                </div>
            </div>
            <div class="jumbotron px-5 pt-5 pb-4 text-white rounded bg-dark gradient-post">
                <div class="row">
                    <div class="col-md-6 px-0">
                        <h1 class="display-4"><?= $firstArticle->getTitle() ?></h1>
                        <p class="lead my-3">
                            <?php
                            $date = new DateTime($firstArticle->getDate());

                            if (strlen($firstArticle->getText()) > 100) {
                                echo substr($firstArticle->getText(), 0, 100) . "...";
                            } else {
                                echo $firstArticle->getText();
                            }

                            ?>
                        </p>
                        <p class="lead mb-0"><a href="<?= "/article?id=" . $firstArticle->getId() ?>" class="text-yellow font-weight-bold"><i class="fas fa-external-link-alt"></i> Leggi di
                                pi&ugrave;...</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <div class="mt-3 text-white font-italic" style="font-size:10px;">
                            Aggiornato il <?= $date->format('d/m/Y'); ?> alle ore <?= $date->format('H:i:s'); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        if (count($object->articles) > 1) {
        ?>
            <div class="row pt-3 pb-1">
                <div class="col-md-12 text-center">
                    <h5 class="text-uppercase text-muted font-weight-bold">Altri articoli</h5>
                </div>
            </div>

            <div class="row mb-2">

                <?php

                $count = 0;

                foreach ($object->articles as $article) {
                    $date = new DateTime($article->getDate());
                ?>

                    <div class="col-md-6">
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <h3><?= $article->getTitle() ?></h3>
                                <p class="card-text mb-2"> <?php
                                                            if (strlen($article->getText()) > 100) {
                                                                echo substr($article->getText(), 0, 100) . "...";
                                                            } else {
                                                                echo $article->getText();
                                                            }
                                                            ?>
                                </p>
                                <a href="<?= "/article?id=" . $article->getId() ?>" class="stretched-link text-yellow"><i class="fas fa-external-link-alt"></i> Leggi di
                                    pi&ugrave;...</a>
                                <div class="mb-1 text-right text-muted font-italic" style="font-size:10px;">
                                    Aggiornato il <?= $date->format('d/m/Y'); ?> alle ore <?= $date->format('H:i:s'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                    if (++$count % 2 == 0) {
                        echo "</div><div class='row mb-2'>";
                    }
                }
            }
            ?>
            </div>
    </div>
</section>