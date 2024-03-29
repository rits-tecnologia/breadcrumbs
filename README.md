<img src="https://rits.dev/wp-content/themes/rits/assets/imgs/logotipo-2.png" width="80px"></img>

# Rits Breadcrumbs

Breadcrumbs for Laravel Application.

## How to install

Install the package in your project, using the follow command:

```bash
composer require rits/breadcrumbs
```

If the command above dont find the package, you need to add this repo url to your `composer.json`. Look:

```json
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/rits-tecnologia/breadcrumbs"
  }
]
```

So you can execute the `composer require` command above.

## How to use

### Adding crumbs

On your controller, add the follow code:

```php
public function __construct()
{
    ...
    add_crumb('Resource', '/resources')
    ...
}
```

This starts the breadcrumbs for your controller with the first breadcrumb item.

So you can add others crumbs on other methods.

For example:

```php
public function show($id)
{
    ...
    add_crumb('Show', '/resources/' . $id);
    ...
}
```

### Rendering

To render crumbs in your view, simply add the following helper to your blade file:

```html
<div class="breadcrumbs">
  {!! render_breadcrumbs() !!}
</div>
```

This will render a `ul` with a `li` for each crumb.
