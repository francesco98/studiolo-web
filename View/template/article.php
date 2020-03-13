<?php
$utilityObject->fixedBar=true;
?>
<section class="masthead">
    <div class="container">
        <div class="card p-5 shadow-sm rounded">
            <h1 class="display-4 font-italic">
                <?=$object->getTitle()?>
            </h1>
            <p class="text-monospace text-yellow">
            <?php 
            $date = new DateTime($object->getDate());
            echo $date->format('d/m/Y');
            ?></p>
            <p class="card-text my-4"><?=$object->getText()?>
            </p>
        </div>
    </div>
</section>