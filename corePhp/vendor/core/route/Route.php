<?php

class Route {
    private static $routes = [];
    private static $notFound;

    public function __construct() {
        self::resolve();
    }

    public static function page( $uri, $callback, $name ) {

        if (array_key_exists($name, self::$routes)) {

            print("<p style='color:red;'>Route Name Already Exist . Please change the Name <b style='color: red;'>{$name}</b> To a different One</p>");
            error_trace();
        }else{

            self::$routes[$name] = [
                'uri' => $uri,
                'callback' => $callback,
                'name' => $name
            ];

        } 

        
    }

    public static function notFound($callback) {
        self::$notFound = $callback;
    }

    public static function resolve() {

        $requestUri = explode('?', $_SERVER['REQUEST_URI'])[0]; // Ignore query params
            
        // pr( route_url() );

        foreach (self::$routes as $route) {
            // pr( $route );

            if ( route_url() === $route['uri'] ) {

                call_user_func($route['callback']);
                return;
            }
        }

        if (self::$notFound) {
            call_user_func(self::$notFound);
        }
        
    }

    # Get The Route Using Route Name
    public static function route($name) {
        // pr(self::$routes);
        if (isset(self::$routes[$name])) {
            return self::$routes[$name]["uri"];
        } else {
            echo "<p style='color:red;'>Route Name:->{ {$name} } Not Found</p>";
            error_trace();
        }
    }

    public static function route_list(){
        return self::$routes;
    }

}

# Wrtite a Route Helper Function
function route($name, $print = true) {
    $res = Route::route($name);
    if ($print) {
        echo $res;
    } else {
        return $res;
    }
}

function route_list(){
    return Route::route_list();
}
