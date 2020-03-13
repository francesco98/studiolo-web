<?php
$utilityObject->fixedBar = true;
?>
<section class="h-100">
    <div class="container">
        <div class="mb-4 text-center">
            <h1 class="font-weight-bold"><i class="far fa-envelope-open"></i> Contattaci</h1>
            <h5 class="font-italic font-weight-light">
                Per rimanere sempre informato
            </h5>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Studiolo</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contattaci</li>
            </ol>
        </nav>

        <div class="row justify-content-md-center">
            <?php
            if (isset($object->message)) {
            ?>
                <div class="col-lg-12 my-auto text-center">
                    <i class="fas text-muted fa-check fa-10x"></i><br />
                    <h3 class="text-muted">
                        <?= $object->message ?>
                    </h3>
                </div>
            <?php
            } else {
            ?>
                <div class="col-lg-6 mt-5">
                    <form class="masthead shadow-lg form-contacts" action="/processform" method="post">
                        <div class="form-group">
                            <label for="inputEmail1" class="text-white">Email</label>
                            <input type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp" placeholder="Inserisci Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="text-white">Nome Università</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Inserisci nome Università" name="uni">

                        </div>
                        <div class="form-group">
                            <label for="inputMessage" class="text-white">Messaggio</label>
                            <textarea class="form-control" id="inputMessage" rows="5" style="resize: none" name="message"></textarea>
                        </div>
                        <div class="d-block text-center mx-auto">
                            <button type="submit" class="btn btn-light btn-custom text-uppercase px-5">Invia</button>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</section>