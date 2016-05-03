<?php

namespace App\Services;

use DOMDocument;
use DOMXPath;
use Exception;
use File;
use Request;
use Route;

class Breadcrumb
{
    /**
     * @var \DOMXPath
     */
    protected $xpath;

    /**
     * Constructor
     */
    public function __construct()
    {
        $domDocument = new DOMDocument;
        $domDocument->preserveWhiteSpace = FALSE;
        $xml = File::get(app_path() . '/Http/breadcrumb.xml');
        $domDocument->loadXML($xml);
        $xpath = new DOMXPath($domDocument);
        $this->xpath = $xpath;
    }

    /**
     * Returns a Breadcrumb for the current view
     *
     * @return string
     */
    public function make()
    {
        try{
            $route = $this->getCurrentRoute();
        }catch(Exception $e){
            return $e->getMessage();
        }

        $routeWithParents = $this->getRouteWithParents($route);

        $breadcrumb = $this->buildBreadcrumb($routeWithParents);

        return $breadcrumb;
    }

    /**
     * Returns the current route DOMXPath
     *
     * @return \DOMXPath
     */
    protected function getCurrentRoute()
    {
        $routeName = Route::currentRouteName();

        $query = "//route[@name='{$routeName}']";

        $routes = $this->xpath->query($query);

        if( ! $routes->length ) {
            throw new Exception("La ruta {$routeName} no se encuentra registrada en breadcrumb.xml");
        }

        return $routes->item(0);
    }

    /**
     * Returns the current route DOMXPath and its parents
     *
     * @param  \DOMXPath  $route
     * @return array
     */
    protected function getRouteWithParents($route)
    {
        $routeWithParents = [];

        array_unshift($routeWithParents, [
            'url' => FALSE,
            'icon' => $route->getAttribute('icon'),
            'label' => $route->getAttribute('label'),
            'active' => TRUE,
        ]);

        $parentRoute = $route->parentNode;

        while( $parentRoute->tagName == 'route' ){
            $routeUrl = $this->getRouteUrl($parentRoute);

            array_unshift($routeWithParents, [
                'url' => $routeUrl,
                'icon' => $parentRoute->getAttribute('icon'),
                'label' => $parentRoute->getAttribute('label'),
                'active' => FALSE,
            ]);

            $parentRoute = $parentRoute->parentNode;
        }

        return $routeWithParents;
    }

    /**
     * Returns the url for the route
     *
     * @param  \DOMXPath  $route
     * @return array
     */
    protected function getRouteUrl($route)
    {
        if($route->getAttribute('name') == ''){
            return FALSE;
        }

        if($route->getAttribute('params') != ''){
            $routeParams = explode(',', $route->getAttribute('params'));

            $bindings = [];
            
            foreach ($routeParams as $routeParam) {
                $bindings[] = Request::route()->parameter($routeParam);
            }

            return route($route->getAttribute('name'), $bindings);
        }

        return route($route->getAttribute('name'));
    }

    /**
     * Returns the Breadcrumb
     *
     * @param  array  $routeWithParents
     * @return string
     */
    protected function buildBreadcrumb($routeWithParents)
    {
        $breadcrumb = '';

        $breadcrumb .= '<ol class="breadcrumb">';

        foreach ($routeWithParents as $route) {
            $class = ($route['active'] or ! $route['url']) ? 'active' : '';

            if ($route['url']) {
                $breadcrumb .= "
                    <li class='{$class}'>
                        <a href='{$route['url']}'>
                            <i class='{$route['icon']}'></i>
                            {$route['label']}
                        </a>
                    </li>
                ";
            } else {
                $breadcrumb .= "
                    <li class='{$class}'>
                        <i class='{$route['icon']}'></i>
                        {$route['label']}
                    </li>
                ";
            }
        }

        $breadcrumb .= '</ol>';

        return $breadcrumb;
    }
}
