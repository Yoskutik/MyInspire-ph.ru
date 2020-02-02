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
    <?php foreach([1, 3, 4, 5, 7, 8, 9, 10, 12, 14] as $photo) { ?>
        <?= createPhoto($photo) ?>
    <? } ?>
</div>