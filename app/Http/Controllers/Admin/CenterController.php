<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Center;
use App\Services\CenterService;


class CenterController extends Controller
{
    protected $centerService;

    public function __construct(CenterService $centerService)
    {
        $this->centerService = $centerService;
    }

    public function index()
    {
        $centers = $this->centerService->getAll();
        return view('admin.centers.index',compact('centers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);
         $this->centerService->create($request->only('name', 'location'));
         return redirect()->back()->with('success', 'The center has been created successfully.');

    }
    public function update(Request $request, Center $center)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);
        $this->centerService->update($center, $request->only('name', 'location'));
        return redirect()->back()->with('success', 'Center updated successfully.');
    }

    public function destroy(Center $center)
    {
        $this->centerService->delete($center);
        return redirect()->back()->with('success', 'Center deleted successfully.');
    }
}
