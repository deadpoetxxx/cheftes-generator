<?php
function cheftes_render_form() {
    ob_start(); ?>
    <div class="cheftes-wrapper">
        <h2>🧑‍🍳 Τι υλικά έχεις;</h2>
        <input type="text" id="cheftes-ingredients" placeholder="π.χ. αυγό, πατάτα, φέτα">
        <button id="cheftes-generate">Δώσε Συνταγή!</button>
        <div id="cheftes-result"></div>
    </div>
    <?php return ob_get_clean();
}

add_shortcode('cheftes_form', 'cheftes_render_form');

add_action('wp_ajax_generate_recipe', 'cheftes_handle_ajax');
add_action('wp_ajax_nopriv_generate_recipe', 'cheftes_handle_ajax');

function cheftes_handle_ajax() {
    $ingredients = sanitize_text_field($_POST['ingredients']);
    $recipe = cheftes_get_recipe_from_gpt($ingredients);

    if ($recipe) {
        wp_send_json_success(['recipe' => nl2br(esc_html($recipe))]);
    } else {
        wp_send_json_error(['message' => 'Σφάλμα από GPT API']);
    }
}

