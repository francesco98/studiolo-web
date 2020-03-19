<?php
$utilityObject->fixedBar = true;
?>
<section class="masthead minh-100">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-white">
                <li class="breadcrumb-item"><a href="/">Studiolo</a></li>
                <li class="breadcrumb-item active" aria-current="page">Amministrazione</li>
            </ol>
        </nav>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="articles-tab" data-toggle="tab" href="#articles" role="tab" aria-controls="articles" aria-selected="true">Lista Articoli</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contacts-tab" data-toggle="tab" href="#contacts" role="tab" aria-controls="contacts" aria-selected="false">Lista Contatti</a>
            </li>
        </ul>

        <div class="card custom-card p-5 shadow-sm rounded">

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="articles" role="tabpanel" aria-labelledby="articles-tab">
                    <div class="row mb-5 d-block p-4">
                        <a href="<?= "/modifyArticle?op=insert" ?>" class="btn btn-warning float-right">Nuovo articolo</a>
                    </div>
                    <?php
                    if (count($object->articles) == 0) {
                    ?>

                        <div class="alert alert-warning" role="alert">
                            Nessun articolo presente!
                        </div>
                        <?php
                    } else {

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
                                    <a href="<?= "/modifyArticle?id=" . $article->getId() . "&op=update" ?>" class="btn btn-link text-blue">Modifica</a>
                                </div>
                                <div class="col-2 p-0">
                                    <a href="<?= "/modifyArticle?id=" . $article->getId() . "&op=delete" ?>" class="btn btn-link text-green">Elimina</a>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                <?php
                    if (count($object->contacts) == 0) {
                    ?>
                        <div class="alert alert-warning" role="alert">
                            Nessun contatto presente!
                        </div>
                        <?php
                    } else {
                        foreach ($object->contacts as $contact) {
                        ?>
                            <div class="row border-bottom my-2">
                                <div class="col-12">
                                    <p class="text-success">
                                            <i class="fas fa-user fa-sm"></i> <?= $contact->getName() ?><br/>
                                        <small class="text-muted font-italic pt-2">
                                            <i class="fas text-dark fa-envelope fa-sm"></i> <?= $contact->getEmail() ?>
                                        </small>
                                    </p>
                                    <p class="font-size:1em;">
                                        <?= $contact->getMessage() ?>
                                    </p>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>