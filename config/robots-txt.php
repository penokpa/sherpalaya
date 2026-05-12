<?php
return [
    'environments' => [
        'production' => [
            'paths' => [
                '*' => [
                    'disallow' => [
                        '/admin'
                    ],
                    'allow' => []
                ],
            ],
            'sitemaps' => [
                'sitemap.xml'
            ]
        ]
    ]
];
