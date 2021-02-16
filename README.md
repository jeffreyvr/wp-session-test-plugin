# WP Session Test plugin

Basic setup for using WP Session within a plugin.

## Resources
* [Easy Digital Downloads implementation](https://github.com/easydigitaldownloads/easy-digital-downloads/blob/5cb0bec92e2f8b2e65a567e9a27810e29c9448ed/includes/class-edd-session.php)
* [WP Session Manager](https://github.com/ericmann/wp-session-manager)

## Usage

```php
wstp()->session->set( 'key', 'value' );
```

```php
wstp()->session->get( 'key' );
```

## Look into
* Only start sessions when needed, take a look at [Easy Digital Downloads](https://github.com/easydigitaldownloads/easy-digital-downloads/blob/master/includes/class-edd-session.php#L339).
* Option to use PHP session instead of WP Session? [See](https://github.com/easydigitaldownloads/easy-digital-downloads/blob/master/includes/class-edd-session.php#L216).