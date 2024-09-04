<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        if (!Auth::check()) {
            return response()->json([
                'message' => 'Usuário não autenticado.',
            ], 401);
        }

        return Contact::all();
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'message' => 'Usuário não autenticado.',
            ], 401);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        try {
            $contact = Contact::create($validatedData);

            return response()->json([
                'message' => 'Contato criado com sucesso!',
                'contact' => $contact
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Falha ao criar o contato, tente novamente mais tarde.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        if (!Auth::check()) {
            return response()->json([
                'message' => 'Usuário não autenticado.',
            ], 401);
        }

        try {
            $contact = Contact::findOrFail($id);
            return response()->json($contact, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Contato não encontrado.',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json([
                'message' => 'Usuário não autenticado.',
            ], 401);
        }

        try {
            $contact = Contact::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
            ]);

            $contact->update($request->all());

            return response()->json($contact, 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Falha ao atualizar o contato.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        if (!Auth::check()) {
            return response()->json([
                'message' => 'Usuário não autenticado.',
            ], 401);
        }

        try {
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Falha ao remover o contato.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
