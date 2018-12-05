# Form Utilities
Form Utilities - token security | validation | processing
### Installation
Install using composer `php composer.phar install`
### Usage
```php
<?php
    // Load the library
    require __DIR__.'/vendor/autoload.php';
    use \FormLib\FormUtilities;
    
    // Generate field token inside form tag
    <?php FormUtilities::generateFormToken(); ?>
    
    // Validation scripts
    <script src="https://unpkg.com/imask"></script>
    <script src="js/validate.js"></script>
    
    // Verify token in form action script
    FormUtilities::verifyToken();
    echo 'If ok proceed';
```