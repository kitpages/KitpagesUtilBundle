KitpagesUtilBundle
==================

Only little methods for common problems :
- create directories recursively
- send a file to the browser for a download, sending an image or so what
- ...

Actually I believe nobody will be interested in including this Bundle in it's project. This bundle is globally deprecated.

It is used mainly by the KitpagesCmsBundle.

WARNING, works only on unix/linux systems.

Installation
------------

If you are using `DEPS` :
    
    [KitpagesUtilBundle]
        git=https://github.com/kitpages/KitpagesUtilBundle.git
        target=/bundles/Kitpages/UtilBundle

Add `Kitpages` namespace to your autoloader :

``` php
<?php // app/autoload.php

$loader->registerNamespaces(array(
    // ...
    'Kitpages' => __DIR__.'/../vendor/bundles',
));
```

Enable the bundle in your kernel :

``` php 
<?php // app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Kitpages\UtilBundle\KitpagesUtilBundle(),
    );
}
```

Then you can use the service which is named `kitpages.util`

User's guide
------------

Let's say you are in a controller

``` php
<?php

$util = $this->get('kitpages.util');
// create recursively a directory
$util->mkdirr("/tmp/test/foo/bar");
// delete recursively the test directory
$util->rmdirr("/tmp/test");
// send a jpg image to the browser with a 3600 expire time
$util->getFile("/tmp/toto.jpg", 3600)
```
