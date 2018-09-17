# Kotlin Playground Wordpress Plugin

Allows embedding interactive Kotlin playground to any post via `[kotlin]` [shortcode](https://codex.wordpress.org/Shortcode_API).

![Preview](https://raw.githubusercontent.com/Kotlin/kotlin-playground-wp-plugin/master/preview.gif)

## Installation

1. Download [latest release](https://github.com/Kotlin/kotlin-playground-wp-plugin/releases/download/v0.0.4/kotlin-playground-wp-plugin.zip).
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

### `min-version="1.2"`

Minimum target Kotlin [compiler version](https://try.kotlinlang.org/kotlinServer?type=getKotlinVersions)

### `auto-indent="true|false"` (`false` by default)

Whether to use the context-sensitive indentation.

### `indent="2|4"` (`4` by default)

How many spaces a block should be indented.

### `theme="idea|darcula|default"`

Editor IntelliJ IDEA themes.

### `version="1.0.7` (latest stable version by default)

Target Kotlin [compiler version](https://try.kotlinlang.org/kotlinServer?type=getKotlinVersions):
