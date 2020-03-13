<?php
$utilityObject->fixedBar = true;
$date = new DateTime($object->getDate());
?>
<section>
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
                <li class="breadcrumb-item"><a href="/blog">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $object->getTitle() ?></li>
            </ol>
        </nav>


        <a href="/blog" class="ml-2 text-uppercase text-muted text-decoration-none">
            <i class="fas fa-arrow-left"></i> Torna indietro
        </a>


        <div class="row no-gutters border rounded overflow-hidden flex-md-row mt-5 mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h1 class="p-3" style="border-bottom: 1px solid rgba(0,0,0,.08);"><?= $object->getTitle() ?></h1>
                <div class="px-3 pt-3 text-right text-muted font-italic" style="font-size:10px;">
                    Aggiornato il <?= $date->format('d/m/Y'); ?> alle ore <?= $date->format('H:i:s'); ?>
                </div>
                <p class="p-3 my-4 text-justify"><?= $object->getText() ?></p>
            </div>
        </div>
    </div>
</section>