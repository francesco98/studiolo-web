<?php
$utilityObject->fixedBar = true;
$primoArticolo = array_pop($object->articles);
?>
<section class="section-blog">
    <div class="container">
        <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark gradient-post">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic"><?=$primoArticolo->getTitle()?></h1>
                <p class="lead my-3">
                    <?php
                    if(strlen($primoArticolo->getText()) > 100) {
                        echo substr($primoArticolo->getText(), 0, 100) . "...";
                    } else {
                        echo $primoArticolo->getText();
                    }
                    ?>
                </p>
                <p class="lead mb-0"><a href="#" class="text-yellow font-weight-bold">Leggi di pi&ugrave;...</a></p>
            </div>
        </div>

        <?php
        foreach ($object->articles as $articolo) {
        ?>
            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">World</strong>
                            <h3 class="mb-0">Featured post</h3>
                            <div class="mb-1 text-muted">Nov 12</div>
                            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural
                                lead-in to additional content.</p>
                            <a href="#" class="stretched-link text-yellow">Continue reading</a>
                        </div>
                    </div>
                </div>

            <?php
        }
            ?>
            </div>
    </div>
</section>