# Mobile Connect PHP SDK Demo

## Motivation

Mobile Connect PHP SDK Demo is designed to help developers quickly bootstrap
their own solutions by seeing how it works and what is required. Demo code is only for example purposes.

## Recommended Setup
- PHP 5.3.*
- Composer 1.0
- PHPUnit 4.8.*
- Apache 2.*

## Installing the PHP client side SDK
To install the demo you will need to download and install Composer, visit their
website for more details - https://getcomposer.org/

Execute the following to add the packagist link to your composer.json and complete the
installation:

```
php composer.phar install
```

Check and ensure that you have PHP and Apache (or your favorite web server)
configured to run the mobile-connect-demo on your server. If you wish to have
PHP SDK Demo as your server root, you may configue it thus, as with Apache configuration:

```
DocumentRoot "/local-path/php-sdk-v1/mobile-connect-demo/src/main"
```

## Usage
- Start your webserver
- Go to the URL you configured for the PHP SDK Demo

Your page should load and the application will run against Developer Portal Sandbox
with default credentials.

You can change credentials to yours in:
/local-path/php-sdk-v1/mobile-connect-demo/src/main/utils/App.php

```php
$mobileConnectConfig->setClientId("610df4ff-1c6a-407b-b728-7a30d91993e4");
$mobileConnectConfig->setClientSecret("486e45fe-a43e-43b2-abb2-388b80d08b0c");
$mobileConnectConfig->setApplicationURL("http://mobile.connect.demo/authorisation-redirect.php");
$mobileConnectConfig->setDiscoveryURL("http://discovery.sandbox2.mobileconnect.io/v2/discovery");
$mobileConnectConfig->setDiscoveryRedirectURL("http://mobile.connect.demo/discovery-redirect.php");
```
## Support

Any issues, please send us a message here: https://developer.mobileconnect.io/content/contact-us

Enjoy using Mobile Connect!