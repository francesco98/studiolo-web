<!-- Gestione variabili php della view -->
<?php
$utilityObject->fixedBar = true;
?>

<!-- Section per il login -->
<section class="h-100">
    <!-- Container -->
    <div class="container">
        <div class="mb-4 text-center">
            <h1 class="font-weight-bold"><i class="fas fa-lock"></i> Accedi</h1>
            <h5 class="font-italic font-weight-light">
                Effettua il login per accedere al pannello di controllo
            </h5>
        </div>

        <!-- Breadcrumb-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Studiolo</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </nav>

        <div class="row justify-content-md-center">
        <!-- Gestione errori -->
            <div class="col-lg-6 mt-5">
                <?php 
                    if(isset($_GET['error'])) {
                ?>
                <div class="alert alert-danger" role="alert">
                    Ops... Le crendenziali sembrano non essere corrette!
                </div>
                <?php
                    }
                ?>
                <!-- Form login e relativi elementi -->
                <form class="masthead shadow-lg form-contacts" action="/processadmin" method="post">
                    <div class="form-group">
                        <label for="user" class="text-white">Username</label>
                        <input type="text" class="form-control" id="user" aria-describedby="emailHelp" placeholder="Inserisci Username" name="user">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-white">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Inserisci password" name="password">
                    </div>
                    <div class="d-block text-center mx-auto">
                        <button type="submit" class="btn btn-light btn-custom text-uppercase px-5">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>