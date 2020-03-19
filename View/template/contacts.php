<?php
$utilityObject->fixedBar = true;
?>
<section class="minh-100">
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
            if (isset($object->result) && isset($object->message) && $object->result) {
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
                    <?php
                    if (isset($object->result) && isset($object->message) && !$object->result) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $object->message ?>
                        </div>
                    <?php
                    }
                    ?>
                    <form class="masthead shadow-lg form-contacts" action="/processform" method="post">
                        <div class="form-group">
                            <label for="inputEmail1" class="text-white">Email</label>
                            <input type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp" placeholder="Inserisci Email" name="email">
                            <label class="text-yellow" id="error_email" style="display:none;">L'indirizzo email deve essere valido</label>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="text-white">Nome Università</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Inserisci nome Università" name="uni">
                            <label class="text-yellow" id="error_name" style="display:none;">Il campo deve contenere almeno 3 caratteri e al massimo 50</label>

                        </div>
                        <div class="form-group">
                            <label for="inputMessage" class="text-white">Messaggio</label>
                            <textarea class="form-control" id="inputMessage" rows="5" style="resize: none" name="message"></textarea>
                            <label class="text-yellow" id="error_message" style="display:none;">Il campo deve contenere almeno 3 caratteri e al massimo 500</label>
                        </div>
                        <div class="d-block text-center mx-auto">
                            <button type="submit" id="send" class="btn btn-light btn-custom text-uppercase px-5" disabled>Invia</button>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</section>