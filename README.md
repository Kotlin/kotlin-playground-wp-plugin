# Kotlin Playground Wordpress Plugin

Allows embedding interactive Kotlin playground to any post via `[kotlin]` [shortcode](https://codex.wordpress.org/Shortcode_API).

![Preview](https://raw.githubusercontent.com/Kotlin/kotlin-playground-wp-plugin/master/preview.gif)

## Installation

1. Download [latest release](https://github.com/Kotlin/kotlin-playground-wp-plugin/releases/download/v0.0.2/kotlin-playground-wp-plugin.zip).
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

### `folded-button="true|false"` (`true` by default)

Hide code snippet with value `false` outside of markers `//sampleStart` and `//sampleEnd`.  

### `platform="java|js|junit|canvas"` (`java` by default)

Creates playground with different target platforms
