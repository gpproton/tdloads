<?php

Injector::loadClass('Views_BaseView');

final class StartView extends BaseView {

    protected static function Content()
    {
?>

<h1>Test <?php echo __CLASS__ ?></h1>

<?php
    return '';
    }

}