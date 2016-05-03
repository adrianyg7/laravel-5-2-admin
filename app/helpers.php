<?php

/*
 * http://www.ltconsulting.co.uk/laravel-4-using-request-is-named-routes/
 * 
 * You can check the current URI against 1 named route:
 * {{ route_is('user.index') }}
 * 
 * A named route with one or more parameters:
 * {{ route_is(['user.show', $user->id]) }}
 * 
 * A named route with a wildcard:
 * {{ route_is(['user.show', '*']) }}
 * 
 * And of course, multiple named routes:
 * {{ route_is('user.index', ['user.show', $user->id]) }}
 * 
 */
if( ! function_exists('route_is') )
{
    /**
     * Alias for Request::is(route(...))
     *
     * @return boolean
     */
    function route_is()
    {
        $args = func_get_args();
        foreach($args as &$arg)
        {
            if(is_array($arg))
            {
                $route = array_shift($arg);
                $asterisk = $arg[0] == '*';
                $arg = ltrim(route($route, $arg, false), '/');

                if($asterisk){
                    $arg = preg_replace("/[\?]/", "", $arg); 
                    $arg = substr($arg, -1) !== '*' ? $arg . '*' : $arg;
                }
                
                continue;
            }
            $arg = ltrim(route($arg, [], false), '/');
        }

        return call_user_func_array([app('request'), 'is'], $args);
    }
}

if( ! function_exists('active_if') )
{
    /**
     * Alias for Request::is(route(...)) ? 'active' : ''
     *
     * @return string
     */
    function active_if()
    {
        return call_user_func_array('route_is', func_get_args()) ? 'active' : '';
    }
}

if( ! function_exists('flash') )
{
    /**
     * Flashes a message or returns Session instance
     *
     * @param  string|null $message
     * @return mixed
     */
    function flash($message = null)
    {
        $flash = app('App\Services\Flash');

        if ( is_null($message) ) {
            return $flash;
        }

        return $flash->success($message);
    }
}
