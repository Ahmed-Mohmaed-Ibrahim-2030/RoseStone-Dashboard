<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'admins'=>'c,r,u,d',
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'profile' => 'r,u',
            'categories'=>'c,r,u,d',
            'subcategories'=>'c,r,u,d',
            'products'=>'c,r,u,d',
            'projects' => 'c,r,u,d',
            'blogs'=>'c,r,u,d',
            'company'=>'c,r,u,d',
            'partners'=>'c,r,u,d',
            'contacts'=>'r,d',
        ],
        'admin'=>[],



        'administrator' => [
            'users' => 'c,r,u,d',
            'categories'=>'c,r,u,d',
            'subcategories'=>'c,r,u,d',
            'products'=>'c,r,u,d',
            'projects' => 'c,r,u,d',
            'blogs'=>'c,r,u,d',
            'company'=>'c,r,u,d',
            'partners'=>'c,r,u,d',
            'contacts'=>'c,r,u,d',
            'profile' => 'r,u'
        ],
        'user' => [
            'profile' => 'r,u',
            'contacts'=>'c,r',
            'categories'=>'r',
            'subcategories'=>'r',
            'products'=>'r',
            'projects' => 'r',
            'blogs'=>'r',
            'company'=>'r',
            'partners'=>'r',

        ],
        'role_name' => [
            'module_1_name' => 'c,r,u,d',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
