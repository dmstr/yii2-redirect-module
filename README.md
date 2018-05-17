Yii2 - Redirect module
======================

[![Latest Stable Version](https://poser.pugx.org/dmstr/yii2-redirect-module/v/stable.svg)](https://packagist.org/packages/dmstr/yii2-redirect-module) 
[![Total Downloads](https://poser.pugx.org/dmstr/yii2-redirect-module/downloads.svg)](https://packagist.org/packages/dmstr/yii2-redirect-module)
[![License](https://poser.pugx.org/dmstr/yii2-redirect-module/license.svg)](https://packagist.org/packages/dmstr/yii2-redirect-module)

Module to easy handle redirects from your backend

Simply install via composer, update your config as below and go to `/redirects` in your application to manage redirects.

> Note: This module does not redirect if application is in test mode (`YII_ENV = test`), eg. for functional testing. 
> The module will initialize itself in the bootstrap process. No need to add it as a module unless you want to change the configuration of the module

```
...
'bootstrap' => [
    'redirects'
]
...
```