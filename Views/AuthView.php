<?php

Injector::loadClass('Views_BaseView');

final class AuthView extends BaseView {
    
    protected static function Content()
    {
?>

    <div>
        <div class="dl_horizontal_center">
            <div class="dl_status_icon">
                <span class="material-icons dl_status_icon_error">error</span>
            </div>
            <span class="dl_header_text">Requires PassKey</span>
        </div>

        <form action="#" class="dl_form">
            <div class="dl_base_form dl_vertical_center dl_horizontal_center">
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input dl_input" type="text" id="auth" required>
                    <label class="mdl-textfield__label" for="auth">Pass Key..</label>
                </div>

                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored dl_button">
                    <i class="material-icons">navigate_next</i>
                </button>
            </div>
        </form>
    </div>

<?php
    return '';
    }

}