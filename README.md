# Pepsit36/SummernoteBundle
This bundle provides a form type based on Summernote, a WYSWYG editor

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
You must to execute a update of your database for add image's entity.
```command
doctrine:schema:update --force
```

You need to download the package on summernote's website : http://summernote.org/ 
and you can extract it on the folder `YourApp/web/resources/summernote`

Usage
-----

Pepsit36/Summernote bundle provides a formtype. This example form uses it:

```php
class TestFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        ...
        $builder->add('test_content', 'summernote');
        ...

    }
    ...

}
```

You need also to add some twig tags in your templates to import all CSS and JS needed to make summernote work:
```twig
...
{# Pepsit36/Summernote CSS #}
{{ summernote_form_stylesheet(form) }}

{# Pepsit36/Summernote JS #}
{{ summernote_form_javascript(form) }}
```