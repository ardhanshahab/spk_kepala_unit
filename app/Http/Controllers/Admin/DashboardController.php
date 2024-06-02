<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\SubCriteria;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard', [
            'criteria' => Criteria::count(),
            // 'umur' => SubCriteria::where('criteria_id', '1')->count(),
            // 'berat' => SubCriteria::where('criteria_id', '2')->count(),
            // 'tinggi' => SubCriteria::where('criteria_id', '3')->count(),
        ]);
    }
}
