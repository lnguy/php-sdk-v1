## Mobile Connect PHP SDK

This README supercedes any others in this project tree.

## Motivation

Mobile Connect PHP SDK is designed to help developers quickly bootstrap
their own solutions by seeing how it works and what is required.

## Installation

Recommended Setup

-----------------

PHP 5.3.*

Composer 1.0

PHPUnit 4.8.*

Apache 2.*

-----------------

To install the SDK you will need to download and install Composer, visit their
website for more details - https://getcomposer.org/

Change directory into the project locally on your development box.

Check and ensure that you have PHP and Apache (or your favorite web server)
configured to run the mobile-connect-demo on your server. If you wish to have
PHP SDK Demo as your server root, you may configue it thus, as with Apache configuration:

```
DocumentRoot "/local-path/php-sdk-v1/mobile-connect-demo/src/main"
```

## Installing the PHP server side SDK
Standing in the project folder, change directory to mobile-connect-sdk.
Issue the command:

```
php composer.phar install
```

This will import all the dependencies for the server side SDK.

## Installing the PHP client side SDK
Standing in the project folder, change directory to mobile-connect-demo.
Issue the command:

```
php composer.phar install
```

This will import all the dependencies for the client side SDK.

## Usage

Start your webserver

Go to the URL you configured for the PHP SDK Demo

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
