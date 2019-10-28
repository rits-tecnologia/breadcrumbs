<?php

namespace Rits\Breadcrumbs\Concerns;

trait HasHtmlAttributes
{
    /**
     * HTML attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Set the attribute value.
     *
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function setAttribute($key, $value)
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    /**
     * Builds as html attributes.
     *
     * @return string
     */
    protected function buildAttributes()
    {
        $attributes = [];

        foreach ($this->attributes as $attribute => $value) {
            $attributes[] =
                sprintf('%s="%s"', $attribute, addcslashes($value, '"'));
        }

        return implode(' ', $attributes);
    }
}
