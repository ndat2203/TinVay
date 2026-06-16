<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Models\ServiceFaq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    // LIST (tree cha - con)
    public function index()
    {
        $services = Service::with('children')
            ->whereNull('parent_id')    
            ->get();

        return response()->json([
            'data' => $services
        ]);
    }

    // SHOW DETAIL
    public function show($id)
    {
        $service = Service::with('children', 'parent')->findOrFail($id);

        return response()->json([
            'data' => $service
        ]);
    }

    // STORE
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'nullable|integer',
            'parent_id' => 'nullable|integer',
            'title' => 'required|string',
            'provider' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'min_amount' => 'nullable|numeric',
            'max_amount' => 'nullable|numeric',
            'min_month' => 'nullable|integer',
            'max_month' => 'nullable|integer',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'status' => 'nullable|integer',
        ]);

        $data['slug'] = Str::slug($data['title']);

        $service = Service::create($data);

        return response()->json([
            'message' => 'Created successfully',
            'data' => $service
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = $request->validate([
            'category_id' => 'nullable|integer',
            'parent_id' => 'nullable|integer',
            'title' => 'required|string',
            'provider' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'min_amount' => 'nullable|numeric',
            'max_amount' => 'nullable|numeric',
            'min_month' => 'nullable|integer',
            'max_month' => 'nullable|integer',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'status' => 'nullable|integer',
        ]);

        $data['slug'] = Str::slug($data['title']);

        $service->update($data);

        return response()->json([
            'message' => 'Updated successfully',
            'data' => $service
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return response()->json([
            'message' => 'Deleted successfully'
        ]);
    }

    public function detail(
        string $categorySlug,
        string $serviceSlug
    ) {
        $service = Service::query()
            ->with([
                'parent',
                'faqs' => function ($query) {
                    $query->where('status', 1)
                        ->orderBy('sort_order');
                }
            ])
            ->where('slug', $serviceSlug)
            ->whereHas('parent', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            })
            ->first();

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Dịch vụ không tồn tại'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'service' => $service
            ]
        ]);
    }
}