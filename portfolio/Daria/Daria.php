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
    <?php foreach([1, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 15, 16] as $photo) { ?>
        <?= createPhoto($photo) ?>
    <? } ?>
</div>