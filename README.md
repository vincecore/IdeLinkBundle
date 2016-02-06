This bundle will fix the file paths in links to your IDE when using a VM. See http://symfony.com/doc/current/reference/configuration/framework.html#ide. All it does is allowing you to define the "wrong path" and replacing it with the "correct path".

## Installation
### Step 1: Download using composer

``` bash
$ php composer.phar require vincecore/ide-link-bundle "dev-master" --dev
```

Composer will install the bundle to your project's `vendor/vincecore` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    if (in_array($this->getEnvironment(), array('dev', 'test'))) {
        $bundles[] = new Vincecore\IdeLinkBundle\VincecoreIdeLinkBundle();
    }
}
```

### Step 3: Configure parameters

``` yml
// app/config/parameters.yml.dist
# This file is a "template" of what your parameters.yml file should look like
parameters:
    //
    ide_link.wrong_path: ~
    ide_link.correct_path: ~
    
// app/config/parameters.yml (example)
parameters:
    //
    ide_link.wrong_path: "/vagrant"
    ide_link.correct_path: "/Users/john/projects/acme"
    
```

### Step 4: Configure Symfony (phpstorm example)
See http://symfony.com/doc/current/reference/configuration/framework.html#ide
``` yml
// app/config/config.yml
framework:
    //
    ide: "phpstorm://open?file=%%f&line=%%l"
```
