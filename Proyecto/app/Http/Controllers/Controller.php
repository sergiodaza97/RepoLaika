<?php

namespace App\Http\Controllers;

use App\Http\Requests\Actualizar;
use App\Http\Requests\Crear;
use App\Models\Datos;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

interface DatosInterface {

    public function store(Crear $request);
    public function show($id);
    public function update(Actualizar $request, Datos $datos);
    public function destroy($id);
}