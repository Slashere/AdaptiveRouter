<?php

class Router
{

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {

        $uri = $this->getURI();


        $segments = explode('/', $uri);
        $url = $segments[0];

        if (empty($segments[0])) {
            $controllerName = 'IndexController';
        } else {
            $controllerName = ucfirst(array_shift($segments)) . 'Controller';
        }

        if (empty($segments[0])) {
            $actionName = 'actionIndex';
            array_shift($segments);
        } else {
            $actionName = 'action' . ucfirst(array_shift($segments));
        }

        $parameters = $segments;

        $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
var_dump($controllerName);
        var_dump($actionName);
        var_dump($parameters);
echo '<br>';
        var_dump(method_exists($controllerName,$actionName));
        if (file_exists($controllerFile) && method_exists($controllerName, $actionName)) {
            include_once($controllerFile);
            $controllerObject = new $controllerName;

            $prod_class = new ReflectionClass($controllerName);
            $method = $prod_class->getMethod($actionName);
            $params = $method->getParameters();

            if (count($parameters) === count($params)) {

                $result = call_user_func_array([$controllerObject, $actionName], $parameters);


            } else {

                header("HTTP/1.0 404 Not Found");
                return false;
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            return false;
        }
    }
}