= Sixreps Sample Application

Sample application using Sixreps API. This sample build using some of another library such as [Yii-bootstrap](http://www.cniska.net/yii-bootstrap/), [jQuery](http://jquery.com/), etc.

== Requirement

* Webserver (already tested with Apache, Litespeed, and NGINX)
* PHP v5.2 or higher.
* Yii Framework v1.1.x
* Application ID and Application Secret from Sixreps Developer site (http://developers.sixreps.com/).
* Cup of coffee or tea (I prefered tea) :grin:

== Installation

Please make sure you have download Yii Framework and extract it on your drive, you can extract it anywhere even outside your htdocs or www folder, as long as we can include them (there is a lot of any explanation about this at http://www.yiiframework.com/doc/), please rename this following files :

* index.php.default -> index.php
* protected/config/main.php.default -> protected/config/main.php

Dump ``protected/data/sixreps_user_token.sql`` to your MySQL. This is what you need to do for index.php file :

* Make sure Yii folder path is directed to Yii framework on your local drive.

This is what you need to do for main config file :

* Change your DB connection information
* Put your APP_ID and APP_SECRET that provided from Sixreps Developer Site.

== Copyright

This sample app is released in MIT License.

Copyright (c) 2012 Sixreps Inc.

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

Copyright (c) 2012 Sixreps Inc. See MIT-LICENSE for further details.