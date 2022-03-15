<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Resources
    |--------------------------------------------------------------------------
    |
    | Configure the resources (models) you'd like to be available in Runway.
    |
    */

    'resources' => [
         \App\Models\Work::class => [
             'name' => 'Works',
             'blueprint' => 'work',
             'route' => '/works/{{ slug }}',
             'layout' => 'layout',
             'template' => 'works-show',
         ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Disable Migrations?
    |--------------------------------------------------------------------------
    |
    | Should Runway's migrations be disabled?
    | (eg. not automatically run when you next vendor:publish)
    |
    */

    'disable_migrations' => false,

];
