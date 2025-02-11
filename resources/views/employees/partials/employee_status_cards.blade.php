<div class="flex flex-wrap gap-8">

    @php
        $statusDisplay = [
            'cont' => 'Contract', 
            'emp' => 'Employee', 
            'not_act' => 'Not Active'
        ];

        $statusTextColor = [
            'cont' => 'text-blue-500', 
            'emp' => 'text-green-500', 
            'not_act' => 'text-amber-500'
        ];
    @endphp
    
    @foreach($employeeStatusSummary['items'] as $key => $item)
    <div class="flex-1 flex flex-row gap-4 text-nowrap max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div>
            <svg class="w-8 h-8 {{ $statusTextColor[$item->status] }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="w-full grid grid-cols-2">
            <h5 class="text-left text-2xl font-semibold tracking-tight text-gray-500 dark:text-gray-400">{{ $statusDisplay[$item->status] }}</h5>
            <h5 class="text-right text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $item->count }}</h5>
        </div>
    </div>
    @endforeach

    <div class="flex-1 flex flex-row gap-4 text-nowrap max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div>
            <!-- <svg class="w-8 h-8 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"> -->
            <svg class="w-8 h-8 text-violet-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="w-full grid grid-cols-2">
            <h5 class="text-left text-2xl font-semibold tracking-tight text-gray-500 dark:text-gray-400">Grand Total</h5>
            <h5 class="text-right text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $employeeStatusSummary['total'] }}</h5>
        </div>
    </div>

</div>