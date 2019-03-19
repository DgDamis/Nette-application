<?php

namespace App\Acl;

use Nette\Security\Permission;

class Acl extends Permission {

    public function __construct() {
        //roles
        $this->addRole('guest');
        $this->addRole('user');
        $this->addRole('registered');
        $this->addRole('publisher');
        $this->addRole('administrator');
        // resources
        $this->addResource('Homepage');
        $this->addResource('Sign');
        $this->addResource('News');
        $this->addResource('Users');
        // privileges
        $this->allow(Permission::ALL, 'Homepage', Permission::ALL);
        $this->allow(Permission::ALL, 'Sign', Permission::ALL);
       
        $this->deny('guest', 'News', ['addComment','removeComment']);
        
        $this->allow('registered', 'News', 'commentaries');
        $this->deny('registered', ['News','Users'], Permission::ALL);
        
        $this->allow('publisher', 'News', Permission::ALL);
        
        $this->allow('administrator', Permission::ALL, Permission::ALL);
    }
}