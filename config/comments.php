<?php

return [
    // The model which creates the comments aka the User model
    'models' => [
        'commenter' => \App\Models\User::class,
        'comment' => \App\Models\Comment::class,
    ],
    'ui' => 'bootstrap4',
    'purifier' => [
        'HTML_Allowed' => 'p',
    ],
    'route' => [
        'root' => 'api',
        'group' => 'comments'
    ],
    'policy_prefix' => 'comments',
    'testing' => [
        'seeding' => [
            'commentable' => '\App\Models\post_cours',
            'commenter' => '\App\Models\User'
        ]
    ],
    /**
     * Only for API
     *
     * @example ['get']['preprocessor']['user'] => App\UseCases\CommentPreprocessor\User::class
     */
    'api' => [
        'get' => [
            'preprocessor' => [
                'user' => null,
                'comment' => null
            ]
        ]
    ]
];