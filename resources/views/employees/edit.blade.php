<x-app-layout>
    <x-slot name="header" >
        <!-- <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Employees Data') }}
        </h2> -->
        <div class="flex flex-row justify-between">
            <nav class="flex py-2" >
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ route('employees.index') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">Employees Data Table</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-2 h-2 text-gray-400 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="text-sm font-medium text-gray-700 dark:text-white">Edit Data Form</span>
                        </div>
                    </li>
                </ol>
            </nav>
    
            <!-- <x-redirect-button href="{{ route('employees.index') }}">
                {{ __('Back') }}
            </x-redirect-button> -->
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <form method="POST" action="{{ route('employees.update', $employee->id) }}" class="py-6 px-6 flex flex-col">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-6 gap-4">
                        <!-- First Name -->
                        <div class="col-span-3">
                            <x-input-label for="firstname" :value="__('First Name')" />

                            <x-text-input id="firstname" class="block mt-1 w-full"
                                type="text"
                                name="firstname"
                                value="{{ old('firstname', $employee->firstname) }}"
                                required autocomplete="current-firstname" />

                            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                        </div>

                        <!-- Last Name -->
                        <div class="col-span-3">
                            <x-input-label for="lastname" :value="__('Last Name')" />

                            <x-text-input id="lastname" class="block mt-1 w-full"
                                type="text"
                                name="lastname"
                                value="{{ old('lastname', $employee->lastname) }}"
                                required autocomplete="current-lastname" />

                            <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                        </div>

                        <!-- Address -->
                        <div class="col-span-full">
                            <x-input-label for="address" :value="__('Address')" />

                            <textarea 
                                id="address" 
                                rows="2" 
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 
                                        rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="address"
                                required autocomplete="current-address"
                                >{{ old('address', $employee->address) }}</textarea>


                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>

                        <!-- Gender -->
                        <div class="col-span-2">
                            <x-input-label for="gender" :value="__('Gender')" />

                            <div class="flex flex-wrap gap-2 mt-1" x-data="{ selectedRam: '{{ old('gender', $employee->gender) }}' }">
                                @php
                                $genderOptions = ['male', 'female'];
                                @endphp

                                @foreach ($genderOptions as $genderOpt)
                                <label x-on:click="selectedRam = '{{ $genderOpt }}'"
                                    :class="selectedRam === '{{ $genderOpt }}' 
                                            ? 'bg-indigo-600 text-white border-indigo-600' 
                                            : 'dark:border-gray-500 dark:text-gray-300 border-gray-700 text-gray-700 hover:bg-gray-100 hover:text-gray-700'"
                                    class="px-4 py-2.5 border rounded-lg cursor-pointer text-sm flex-1">
                                    <input type="radio" name="gender" value="{{ $genderOpt }}" class="hidden"
                                        x-model="selectedRam">
                                    {{ ucfirst($genderOpt) }}
                                </label>
                                @endforeach
                            </div>

                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-span-2">
                            <x-input-label for="dob" :value="__('Date of Birth')" />

                            <x-text-input id="dob" class="block mt-1 w-full"
                                type="date"
                                name="dob"
                                value="{{ old('dob', $employee->dob) }}"
                                required autocomplete="current-dob" />

                            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div class="col-span-2">
                            <x-input-label for="status" :value="__('Status')" />

                            <div class="flex flex-wrap gap-2 mt-1" x-data="{ selectedStatus: '{{ old('status', $employee->status) }}' }">
                                @php
                                $statusOptions = ['cont', 'emp', 'not_act'];
                                $statusDisplay = ['Contract', 'Employee', 'Not Active'];
                                @endphp

                                @foreach ($statusOptions as $key => $statusOpt)
                                <label x-on:click="selectedStatus = '{{ $statusOpt }}'"
                                    :class="selectedStatus === '{{ $statusOpt }}' 
                                            ? 'bg-indigo-600 text-white border-indigo-600' 
                                            : 'dark:border-gray-500 dark:text-gray-300 border-gray-700 text-gray-700 hover:bg-gray-100 hover:text-gray-700'"
                                    class="px-4 py-2.5 border rounded-lg cursor-pointer text-sm flex-1">
                                    <input type="radio" name="status" value="{{ $statusOpt }}" class="hidden"
                                        x-model="selectedStatus">
                                    {{ $statusDisplay[$key] }}
                                </label>
                                @endforeach
                            </div>

                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <!-- Department -->
                        <div class="col-span-full">
                            <x-input-label for="dept_id" :value="__('Department')" />

                            <div class="flex flex-wrap gap-2 mt-1" x-data="{ selectedDept: '{{ old('dept_id', $employee->dept_id) }}' }">
                                @php
                                $departmentOptions = array_map(function($dept) {
                                                        return $dept['name'];
                                                    }, $departments->toArray());;
                                @endphp

                                @foreach ($departmentOptions as $key => $departmentOpt)
                                <label x-on:click="selectedDept = '{{ ($key + 1) }}'"
                                    :class="selectedDept === '{{ ($key + 1) }}' 
                                            ? 'bg-indigo-600 text-white border-indigo-600' 
                                            : 'dark:border-gray-500 dark:text-gray-300 border-gray-700 text-gray-700 hover:bg-gray-100 hover:text-gray-700'"
                                    class="px-4 py-2.5 border rounded-lg cursor-pointer text-sm flex-1 text-nowrap">
                                    <input type="radio" name="dept_id" value="{{ ($key + 1) }}" class="hidden"
                                        x-model="selectedDept">
                                    {{ ucfirst($departmentOpt) }}
                                </label>
                                @endforeach
                            </div>

                            <x-input-error :messages="$errors->get('dept_id')" class="mt-2" />
                        </div>

                    </div>

                    <div class="flex justify-end mt-6 gap-4">
                        <x-redirect-button href="{{ route('employees.index') }}">
                            {{ __('Back') }}
                        </x-redirect-button>
                        <x-primary-button>
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>