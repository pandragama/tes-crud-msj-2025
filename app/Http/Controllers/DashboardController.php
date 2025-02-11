<?php

namespace App\Http\Controllers;

use App\Models\Employee;
// use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $employees = Employee::join('departments', 'departments.id', '=', 'employees.dept_id')
        //     ->select('employees.*', 'departments.name as department')
        //     ->orderBy('employees.id', 'DESC')
        //     ->paginate(10);

        // $employeeStatusCounts = Employee::selectRaw('status, COUNT(*) as count')
        //                         ->groupBy('status')
        //                         ->get();
        // $employeeStatusGrandTotal = $employeeStatusCounts->sum('count');

        // $employeeStatusSummary = [
        //     'items' => $employeeStatusCounts,
        //     'total' => $employeeStatusGrandTotal
        // ];

        // // dd($employeeDeptSummary);

        // $employeeStatusCountsByDepartment = Employee::selectRaw("
        //                                         dept_id, 
        //                                         SUM(CASE WHEN status = 'cont' THEN 1 ELSE 0 END) as cont,
        //                                         SUM(CASE WHEN status = 'emp' THEN 1 ELSE 0 END) as emp,
        //                                         SUM(CASE WHEN status = 'not_act' THEN 1 ELSE 0 END) as not_act,
        //                                         COUNT(*) as total
        //                                     ")->groupBy('dept_id')
        //                                     ->get();

        // // dd($employeeStatusCountsByDepartment);

        // return view('dashboard', [
        //     'employees' => $employees,
        //     'employeeStatusSummary' => $employeeStatusSummary,
        //     'employeeStatusCountsByDepartment' => $employeeStatusCountsByDepartment
        // ]);

        return view('dashboard');
    }

}
