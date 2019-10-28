<?php

namespace Rits\Breadcrumbs;

use Rits\Breadcrumbs\Concerns\HasHtmlAttributes;

class Crumb
{
    use HasHtmlAttributes;

    /**
     * Label for the crumb.
     *
     * @var string
     */
    protected $title;

    /**
     * Where the crumb should point to.
     *
     * @var string
     */
    protected $url;

    /**
     * Crumb constructor.
     *
     * @param string $title
     * @param string $url
     */
    public function __construct($title, $url = null)
    {
        $this->title = $title;
        $this->url = $url;
    }

    /**
     * Render the crumb.
     *
     * @return string
     */
    public function render($bold = false)
    {
        $title = $this->title;
        $url = $this->url;

        if ($bold) {
            if (isset($this->attributes['class'])) {
                $this->attributes['class'] .= ' active';
            } else {
                $this->attributes['class'] = 'active';
            }
        }

        $attributes = $this->attributes ? ' ' . $this->buildAttributes() : '';

        $anchor = $bold ? $title : sprintf('<a href="%s">%s</a>', $url, $title);

        $item = sprintf('<li%s>%s</li>', $attributes, $anchor);

        return $item;
    }
}
