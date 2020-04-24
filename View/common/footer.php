<!-- Footer -->
<footer>
    <!-- Container -->
    <div class="container">
        <p>&copy; Studiolo 2020. All Rights Reserved.</p>
        <!-- Elementi footer -->
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="#">Privacy</a>
            </li>
            <li class="list-inline-item">
                <a href="#">Terms</a>
            </li>
            <li class="list-inline-item">
                <a href="#">FAQ</a>
            </li>
        </ul>
    </div>
</footer>

<!-- Relativi import di file js  -->
<script src="<?=($utilityObject->getScript)('jquery.min')?>"></script>
<script src="<?=($utilityObject->getScript)('bootstrap.min')?>"></script>
<script src="<?=($utilityObject->getScript)('script')?>"></script>

<!-- Controllo di gestione della navbar -->
<?php
    if($utilityObject->fixedBar) {
?>
<script type="text/javascript">
    $("#mainNav").addClass("no-scroll navbar-shrink");
</script>
<?php
    }
?>
</body>
</html>