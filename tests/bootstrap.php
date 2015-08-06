<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

call_user_func(function() {
    if ( ! is_file($autoloadFile = __DIR__.'/../vendor/autoload.php')) {
        throw new \RuntimeException('Did not find vendor/autoload.php. Did you run "composer install --dev"?');
    }

    AnnotationRegistry::registerAutoloadNamespace('JMS\\Serializer\\Annotation', __DIR__.'/../vendor/jms/serializer/src');

    require $autoloadFile;
});
