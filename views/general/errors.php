<?php layout('error') ?>

<?php section('body') ?>
<div class="error_div text-white z-100 d-flex flex-column">
    <div class="d-flex justify-content-center align-items-center">
        <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center"><?= $code ?></h1>
        <div class="inline-block align-middle">
            <h2 class="font-weight-normal lead text-uppercase" id="desc"><?= $text ?></h2>
        </div>
    </div>
    <div class="d-flex justify-content-between position-absolute" style="bottom: 240px; left: 0px; right: 0px; width: 380px; margin: auto">
        <a class="btn btn-outline-light" href="<?= route('home.index') ?>">Aller à la page d'accueil</a>
        <a class="btn btn-outline-light" href="<?= redirectBack() ?>">Retour en arrière</a>
    </div>
</div>
<?php endsection() ?>