<?php
$utilityObject->fixedBar = true;
?>

<section class="section-blog minh-100">
    <div class="container ">
        <div class="row justify-content-md-start">
            <div class="col-lg-8 ">
                <form id="articleForm" method="POST" action="/processedit">
                    <div class="form-group">
                        <h4>
                            Inserisci o modifica il titolo
                        </h4>
                        <input name="title" type="text" class="form-control" value='<?= $object->article->getTitle() ?>' placeholder="Inserisci un titolo" />
                    </div>
                    <div class="form-group mt-4">
                        <h4>
                            Inserisci o modifica il contenuto
                        </h4>
                        <textarea name="text" class="form-control" rows="40"><?= $object->article->getText() ?></textarea>
                    </div>
                    <input type="hidden" name="id" value=<?= is_null($object->article->getId()) ? 0 : $object->article->getId() ?> />
                    <input type="hidden" name="op" value=<?= $object->op ?> />
                </form>
            </div>
            <div class="col-lg-4">
                <div class="card mt-5 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Azioni</h5>
                        <p class="card-text">Attenzione: lasciando questa pagina senza salvare con il pulsante in basso,
                            le modifiche andranno perse.</p>
                        <a id="editOp" href="#" class="btn btn-primary mt-2">Modifica</a>
                        <a id="deleteOp" href="#" class="btn btn-danger mt-2">Elimina</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>