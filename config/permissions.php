<?php
return [

    'access'=>[
        'category_list'=> 'category_list',
        'category_delete'=> 'category_delete',
        'category_add'=> 'category_add',
        'category_edit'=> 'category_edit',


        'project_list'=> 'project_list',
        'project_add'=> 'project_add',
        'project_edit'=> 'project_edit',
        'project_delete'=> 'project_delete',

        'news_list'=> 'news_list',
        'news_add'=> 'news_add',
        'news_edit'=> 'news_edit',
        'news_delete'=> 'news_delete',

        'user_add'=>'user_add',
        'user_delete'=>'user_delete',
        'user_list'=>'user_list',
        'user_edit'=>'user_edit',

        'roles_list'=>'roles_list',
        'roles_add'=>'roles_add',
        'roles_delete'=>'roles_delete',
        'roles_edit'=>'roles_edit',

        'video_list'=>'video_list',
        'video_add'=>'video_add',
        'video_delete'=>'video_delete',
        'video_edit'=>'video_edit',

        'slider_list'=>'slider_list',
        'slider_add'=>'slider_add',
        'slider_delete'=>'slider_delete',
        'slider_edit'=>'slider_edit',

        'permissions_add'=>'permissions_add',

        'comment_list'=>'comment_list',
        'comment_delete'=>'comment_delete',

        
    ],
    'table_module'=> [
        'Category',
        'Comment',
        'Project',
        'Post',
        'News',
        'User',
        'Slider',
        'Video',
        'Roles',
        'Donate',
        'Permissions',
        'Dashboard',
        'Feedback',
        'Volunteer',
        'About',
    ],

    'module_children'=> [
        'List',
        'Add',
        'Edit',
        'Delete',
    ]
];
