Yii2 - Redirect module
======================

Module to easy handle domain or path redirects from your backend

Simply install via composer and go to `http://my-domain.de/redirects` to manage redirects.

> Note: This module does not redirect in `YII_ENV_TEST`, eg. for functional testing. 

## Path redirects

**Example**

From Path: `/press`

To Path: `/de/press-3.html`

Status Code: `301 or 302`


## Domain redirects

**Example**

From Domain: `http://my-domain.de`

To Domain: `http://www.google.de`

Status Code: `301 or 302`