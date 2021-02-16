# WP Session Test plugin

Basic setup for using WP Session within a plugin.

## Resources
* [WP Session Manager](https://github.com/ericmann/wp-session-manager)
* [Easy Digital Downloads implementation](https://github.com/easydigitaldownloads/easy-digital-downloads/blob/5cb0bec92e2f8b2e65a567e9a27810e29c9448ed/includes/class-edd-session.php)

## Usage

```php
wstp()->session->set( 'key', 'value' );
```

```php
wstp()->session->get( 'key' );
```