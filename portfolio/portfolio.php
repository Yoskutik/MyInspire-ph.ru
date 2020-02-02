<?php
    function createItem($title, $style = []) {
        return "
            <div class='item'>
                <div class='photo' data-href='$title/'>
                    <img alt='$title' src='photos/$title.png' style='margin-top: {$style['margin-top']}'>
                </div>
                <h2 class='item__title'>$title</h2>
            </div>
        ";
    }
?>

<div class="block">
    <?= createItem('Daria', ['margin-top' => '-30px;']) ?>
    <?= createItem('Dasha', ['margin-top' => '-30px;']) ?>
    <?= createItem('Julia', ['margin-top' => '-100px;']) ?>
    <?= createItem('Kristina', ['margin-top' => '125px']) ?>
    <?= createItem('Mark') ?>
</div>