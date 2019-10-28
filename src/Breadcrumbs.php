<?php

namespace Rits\Breadcrumbs;

use Illuminate\Support\Collection;
use Rits\Breadcrumbs\Concerns\HasHtmlAttributes;

class Breadcrumbs
{
    use HasHtmlAttributes;

    /**
     * Full path of crumbs.
     *
     * @var Collection|Crumb[]
     */
    protected $path;

    /**
     * Breadcrumb constructor.
     */
    public function __construct()
    {
        $this->path = new Collection();
    }

    /**
     * Creates and add a crumb to the path.
     *
     * @param string $title
     * @param string $url
     * @return $this
     */
    public function addNewCrumb($title, $url = null)
    {
        $this->path->push($this->createCrumb($title, $url));

        return $this;
    }

    /**
     * Adds a crumb to the path.
     *
     * @param Crumb $crumb
     * @return $this
     */
    public function addCrumb(Crumb $crumb)
    {
        $this->path->push($crumb);

        return $this;
    }

    /**
     * Creates a new crumb.
     *
     * @param string $title
     * @param string $url
     * @return Crumb
     */
    protected function createCrumb($title, $url = null)
    {
        return (new Crumb($title, $url))->setAttribute('class', 'breadcrumb-item');
    }

    /**
     * Render the breadcrumb path.
     *
     * @return string
     */
    public function render()
    {
        $attributes = $this->attributes ? ' ' . $this->buildAttributes() : '';

        $items = $this->path->map(function (Crumb $crumb) {
            return $crumb->render($this->path->last() == $crumb);
        })->implode('');

        $list = sprintf('<ul%s>%s</ul>', $attributes, $items);

        return $list;
    }
}
