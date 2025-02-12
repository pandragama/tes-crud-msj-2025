<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employees Data Report') }}
        </h2> -->

        <div class="flex flex-row justify-between">
            <nav class="flex py-2">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li>
                        <div class="flex items-center">
                            <span class="text-sm font-medium text-gray-700 dark:text-white">Employees Data Report</span>
                        </div>
                    </li>
                </ol>
            </nav>

            @can('admin-only')
            <x-redirect-button href="{{ route('employees.add') }}">
                {{ __('Add New Data') }}
            </x-redirect-button>
            @endcan
        </div>

    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap-reverse gap-8">
                <div class="flex-1 min-w-min bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div id="stat-dept-table">
                        @include('employees.partials.employee_stat_dept_table', ['employeeStatusCountsByDepartment' => $employeeStatusCountsByDepartment])
                    </div>
                </div>
                <div class="min-w-min lg:flex-none flex-1 flex justify-center items-center px-6 py-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="chart-container relative">
                        <canvas id="myChart" width="500" height="250"></canvas>
                    </div>
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

    @php
    $chartDepartments = array_map(function($item) {
    return $item['department'];
    }, $employeeStatusCountsByDepartment->toArray());
    $chartTotal = array_map(function($item) {
    return $item['total'];
    }, $employeeStatusCountsByDepartment->toArray());
    @endphp

    <!--  tell the script to be a module (for chart.js undefined problem) -->
    <script type="module">
        var labels = @json($chartDepartments);
        var data = @json($chartTotal);
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: data,
                    // data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 71, 1)', // Tambahan baru
                        'rgba(0, 128, 0, 1)', // Tambahan baru
                        'rgba(0, 191, 255, 1)', // Tambahan baru
                        'rgba(75, 0, 130, 1)', // Tambahan baru
                        'rgba(255, 20, 147, 1)', // Tambahan baru
                        'rgba(255, 165, 0, 1)', // Tambahan baru
                        'rgba(34, 139, 34, 1)', // Tambahan baru
                        'rgba(70, 130, 180, 1)', // Tambahan baru
                        'rgba(105, 105, 105, 1)' // Tambahan baru
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 71, 1)', // Tambahan baru
                        'rgba(0, 128, 0, 1)', // Tambahan baru
                        'rgba(0, 191, 255, 1)', // Tambahan baru
                        'rgba(75, 0, 130, 1)', // Tambahan baru
                        'rgba(255, 20, 147, 1)', // Tambahan baru
                        'rgba(255, 165, 0, 1)', // Tambahan baru
                        'rgba(34, 139, 34, 1)', // Tambahan baru
                        'rgba(70, 130, 180, 1)', // Tambahan baru
                        'rgba(105, 105, 105, 1)' // Tambahan baru
                    ],
                    // backgroundColor: [
                    //     'rgba(255, 99, 132, 0.2)',
                    //     'rgba(54, 162, 235, 0.2)',
                    //     'rgba(255, 206, 86, 0.2)',
                    //     'rgba(75, 192, 192, 0.2)',
                    //     'rgba(153, 102, 255, 0.2)',
                    //     'rgba(255, 159, 64, 0.2)'
                    // ],
                    // borderColor: [
                    //     'rgba(255, 99, 132, 1)',
                    //     'rgba(54, 162, 235, 1)',
                    //     'rgba(255, 206, 86, 1)',
                    //     'rgba(75, 192, 192, 1)',
                    //     'rgba(153, 102, 255, 1)',
                    //     'rgba(255, 159, 64, 1)'
                    // ],
                    // borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Set false untuk mengabaikan rasio aspek
                // legend: {
                //     position: 'top'
                // },
                plugins: {
                    legend: {
                        display: true,
                        position: 'right', // Ubah posisi legend di sini
                        labels: {
                            color: 'rgb(200, 200, 200)',
                            sort: (a, b, data) => {
                                // Mendapatkan nilai data dari dataset
                                const dataset = data.datasets[0];
                                const valueA = dataset.data[a.index];
                                const valueB = dataset.data[b.index];
                                return valueB - valueA; // Mengurutkan secara descending
                            }
                        }
                    }
                },
                // title: {
                //     display: true,
                //     text: 'Chart.js Doughnut Chart'
                // },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        });
    </script>


</x-app-layout>