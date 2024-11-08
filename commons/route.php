<?php

class Route {
    public $url;
    public $method;
    public $query;
    public $form;
    public $isAdminPage;
    public $adminLevel;

    public function __construct() {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->query = (object)$_GET;
        $this->form = (object)$_POST;

        $this->isAdminPage = $this->isAdmin();
        $this->adminLevel = $this->getAdminLevel();
    }

    public function hasQuery($name): bool {
        return property_exists($this->query, $name);
    }

    public function hasFormField($name): bool {
        return property_exists($this->form, $name);
    }

    public function redirectAdmin($action = '', $query = []) {
        $level = $this->adminLevel ?? 'hotel';
        $query['level'] = $level;
        header("location: " . $this->getLocateAdmin($action, $query));
    }

    public function redirectClient($action = '', $query = []) {
        header("location: " . $this->getLocateClient($action, $query));
    }
    
    public function getLocateAdmin($action = '', $query = []) {
        $level = $query['level'] ?? 'hotel';
        if ($action === '') return BASE_URL . "?mode=admin&level={$level}";
        
        $url = BASE_URL . "?mode=admin&level={$level}&act={$action}";
        unset($query['level']);

        if (!empty($query)) {
            $queryString = http_build_query($query);
            $url .= '&' . $queryString;
        }

        return $url;
    }
    
    public function getLocateClient($action = '', $query = []) {
        if ($action === '') return BASE_URL;
        $url = BASE_URL . "?act={$action}";

        if (!empty($query)) {
            $queryString = http_build_query($query);
            $url .= '&' . $queryString;
        }

        return $url;
    }

    public function getAct() {
        return $this->hasQuery('act') ? $this->query->act : '/';
    }

    public function getId() {
        return $this->query->id;
    }

    public function isAdmin() {
        return $this->hasQuery('mode') && $this->query->mode === 'admin';
    }

    public function getAdminLevel() {
        if (!$this->isAdmin()) return null;
        return $this->hasQuery('level') ? $this->query->level : 'hotel';
    }
}

// Hotel Admin: ?mode=admin&level=hotel&act=...
// System Admin: ?mode=admin&level=system&act=...