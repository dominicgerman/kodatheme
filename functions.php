<?php if (!function_exists('kodatheme_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook.
     */

    function kodatheme_setup()
    {   // Add support for block styles.
        add_theme_support('wp-block-styles');

        // Enqueue editor styles.
        add_editor_style('editor-style.css');


        // Load additional block styles.
        $styled_blocks = [''];
        foreach ($styled_blocks as $block_name) {
            $args = array(
                'handle' => "kodatheme-$block_name",
                'src'    => get_theme_file_uri("assets/css/blocks/$block_name.css"),
                $args['path'] = get_theme_file_path("assets/css/blocks/$block_name.css"),
            );
            wp_enqueue_block_style("core/$block_name", $args);
        }
    }
endif; // myfirsttheme_setup

add_action('after_setup_theme', 'kodatheme_setup');

function koda_styles()
{
    wp_enqueue_style('custom-fonts', 'https://fonts.googleapis.com/css2?family=Raleway:wght@200;400;600&display=swap', array(), null);
    wp_enqueue_style('main-styles', get_template_directory_uri() . 'assets/css/style.css');
}

add_action('wp_enqueue_scripts', 'koda_styles');
