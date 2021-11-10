# SbiTa Core
General tools that common between WpKok products.

## Use and Hooks
Add a new settings:
```php
$sbu_option = new SbitaCoreOptionModel('NEW_OPTION_NAME');
$sbu_option->setDefaultValue('DEFAULT VALUE');
$sbu_option->setDescription('DESCRIPTION');
$sbu_option->setInputType('INPUT TYPE'); // e:text, number, textarea, ...
$sbu_option->setLabel('INPUT LABEL');
$sbu_option->setGroup('CUSTOM SETTINGS');
$sbu_option->add();
```

Add a item to about page:
```php
add_filter('sbu_about_items', function($array){
$array['NEW ITEM'] = 'URL';
return $array;
});
```

Get a option value
```php
$value = sbu_get_option('KEY');
```
