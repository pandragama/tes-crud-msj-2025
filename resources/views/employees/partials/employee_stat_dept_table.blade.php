<div class="overflow-x-auto">
    <table class="min-w-full bg-white dark:bg-gray-800">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal dark:bg-gray-700 dark:text-gray-300">
                <th class="py-2 pr-2 pl-6 text-left">Department</th>
                <th class="py-2 px-2 text-left">Contract</th>
                <th class="py-2 px-2 text-left">Employee</th>
                <th class="py-2 px-2 text-left">Not Active</th>
                <th class="py-2 pr-6 pl-2 text-left flex items-center gap-1">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                    </svg>                    
                    Total
                </th>
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