# Kotlin Playground Wordpress Plugin

Allows to embed interactive Kotlin playground to any post via `[kotlin]` [shortcode](https://codex.wordpress.org/Shortcode_API).

**[Preview](https://raw.githubusercontent.com/Kotlin/kotlin-playground-wp-plugin/master/preview.gif)**

## Installation

1. Download `kotlin-playground-wp-plugin.zip` from latest release from [releases page](https://github.com/Kotlin/kotlin-playground-wp-plugin/releases).
2. Go to WordPress `Admin Panel -> Plugins -> Add New`, choose `Upload Plugin`, select file from your computer and press `Install now`.

## Usage

Use `[kotlin]code...[/kotlin]` shortcode as usual. Example:

```
[kotlin]
fun main(args: Array<String>) {
  print("Hello, World!")
}
[/kotlin]
```

## Options 

### `runnable="true|false"` (`true` by default)

Creates read-only playground without ability to edit and run code. Example `[kotlin runnable="false"]code...[/kotlin]`.