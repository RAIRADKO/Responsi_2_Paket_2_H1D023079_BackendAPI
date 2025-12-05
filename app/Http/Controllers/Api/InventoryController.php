<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return Inventory::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'entry_date' => 'required|date',
            'expiry_date' => 'required|date|after:entry_date',
        ]);

        $inventory = Inventory::create($validated);
        return response()->json($inventory, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'entry_date' => 'required|date',
            'expiry_date' => 'required|date|after:entry_date',
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->update($validated);
        return response()->json($inventory);
    }

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
        return response()->json(null, 204);
    }
}