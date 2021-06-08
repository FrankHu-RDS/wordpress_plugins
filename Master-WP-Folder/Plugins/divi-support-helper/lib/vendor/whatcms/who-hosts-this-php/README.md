# Who-Hosts-This PHP API
A simple PHP wrapper for Who-Hosts-This API calls

- [API Documentation](https://www.who-hosts-this.com/API)
- [Get API Key](https://www.who-hosts-this.com/Subscriptions)
- [who-hosts-this.com](https://www.who-hosts-this.com)


## Installation

We recommended installing who-hosts-this-php through [Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of Who-Hosts-This:

```bash
php composer.phar require whatcms/who-hosts-this-php
```

Once installed, you can use the WhoHostsThis class to fetch results:

```php
require 'vendor/autoload.php';

$key = 'Your API Key';
$detector = new \WhoHostsThis\WhoHostsThis($key);
$check_url = 'en.wikipedia.org';

$result	 = $detector->CheckUrl($check_url);
print_r($result)
```

