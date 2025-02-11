<div class="overflow-x-auto">
    <table class="min-w-full bg-white dark:bg-gray-800">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal dark:bg-gray-700 dark:text-gray-300">
                <th class="py-2 pr-2 pl-6 text-left">Department</th>
                <th class="py-2 px-2 text-left">Contract</th>
                <th class="py-2 px-2 text-left">Employee</th>
                <th class="py-2 px-2 text-left">Not Active</th>
                <th class="py-2 pr-6 pl-2 text-left">Grand Total</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light dark:text-gray-200">
            @foreach($employeeStatusCountsByDepartment as $key => $item)
            <tr class="border-b border-gray-200 hover:bg-gray-100 dark:border-gray-600 dark:hover:bg-gray-700">
                <td class="py-2 pr-2 pl-6 text-nowrap">{{ $item->department }}</td>
                <td class="py-2 px-2 text-nowrap">{{ $item->cont }}</td>
                <td class="py-2 px-2 text-nowrap">{{ $item->emp }}</td>
                <td class="py-2 px-2 text-nowrap">{{ $item->not_act }}</td>
                <td class="py-2 pr-6 pl-2 text-nowrap">{{ $item->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>