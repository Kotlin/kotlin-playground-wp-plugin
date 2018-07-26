<?php

namespace Kotlin\KotlinPlaygroundWordpressPlugin;

class KotlinShortcode
{
    const KOTLIN_PLAYGROUND_CND_URL = 'https://unpkg.com/kotlin-playground@1';

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
            'runnable' => true,
            'platform' => "java",
            'theme' => "idea",
            'version' => "",
            'indent' => "4",
            'auto-indent' => true,
            'folded-button' => true
        ), $attributes);

        $dataAttrs = array();

        if ($attrs['folded-button'] === 'false') {
            $dataAttrs[] = 'folded-button="false"';
        }

        if ($attrs['runnable'] === 'false') {
            $dataAttrs[] = 'data-highlight-only="true"';
        }

        if ($attrs['auto-indent'] === 'false') {
            $dataAttrs[] = 'auto-indent="false"';
        }

        if ($attrs['version']) {
            $dataAttrs[] = 'data-version="'.$attrs['version'].'"';
        }

        switch ($attrs['platform']) {
            case "js":
                $dataAttrs[] = 'data-target-platform="js"';
                break;
            case "canvas":
                $dataAttrs[] = 'data-target-platform="canvas"';
                break;
            case "junit":
                $dataAttrs[] = 'data-target-platform="junit"';
                break;
        }

        switch ($attrs['theme']) {
            case "idea":
                $dataAttrs[] = 'theme="idea"';
                break;
            case "darcula":
                $dataAttrs[] = 'theme="darcula"';
                break;
        }

        switch ($attrs['indent']) {
            case "4":
                $dataAttrs[] = 'indent="4"';
                break;
            case "2":
                $dataAttrs[] = 'indent="2"';
                break;
        }

        $dataAttrsString = join(' ', $dataAttrs);
        $encoded = htmlspecialchars(html_entity_decode($content));

        return '<pre class="kotlin-code" '. $dataAttrsString .' style="visibility: hidden; padding: 36px 0;">'. $encoded .'</pre>';
    }

    public static function renderInitJs() {
        $src = self::KOTLIN_PLAYGROUND_CND_URL;
        $content = <<<HTML
<script src="$src"></script>
<script>
(function() {
  if (window.KotlinPlayground) {
    window.KotlinPlayground('.kotlin-code');
  }
})();
</script>
HTML;

        return $content;
    }
}