<?php
class BaseView {
    public $title = '';
    public function requestComponents($name, $data = []) {
        global $route;
        global $viewApp;
        
        extract($data);
        
        $path = str_replace('.', DIRECTORY_SEPARATOR, $name);
        
        $adminPath = $route->isAdminPage ? 
            join(DIRECTORY_SEPARATOR, ['admin', $route->adminLevel]) : 
            'clients';
            
        $componentPath = join(DIRECTORY_SEPARATOR, [
            '.',
            $adminPath,
            'views',
            "{$path}.php"
        ]);
        
        if (!file_exists($componentPath)) {
            die("Component not found: " . $componentPath . "\nCurrent dir: " . getcwd());
        }
        
        include($componentPath);
    }

    public function requestView($name, $data = []) {
        global $route;
        global $viewApp;
        $data['title'] = $this->title;
        
        extract($data);
        
        $name = str_replace('.', DIRECTORY_SEPARATOR, $name);
        
        $adminPath = $route->isAdminPage ? 
            join(DIRECTORY_SEPARATOR, ['admin', $route->adminLevel]) : 
            'clients';
            
        $viewPath = join(DIRECTORY_SEPARATOR, array('.', $adminPath, 'views', "{$name}.php"));
        
        if (!file_exists($viewPath)) {
            die("View file not found: " . $viewPath);
        }
        
        include(join(DIRECTORY_SEPARATOR, array('.', $adminPath, 'views', "layout", "header.php")));
        include($viewPath);
        include(join(DIRECTORY_SEPARATOR, array('.', $adminPath, 'views', "layout", "footer.php")));
    }
}
?>