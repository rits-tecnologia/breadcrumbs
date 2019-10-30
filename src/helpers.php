<?php

if (!function_exists('add_crumb')) {
    /**
     * Add a crumb to the breadcrumbs.
     *
     * @param string $title
     * @param string $url
     * @return void
     */
    function add_crumb($title, $url = null)
    {
        app('breadcrumbs')->addNewCrumb($title, $url);
    }
}

if (!function_exists('render_breadcrumbs')) {
    /**
     * Render breadcrumbs.
     *
     * @return void
     */
    function render_breadcrumbs()
    {
        return app('breadcrumbs')->render();
    }
}
