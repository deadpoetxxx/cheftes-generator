<?php
function cheftes_get_recipe_from_gpt($ingredients) {
    $api_key = get_option('cheftes_api_key');
    if (!$api_key) return false;

    $prompt = "Δώσε μου μια ελληνική συνταγή με τα εξής υλικά: $ingredients. Περιέλαβε τίτλο, υλικά, οδηγίες.";

    $response = wp_remote_post('https://api.openai.com/v1/chat/completions', [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $api_key
        ],
        'body' => json_encode([
            'model' => 'gpt-4',
            'messages' => [['role' => 'user', 'content' => $prompt]],
            'temperature' => 0.7
        ])
    ]);

    if (is_wp_error($response)) return false;

    $data = json_decode(wp_remote_retrieve_body($response), true);
    return $data['choices'][0]['message']['content'] ?? false;
}
