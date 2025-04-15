<?php
namespace Framework\Routes;
final class Router{
    public function route($path){

        $routes= new Routes();
        $route_list = $routes->route_list();
        $separators = ['/','\\'];
    
        $path = DIRECTORY_SEPARATOR . $path;    
    
        foreach ($route_list as $route => $info) {
            $route = str_replace($separators, DIRECTORY_SEPARATOR, $route);
            $route_parts = explode(DIRECTORY_SEPARATOR, trim($route, DIRECTORY_SEPARATOR));
            $path_parts = explode(DIRECTORY_SEPARATOR, trim($path, DIRECTORY_SEPARATOR));
            // echo "\n" . json_encode($route_parts);
            // Skip if the number of parts don't match
            if (count($route_parts) !== count($path_parts)) {
                continue;
            }

            $params = [];
            $match = true;
            $count = 0;
            foreach ($route_parts as $index => $route_part) {
                $count++;
                // Check if it's a dynamic parameter (e.g., {id})
                if (strpos($route_part, '{') === 0 && strpos($route_part, '}') === strlen($route_part) - 1) {
                    // It's a dynamic parameter, so capture it
                    $params[] = $path_parts[$index];
                } else {
                    // echo "\n";
                    // echo $route_part . " " . $path_parts[$index];
                    // echo "\n";
                    // echo count($route_parts) . ' ' . $count;
                    if($route_part == $path_parts[$index] && count($route_parts)==$count){
                        break;
                    }
                    if ($route_part !== $path_parts[$index]) {
                        
                        $match = false;
                        break;
                    }

                }
            }
            // echo "\n Match Status:" . $match;
            // echo "\n" . json_encode($info);
            if($match && isset($info['httpMethods'][$_SERVER['REQUEST_METHOD']])){
                $controllerClass = '\\App\\Controllers\\' . $info['controller'];
                $controller = new $controllerClass();
                $method = $info['httpMethods'][$_SERVER['REQUEST_METHOD']];
                $controller->{$method}(...$params);
                return true;
            }
        }
        return false;
    }
}

