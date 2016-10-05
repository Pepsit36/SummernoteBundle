# Pepsit36/SummernoteBundle
This bundle provides a form type based on Summernote, a WYSIWYG editor. (A CKEditor and TinyMCE alternative and Open Source).

Proudly develop by [Sébastien Duplessy](https://www.duplessy.eu).

[![Build Status](https://travis-ci.org/Pepsit36/SummernoteBundle.svg?branch=master)](https://travis-ci.org/Pepsit36/SummernoteBundle)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/d8c5fa10-ac58-405c-97d4-d5e17371c221/mini.png)](https://insight.sensiolabs.com/projects/d8c5fa10-ac58-405c-97d4-d5e17371c221)
[![Latest Stable Version](https://poser.pugx.org/pepsit36/summernotebundle/v/stable)](https://packagist.org/packages/pepsit36/summernotebundle)
[![Total Downloads](https://poser.pugx.org/pepsit36/summernotebundle/downloads)](https://packagist.org/packages/pepsit36/summernotebundle)
[![Latest Unstable Version](https://poser.pugx.org/pepsit36/summernotebundle/v/unstable)](https://packagist.org/packages/pepsit36/summernotebundle)
[![License](https://poser.pugx.org/pepsit36/summernotebundle/license)](https://packagist.org/packages/pepsit36/summernotebundle)

Requirements
------------
Minimum requirements for this bundle:
- Symfony 2.3
- Twitter Bootstrap 3.0
- JQuery 1.9

Installation
------------
Add Pepsit36/SummernoteBundle to your application's `composer.json` file
```json
{
    "require": {
        "pepsit36/summernotebundle": "dev-master"
    }
}
```

Add Pepsit36/SummernoteBundle to your application's `AppKernel.php` file
```php
new Pepsit36\SummernoteBundle\Pepsit36SummernoteBundle(),
```

Add routing information to your application's `routing.yml`:
```yml
pepsit36_summernote:
    resource: "@Pepsit36SummernoteBundle/Resources/config/routing.yml"
    prefix:   /
```

Minimal Configuration
---------------------
You must to execute a update of your database to add images' entity.
```command
doctrine:schema:update --force
```

You need to download the package on summernote's website : http://summernote.org/ 
and you can extract his `dist` folder on the folder `YourApp/web/resources/summernote`

Additional Configuration
------------------------
Pepsit36/Summernote supports some configuration parameters. These parameters can be configured in config.yml.

* **width**: This is the width of Summernote widget (default: 0)
```yml
pepsit36_summernote:
    ...
    width: 0
```

* **height**: This is the height of Summernote widget.
```yml
pepsit36_summernote:
    ...
    height: 0
```

* **focus**: This will focus editable area after initializing Summernote widget.
```yml
pepsit36_summernote:
    ...
    focus: false
```

* **toolbar**: This will configure the toolbar of Summernote widget.
```yml
pepsit36_summernote:
    ...
    toolbar:
        - { name: 'style', buttons: ['style'] }
        - { name: 'fontsize', buttons: ['fontsize'] }
        - { name: 'font', buttons: ['bold', 'italic', 'underline', 'clear'] }
        - { name: 'fontname', buttons: ['fontname'] }
        - { name: 'color', buttons: ['color'] }
        - { name: 'para', buttons: ['ul', 'ol', 'paragraph'] }
        - { name: 'height', buttons: ['height'] }
        - { name: 'table', buttons: ['table'] }
        - { name: 'insert', buttons: ['link', 'picture', 'hr'] }
        - { name: 'view', buttons: ['fullscreen', 'codeview'] }
        - { name: 'help', buttons: ['help'] }
```

* **styleTags**: This will configure the style tags available for Summernote widget.
```yml
pepsit36_summernote:
    ...
    styleTags: ['p', 'blockquote', 'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6']
```

* **fontNames**: This will configure the font names available for Summernote widget.
```yml
pepsit36_summernote:
    ...
    fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande', 'Tahoma', 'Times New Roman', 'Verdana']
```

* **fontSizes**: This will configure the font sizes available for Summernote widget.
```yml
pepsit36_summernote:
    ...
    fontSizes : ['8', '9', '10', '11', '12', '14', '18', '24', '36']
```

* **colors**: This will configure the colors available for Summernote widget.
```yml
pepsit36_summernote:
    ...
    colors:
        - ['#000000', '#424242', '#636363', '#9C9C94', '#CEC6CE', '#EFEFEF', '#F7F7F7', '#FFFFFF']
        - ['#FF0000', '#FF9C00', '#FFFF00', '#00FF00', '#00FFFF', '#0000FF', '#9C00FF', '#FF00FF']
        - ['#F7C6CE', '#FFE7CE', '#FFEFC6', '#D6EFD6', '#CEDEE7', '#CEE7F7', '#D6D6E7', '#E7D6DE']
        - ['#E79C9C', '#FFC69C', '#FFE79C', '#B5D6A5', '#A5C6CE', '#9CC6EF', '#B5A5D6', '#D6A5BD']
        - ['#E76363', '#F7AD6B', '#FFD663', '#94BD7B', '#73A5AD', '#6BADDE', '#8C7BC6', '#C67BA5']
        - ['#CE0000', '#E79439', '#EFC631', '#6BA54A', '#4A7B8C', '#3984C6', '#634AA5', '#A54A7B']
        - ['#9C0000', '#B56308', '#BD9400', '#397B21', '#104A5A', '#085294', '#311873', '#731842']
        - ['#630000', '#7B3900', '#846300', '#295218', '#083139', '#003163', '#21104A', '#4A1031']
```

Usage
-----
Pepsit36/Summernote bundle provides a formtype. This example form uses it:

```php
class TestFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        ...
        $builder->add('test_content', SummernoteType::class);
        ...

    }
    ...

}
```

You also need to add some twig tags in your templates to import all CSS and JS needed to make summernote work:
```twig
...
{# Pepsit36/Summernote CSS #}
{{ summernote_form_stylesheet() }}

{# Pepsit36/Summernote JS #}
{{ summernote_form_javascript() }}
```
