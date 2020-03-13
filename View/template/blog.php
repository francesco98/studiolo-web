<?php
$utilityObject->fixedBar = true;
$firstArticle = array_pop($object->articles);
?>

<section class="section-blog">
    <div class="container">
        <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark gradient-post">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic"><?=$firstArticle->getTitle()?></h1>
                <p class="lead my-3">
                    <?php
                    if(strlen($firstArticle->getText()) > 100) {
                        echo substr($firstArticle->getText(), 0, 100) . "...";
                    } else {
                        echo $firstArticle->getText();
                    }
                    
                    ?>
                </p>
                <p class="lead mb-0"><a href="<?="/article?id=".$firstArticle->getId()?>"
                        class="text-yellow font-weight-bold">Leggi di
                        pi&ugrave;...</a></p>
            </div>
        </div>

        <?php
        foreach ($object->articles as $article) {
            $date = new DateTime($article->getDate());
            $date = $date->format('d/m/Y');
        ?>
        <div class="row mb-2">
            <div class="col-md-6">
                <div
                    class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0"><?=$article->getTitle()?></h3>
                        <div class="mb-1 text-muted"><?=$date?></div>
                        <p class="card-text mb-auto"> <?php
                            if(strlen($article->getText()) > 100) {
                                echo substr($primoArticolo->getText(), 0, 100) . "...";
                            } else {
                                echo $article->getText();
                            }
                    ?></p>
                        <a href="<?="/article?id=".$article->getId()?>" class="stretched-link text-yellow">Leggi di
                            pi&ugrave;...</a>
                    </div>
                </div>
            </div>
            <?php
        }
            ?>
        </div>
    </div>
</section>