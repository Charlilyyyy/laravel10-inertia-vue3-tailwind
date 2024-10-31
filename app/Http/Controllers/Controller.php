<?php

namespace App\Http\Controllers;
use OpenApi\Attributes as OA;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

#[
    OA\Info(version: "1.0.0", description: "some desc", title: "laravel vue inertia title"),
    OA\Server(url: "https://laravel10-inertia-vue3.test/api", description: "local server"),
    OA\Server(url: "https://laravel10-inertia-vue3.test", description: "staging server"),
    OA\Server(url: "https://laravel10-inertia-vue3.test", description: "production server"),
]


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
