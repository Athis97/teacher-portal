@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-10 max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold">Students</h1>
        </div>

        <table class="mt-4 w-full table-auto border-collapse">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Subject</th>
                    <th class="border px-4 py-2">Marks</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="border px-4 py-2">
                            {{ $student->name }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ $student->subject }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ $student->marks }}
                        </td>
                        <td class="border px-4 py-2">
                            <x-dropdown align="left" width="48">
                                <x-slot name="trigger">
                                    <div class="ms-1 flex justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                            <path d="M0 10A10 10 0 1 0 10 0 10 10 0 0 0 0 10zm14.021-1.943-2.008 2.484L10 13.024l-2.01-2.483-2-2.484h8.033z" />
                                        </svg>
                                    </div>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link x-data="" x-on:click.prevent="$dispatch('open-modal', { name: 'student-form', student: {{ $student }} })">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>

                                    <x-dropdown-link x-data="{ id: {{ $student->id }} }" x-on:click.prevent="$dispatch('open-modal', 'confirm-student-deletion')">{{ __('Delete') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $students->links() }}
        </div>

        <x-primary-button class="mt-5" x-data="" x-on:click.prevent="$dispatch('open-modal', 'student-create-form')">Add</x-primary-button>

        <x-modal name="student-create-form" :show="$errors->any()">
            <form id="StudentForm" method="POST" action="{{ route('students.store') }}" class="px-16 py-10">
                @csrf

                <div class="modal-body">
                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <div class="flex">
                            <span class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                <svg class="h-6 w-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                            </span>
                            <x-text-input id="name" class="mt-1 block w-full rounded-r-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="subject" :value="__('Subject')" />
                        <div class="flex">
                            <span class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                <svg class="h-6 w-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                                </svg>

                            </span>
                            <x-text-input id="subject" class="mt-1 block w-full rounded-r-sm" type="text" name="subject" :value="old('subject')" required autofocus autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <x-input-label for="marks" :value="__('Mark')" />
                        <div class="flex">
                            <span class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                <svg class="h-6 w-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z" />
                                </svg>

                            </span>
                            <x-text-input id="marks" class="mt-1 block w-full rounded-r-sm" type="number" name="marks" :value="old('marks')" required autofocus autocomplete="username" />
                        </div>
                        <x-input-error :messages="$errors->get('marks')" class="mt-2" />
                    </div>

                    <div class="flex justify-center">
                        <x-primary-button class="mt-3">Add</x-primary-button>
                    </div>
                </div>
            </form>
        </x-modal>

        <x-modal name="confirm-student-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('students.destroy', '') }}/" + student.id  class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to delete record?') }}
                </h2>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3">
                        {{ __('Delete Account') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    </div>
@endsection
