<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComptableRequest;
use App\Services\Contracts\IAdminService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(IAdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function registerComptable(StoreComptableRequest $request)
    {
        try {
            $comptable = $this->adminService->registerComptable($request->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Comptable registered successfully',
                'data' => $comptable
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to register comptable',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
