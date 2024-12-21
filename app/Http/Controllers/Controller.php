<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Método de validação renomeado para evitar conflitos.
     */
    public function validateRequest($request, array $rules, array $messages = [], array $attributes = [])
    {
        return $request->validate($rules, $messages, $attributes);
    }
}
