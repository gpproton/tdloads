<?php

Injector::loadClass('Views_BaseView');

final class StartView extends BaseView {

    protected static function Content()
    {
?>

    <div>
        <div class="dl_horizontal_center">
            <span class="dl_header_text">Invalid action</span>

            <div class="dl_status_icon" style="margin-top: 35px;">
                <span class="material-icons dl_status_icon_warning">warning</span>
            </div>
        </div>
    </div>

<?php
    return '';
    }

}