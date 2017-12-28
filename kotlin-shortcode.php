<?php

namespace Kotlin\KotlinPlaygroundWordpressPlugin;

class KotlinShortcode
{
    const KOTLIN_RUNCODE_URL = 'https://unpkg.com/kotlin-runcode@1/dist/runcode.min.js';

    const SHORTCODE_NAME = 'kotlin';

    private $isShortcodeWasUsed = false;

    public function __construct()
    {
        $shortcodeName = self::SHORTCODE_NAME;

        // Remove autop in shortcode
        remove_filter('the_content', 'wpautop');
        add_filter('the_content', 'wpautop', 99);
        add_filter('the_content', 'shortcode_unautop', 100);

        // Remove autotypographer in shortcode
        add_filter('no_texturize_shortcodes', function($shortcodes) use ($shortcodeName) {
            $shortcodes[] = $shortcodeName;
            return $shortcodes;
        });

        add_shortcode($shortcodeName, array($this, 'doShortcode'));
    }

    public function doShortcode($attributes, $content = null) {
        if (!$this->isShortcodeWasUsed) {
            $this->isShortcodeWasUsed = true;
            // Render KotlinRuncode init code in footer
            $initJS = self::renderInitJs();
            add_action('wp_footer', function() use ($initJS) {
                echo $initJS;
            }, 100);
        }

        $attrs = shortcode_atts(array(
            'runnable' => true
        ), $attributes);

        $dataAttrs = array();

        if ($attrs['runnable'] === 'false') {
            $dataAttrs[] = 'data-highlight-only="true"';
        }

        $dataAttrsString = join(' ', $dataAttrs);
        $encoded = htmlspecialchars($content);

        return '<pre class="kotlin-code" '. $dataAttrsString .' style="visibility: hidden; padding: 36px 0;">'. $encoded .'</pre>';
    }

    public static function renderInitJs() {
        $src = self::KOTLIN_RUNCODE_URL;
        $content = <<<HTML
<script src="$src"></script>
<script>
(function() {
  if (window.KotlinRunCode) {
    window.KotlinRunCode('.kotlin-code');
  }
})();
</script>
HTML;

        return $content;
    }
}