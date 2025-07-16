<?php
add_action('admin_menu', function () {
    add_options_page('Cheftes Settings', 'Cheftes', 'manage_options', 'cheftes', 'cheftes_settings_page');
});

add_action('admin_init', function () {
    register_setting('cheftes-settings-group', 'cheftes_api_key');
});

function cheftes_settings_page() {
    ?>
    <div class="wrap">
        <h1>Ρυθμίσεις Cheftes</h1>
        <form method="post" action="options.php">
            <?php settings_fields('cheftes-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th>OpenAI API Key</th>
                    <td><input type="text" name="cheftes_api_key" value="<?php echo esc_attr(get_option('cheftes_api_key')); ?>" size="50" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
