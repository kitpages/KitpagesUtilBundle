KitpagesUtilBundle
==================

Only little methods for common problems :
- create directories recursively
- send a file to the browser for a download, sending an image or so what
- ...

Actually I believe nobody will be interested in including this Bundle in it's project.

It is used mainly by the KitpagesCmsBundle.

WARNING, works only on unix/linux systems.

Installation
------------
put the code in vendors/Kitpages/FileBundle

add vendors/ in the app/autoload.php

add the new Bundle in app/appKernel.php

Then you can use the service which is named kitpages.util

User's guide
------------

Let's say you are in a controller

    $util = $this->get('kitpages.util');
    // create recursively a directory
    $util->mkdirr("/tmp/test/foo/bar");
    // delete recursively the test directory
    $util->rmdirr("/tmp/test");
    // send a jpg image to the browser with a 3600 expire time
    $util->getFile("/tmp/toto.jpg", 3600)
