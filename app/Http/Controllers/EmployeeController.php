<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // // $employees = Employee::paginate(10);
        // $employees = Employee::join('departments', 'departments.id', '=', 'employees.dept_id')
        //                     ->select('employees.*', 'departments.name as department')
        //                     ->orderBy('employees.id', 'DESC')
        //                     ->paginate(10);
        //                     // dd($employees);

        // return view('employees.index', compact('employees'));

        $employees = Employee::join('departments', 'departments.id', '=', 'employees.dept_id')
                            ->select('employees.*', 'departments.name as department')
                            ->orderBy('employees.id', 'DESC')
                            ->paginate(10);

        $employeeStatusCounts = Employee::selectRaw('status, COUNT(*) as count')
                                ->groupBy('status')
                                ->get();
        $employeeStatusGrandTotal = $employeeStatusCounts->sum('count');

        $employeeStatusSummary = [
            'items' => $employeeStatusCounts,
            'total' => $employeeStatusGrandTotal
        ];

        // dd($employeeDeptSummary);

        $employeeStatusCountsByDepartment = Employee::join('departments', 'departments.id', '=', 'employees.dept_id')
                                            ->selectRaw("
                                                dept_id,
                                                departments.name as department,
                                                SUM(CASE WHEN status = 'cont' THEN 1 ELSE 0 END) as cont,
                                                SUM(CASE WHEN status = 'emp' THEN 1 ELSE 0 END) as emp,
                                                SUM(CASE WHEN status = 'not_act' THEN 1 ELSE 0 END) as not_act,
                                                COUNT(*) as total
                                            ")->groupBy('dept_id', 'department')
                                            ->get();

        // dd($employeeStatusCountsByDepartment);

        return view('employees.index', [
            'employees' => $employees,
            'employeeStatusSummary' => $employeeStatusSummary,
            'employeeStatusCountsByDepartment' => $employeeStatusCountsByDepartment
        ]);
    }

    public function fetchEmployees(Request $request)
    {
        // Mengambil data karyawan dengan pagination
        $employees = Employee::paginate(10);

        // Mengembalikan view partial untuk pagination
        return view('employees.partials.employee_table', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();

        return view('employees.create', [
            'departments' => $departments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    public function store(EmployeeStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();
            // dd($data);

            Employee::create($data);

            DB::commit();

            session()->flash('swal-alert-success', 'Berhasil Coy');
            return redirect()->route('employees.index');
        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e);
            session()->flash('swal-alert-error', 'Gagal Coy');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();

        return view('employees.edit', [
            'employee' => $employee,
            'departments' => $departments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeStoreRequest $request, Employee $employee)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();
            // dd($data);

            $employee->update($data);

            DB::commit();

            session()->flash('swal-alert-success', 'Berhasil Coy');
            return redirect()->route('employees.index');
        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e);
            session()->flash('swal-alert-error', 'Gagal Coy');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        DB::beginTransaction();
        $temp = $employee;

        try {
            $employee->delete();

            DB::commit();

            session()->flash('swal-alert-success', ($temp->firstname . ' ' . $temp->lastname . ' berhasil dihapus.'));
            return redirect()->route('employees.index');
        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e);
            session()->flash('swal-alert-error', ($temp->firstname . ' ' . $temp->lastname . ' gagal dihapus.'));
            return redirect()->back();
        }
    }
}
