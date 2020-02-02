<?php
function createPhoto($photo) {
    return "
        <div class='photo'>
            <img src='photos/{$photo}m.png'>
        </div>
    ";
}
?>

<?php include '../../assets/elements/image-shower.php' ?>

<div class="block">
    <?php foreach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11] as $photo) { ?>
        <?= createPhoto($photo) ?>
    <? } ?>
</div>