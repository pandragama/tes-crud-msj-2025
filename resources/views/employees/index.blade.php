<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employees Data Table') }}
        </h2> -->

        <div class="flex flex-row justify-between">
            <nav class="flex py-2">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li>
                        <div class="flex items-center">
                            <span class="text-sm font-medium text-gray-700 dark:text-white">Employees Data Table</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <x-redirect-button href="{{ route('employees.add') }}">
                {{ __('Add New Data') }}
            </x-redirect-button>
        </div>

    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div id="stat-dept-table">
                    @include('employees.partials.employee_stat_dept_table', ['employeeStatusCountsByDepartment' => $employeeStatusCountsByDepartment])
                </div>

            </div>
        </div>
    </div>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">

                <div id="stat-dept-table">
                    @include('employees.partials.employee_status_cards', ['employeeStatusSummary' => $employeeStatusSummary])
                </div>

            </div>
        </div>
    </div>

    <div class="pb-12">
    <!-- <div class="py-12"> -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" x-data="pagination()">

                <div id="employee-table">
                    @include('employees.partials.employee_table', ['employees' => $employees])
                </div>

            </div>
        </div>
    </div>

    <!-- <div class="mt-4">
        <template x-if="paginationData">
            <div>
                <button @click="fetchPage(paginationData.prev_page_url)" x-show="paginationData.prev_page_url" class="mr-2 bg-blue-500 text-white px-4 py-2 rounded">Sebelumnya</button>
                <button @click="fetchPage(paginationData.next_page_url)" x-show="paginationData.next_page_url" class="bg-blue-500 text-white px-4 py-2 rounded">Selanjutnya</button>
            </div>
        </template>
    </div> -->

    <script>
        function pagination() {
            return {
                paginationData: null,
                fetchPage(url) {
                    fetch(url)
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('employee-table').innerHTML = html;
                            this.paginationData = JSON.parse(document.getElementById('pagination-data').value);
                        });
                },
                init() {
                    this.paginationData = JSON.parse(document.getElementById('pagination-data').value);
                }
            }
        }
    </script>

</x-app-layout>