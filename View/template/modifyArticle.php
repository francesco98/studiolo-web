<?php
$utilityObject->fixedBar = true;
?>

<section class="section-blog">
    <div class="container ">
        <div class="row justify-content-md-start">
            <div class="col-lg-8 ">
                <form>
                    <div class="form-group">
                        <label for="articleTitle">
                            <h1>
                                Titolo
                            </h1>
                        </label>
                        <input type="text" class="form-control" id="articleTitle" placeholder="Inserisci un titolo">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="articleText" rows="20">
                        </textarea>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="card mt-5 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Azioni</h5>
                        <p class="card-text">Attenzione: lasciando questa pagina senza salvare con il pulsante in basso,
                            le modifiche andranno perse.</p>
                        <a href="#" class="btn btn-primary mt-2">Modifica</a>
                        <a href="#" class="btn btn-danger mt-2">Elimina</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>