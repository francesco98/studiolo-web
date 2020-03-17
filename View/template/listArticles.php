<?php
$utilityObject->fixedBar=true;
?>
<section class="masthead minh-100">
    <div class="container">
        <div class="card p-5 shadow-sm rounded">
            <div class="row mb-5 d-block p-4">
                <a href="<?= "/modifyArticle?op=insert" ?>" class="btn btn-warning float-right">Nuovo articolo</a>
            </div>
            <?php
foreach ($object->articles as $article) {
    $date = new DateTime($article->getDate());
?>
            <div class="row border-bottom my-2">
                <div class="col-8">
                    <h5>
                        <strong>
                            <?= $article->getTitle() ?>
                        </strong>
                    </h5>
                    <p class="text-grey" style="font-size:10px"> Aggiornato il <?= $date->format('d/m/Y'); ?> alle ore <?= $date->format('H:i:s'); ?></p>
                </div>
                <div class="col-2 text-right p-0">
                    <a href="<?= "/modifyArticle?id=" . $article->getId()."&op=update" ?>" class="btn btn-link text-blue">Modifica</a>
                </div>
                <div class="col-2 p-0">
                    <a href="<?= "/modifyArticle?id=" . $article->getId()."&op=delete" ?>" class="btn btn-link text-green">Elimina</a>
                </div>
            </div>
            <?php
}
?>
        </div>
    </div>
</section>