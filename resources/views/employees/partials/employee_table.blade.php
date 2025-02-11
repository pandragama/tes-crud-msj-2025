<!-- resources/views/employees/partials/employee_table.blade.php -->

<input type="hidden" id="pagination-data" value='@json($employees)'>
<div class="overflow-x-auto">
<!-- <div class="relative overflow-x-auto"> -->
    <table class="min-w-full bg-white dark:bg-gray-800">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal dark:bg-gray-700 dark:text-gray-300">
                <th class="py-3 px-6 text-left">No</th>
                <th class="py-3 px-6 text-left">FirstName</th>
                <th class="py-3 px-6 text-left">LastName</th>
                <th class="py-3 px-6 text-left">Gender</th>
                <th class="py-3 px-6 text-left">Address</th>
                <th class="py-3 px-6 text-left">DOB</th>
                <th class="py-3 px-6 text-left">Dept</th>
                <th class="py-3 px-6 text-left">Status</th>
                <th class="py-3 px-6 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light dark:text-gray-200">
            @foreach($employees as $key => $employee)
            <tr class="border-b border-gray-200 hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-700">
                <!-- <td class="py-3 px-6 text-nowrap">{{ $employee->id }}</td> -->
                <td class="py-3 px-6 text-nowrap">{{ ($key + 1) + (($employees->currentPage() - 1) * $employees->perPage()) }}</td>
                <td class="py-3 px-6 text-nowrap">{{ $employee->firstname }}</td>
                <td class="py-3 px-6 text-nowrap">{{ $employee->lastname }}</td>
                <td class="py-3 px-6 text-nowrap">{{ ucfirst($employee->gender) }}</td>
                <td class="py-3 px-6 text-nowrap">{{ $employee->address }}</td>
                <td class="py-3 px-6 text-nowrap">{{ date("d/m/Y", strtotime($employee->dob)) }}</td>
                <td class="py-3 px-6 text-nowrap">{{ $employee->department }}</td>
                <td class="py-3 px-6 text-nowrap">{{ status_decode($employee->status) }}</td>
                <td class="py-3 px-6 text-nowrap">
                    <a href="{{ route('employees.edit', $employee->id) }}" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">Edit</a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 ml-2 dark:text-red-400 dark:hover:text-red-300" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Tautan Pagination -->
<div class="my-4 px-4">
    {{ $employees->links() }} <!-- Menampilkan tautan pagination -->
</div>