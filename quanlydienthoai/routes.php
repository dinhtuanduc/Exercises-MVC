<?php
class Route{
    public function run(){
        $controller = ucfirst(isset($_REQUEST['controller']) ? $_REQUEST['controller'] : 'product').'Controller';
        $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
        $model = new $controller();
        $model->$action();
    }
}