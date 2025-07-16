jQuery(document).ready(function($) {
    $('#cheftes-generate').on('click', function() {
        const ingredients = $('#cheftes-ingredients').val();
        $('#cheftes-result').html('🌀 Φτιάχνουμε τη συνταγή...');

        $.post(cheftes_ajax.ajax_url, {
            action: 'generate_recipe',
            ingredients: ingredients
        }, function(response) {
            if (response.success) {
                $('#cheftes-result').html(response.data.recipe);
            } else {
                $('#cheftes-result').html('⚠️ Σφάλμα: ' + response.data.message);
            }
        });
    });
});
