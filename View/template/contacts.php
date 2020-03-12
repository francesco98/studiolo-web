<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 justify-content-md-center">
            <div class="col-lg-6 my-auto">
                <?php 
            if (isset($object->message)){
                echo($object->message);

            }
            else{

            
            ?>
                <form class="form-contacts" action="/processform" method="post">
                    <div class="form-group">
                        <label for="inputEmail1" class="text-dark">Email</label>
                        <input type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp"
                            placeholder="Inserisci Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="text-dark">Nome Università</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Inserisci nome Università"
                            name="uni">

                    </div>
                    <div class="form-group">
                        <label for="inputMessage" class="text-dark">Messaggio</label>
                        <textarea class="form-control" id="inputMessage" rows="5" style="resize: none"
                            name="message"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-custom">Invia</button>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</header>