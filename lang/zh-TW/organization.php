<?php

return [

    'menu' => [
        'title'      => '組織管理',
        'company'    => '公司管理',
        'department' => '部門管理',
        'position'   => '職位管理',
        'division'   => '組別管理',
        'role'       => '職責管理',
        'employee'   => '職員管理',
    ],


    'company'    => '公司',
    'department' => '部門',
    'position'   => '職位',
    'division'   => '組別',
    'role'       => '職責',
    'employee'   => '職員',
    'joined'     => '入職日期',

    // For form    
    'form' => [
        'name_en'                 => '英文名稱',
        'joined_at'               => '入職日期',

        'company' => [
            'name'                => '公司名稱',
            'departments'         => '部門設定',
            'positions'           => '職位設定',
            'divisions'           => '組成組別',
        ],

        'department' => [
            'name'                => '部門名稱',
            'companies'           => '所屬公司',
            'divisions'           => '組成組別',
        ],

        'position' => [
            'name'                => '職位名稱',
            'companies'           => '所屬公司',
        ],

        'division' => [
            'name'                => '組別名稱',
            'roles'               => '組成職責',
            'companies'           => '所屬公司',
            'departments'         => '所屬部門',
            'employees'           => '組成職員',
        ],

        'role' => [
            'name'                => '職責名稱',
            'divisions'           => '所屬組別',
            'employees'           => '所屬職員',
        ],

        'employee' => [
            'company_id'          => '所屬公司',
            'department_id'       => '所屬部門',
            'position_id'         => '所屬職位',
            'divisions'           => '所屬組別',
            'roles'               => '所屬職責',
        ],

        'placeholder' => [
            // 'title'               => '請輸入標題',
            // 'link'                => 'http://www.example.com.tw',
            // 'slug'                => '例如 google',
            // 'keyword'             => '請輸入您想要篩選的關鍵字',
            // 'division' => [
            //     'employees'           => '可直接透過輸入對應的文字來搜尋',
            // ],
        ],
        
        'help' => [
            'companies'              => '左邊區塊為未選&nbsp;&nbsp;&nbsp;<-->&nbsp;&nbsp;&nbsp;右邊區塊為已選',
            'departments'            => '左邊區塊為未選&nbsp;&nbsp;&nbsp;<-->&nbsp;&nbsp;&nbsp;右邊區塊為已選',
            'positions'              => '左邊區塊為未選&nbsp;&nbsp;&nbsp;<-->&nbsp;&nbsp;&nbsp;右邊區塊為已選',
            'divisions'              => '左邊區塊為未選&nbsp;&nbsp;&nbsp;<-->&nbsp;&nbsp;&nbsp;右邊區塊為已選',
            'roles'                  => '左邊區塊為未選&nbsp;&nbsp;&nbsp;<-->&nbsp;&nbsp;&nbsp;右邊區塊為已選',
            
            'division' => [
                'employees'          => '可直接透過輸入對應的文字來搜尋',
            ],

            'role' => [
                'employees'          => '可直接透過輸入對應的文字來搜尋',
            ],
        ],

        'validation' => [
            // 'name.required'       => ':attribute 一定要填資料啦～～～～～',

            // 'email.required'      => ':attribute 也一定要填喔!!!',
            // 'email.email'         => ':attribute 格式也要正確啦～～～～',
        ],

    ],

];
