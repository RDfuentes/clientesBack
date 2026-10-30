<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\JsonResponse;

class ClienteController extends Controller
{
    /**
     * Listar todos los clientes.
     */
    public function index(): JsonResponse
    {
        $clientes = Cliente::query()->latest()->get();

        return response()->json([
            'data' => $clientes,
        ]);
    }

    /**
     * Crear un nuevo cliente.
     */
    public function store(StoreClienteRequest $request): JsonResponse
    {
        $cliente = Cliente::create($request->validated());

        return response()->json([
            'message' => 'Cliente creado correctamente.',
            'data' => $cliente,
        ], 201);
    }

    /**
     * Mostrar un cliente específico.
     */
    public function show(Cliente $cliente): JsonResponse
    {
        return response()->json([
            'data' => $cliente,
        ]);
    }

    /**
     * Actualizar un cliente.
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente): JsonResponse
    {
        $cliente->update($request->validated());

        return response()->json([
            'message' => 'Cliente actualizado correctamente.',
            'data' => $cliente->fresh(),
        ]);
    }

    /**
     * Eliminar un cliente.
     */
    public function destroy(Cliente $cliente): JsonResponse
    {
        $cliente->delete();

        return response()->json([
            'message' => 'Cliente eliminado correctamente.',
        ]);
    }
}
