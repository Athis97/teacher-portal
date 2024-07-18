@extends('layouts.app')

@section('content')
    <div x-data="studentManager()">
        <div class="container mx-auto md:max-w-5xl lg:max-w-7xl">
            <div class="mt-8 pb-8">
                @if (session('success'))
                    <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-800" role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                        {{ session('success') }}
                    </div>
                @endif

                @empty($students->count())
                    <div class="my-8 rounded-lg border border-gray-200 bg-white px-12 py-10 shadow-lg">
                        <p class="text-center font-medium text-gray-500">No records found.</p>
                    </div>
                @else
                    <div class="my-8 rounded bg-white shadow-md">
                        <table class="min-w-full bg-white">
                            <thead class="text-gray-500">
                                <tr class="">
                                    <th class="my-2 px-4 py-3 text-start">
                                        <div class="border-e-2">Name</div>
                                    </th>
                                    <th class="my-2 px-4 py-3 text-start">
                                        <div class="border-e-2">Subject</div>
                                    </th>
                                    <th class="my-2 px-4 py-3 text-center">
                                        <div class="border-e-2">Marks</div>
                                    </th>
                                    <th class="my-2 px-4 py-3 text-center">
                                        <div class="">Actions</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="font-medium text-gray-700">
                                @foreach ($students as $student)
                                    <tr class="border-t-2">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center">
                                                <img src="https://eu.ui-avatars.com/api/?uppercase=false&rounded=true&background=0ea5e9&color=fff&name={{ $student->name }}" alt="" srcset="" width="40px" height="40px" class="me-2">
                                                {{ $student->name }}
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">{{ $student->subject }}</td>
                                        <td class="px-4 py-3 text-center">{{ $student->marks }}</td>
                                        <td class="px-4 py-3 text-center">
                                            <x-dropdown align="left" width="48">
                                                <x-slot name="trigger">
                                                    <div class="ms-1 flex justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                                            <path d="M0 10A10 10 0 1 0 10 0 10 10 0 0 0 0 10zm14.021-1.943-2.008 2.484L10 13.024l-2.01-2.483-2-2.484h8.033z" />
                                                        </svg>
                                                    </div>
                                                </x-slot>

                                                <x-slot name="content">
                                                    <x-dropdown-link x-on:click="editStudent({{ $student }})">{{ __('Edit') }}</x-dropdown-link>

                                                    <x-dropdown-link x-on:click="confirmStudentDeletion({{ $student->id }})">{{ __('Delete') }}</x-dropdown-link>
                                                </x-slot>
                                            </x-dropdown>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $students->links() }}
                    </div>
                @endempty
                <x-primary-button x-on:click="openModal('student-create-form')" class="mt-5">Add</x-primary-button>

                <x-modal name="student-create-form" :show="$errors->any() && session('method') == 'POST'" focusable>
                    <form id="StudentCreateForm" method="POST" action="{{ route('students.store') }}" class="px-16 py-10">
                        @csrf

                        <div class="modal-body">
                            <div class="mb-3">
                                <x-input-label for="create_name" :value="__('Name')" />
                                <div class="flex">
                                    <span class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                        <svg class="h-6 w-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                    </span>
                                    <x-text-input id="create_name" class="mt-1 block w-full" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                                </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="create_subject" :value="__('Subject')" />
                                <div class="flex">
                                    <span class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                        <svg class="h-6 w-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                                        </svg>

                                    </span>
                                    <x-text-input id="create_subject" class="mt-1 block w-full" type="text" name="subject" value="{{ old('subject') }}" required autofocus autocomplete="subject" />
                                </div>
                                <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="create_marks" :value="__('Mark')" />
                                <div class="flex">
                                    <span class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                        <svg class="h-6 w-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z" />
                                        </svg>

                                    </span>
                                    <x-text-input id="create_marks" class="mt-1 block w-full" type="number" name="marks" value="{{ old('marks') }}" required autofocus autocomplete="marks" />
                                </div>
                                <x-input-error :messages="$errors->get('marks')" class="mt-2" />
                            </div>

                            <div class="flex justify-center">
                                <x-primary-button class="mt-3">Create</x-primary-button>
                            </div>
                        </div>
                    </form>
                </x-modal>

                <x-modal name="student-edit-form" :show="$errors->any() && session('method') == 'PUT'" focusable>
                    <form id="StudentUpdateForm" method="POST" :action="`{{ route('students.update', '') }}/${student . id}`" class="px-16 py-10">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="mb-3">
                                <x-input-label for="edit_name" :value="__('Name')" />
                                <div class="flex">
                                    <span class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                        <svg class="h-6 w-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                    </span>
                                    <x-text-input id="edit_name" class="mt-1 block w-full" type="text" name="name" value="{{ old('name') }}" x-model="student.name" required autofocus autocomplete="name" />
                                </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="edit_subject" :value="__('Subject')" />
                                <div class="flex">
                                    <span class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                        <svg class="h-6 w-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                                        </svg>

                                    </span>
                                    <x-text-input id="edit_subject" class="mt-1 block w-full" type="text" name="subject" value="{{ old('subject') }}" x-model="student.subject" required autofocus autocomplete="subject" />
                                </div>
                                <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="edit_marks" :value="__('Mark')" />
                                <div class="flex">
                                    <span class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                        <svg class="h-6 w-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z" />
                                        </svg>

                                    </span>
                                    <x-text-input id="edit_marks" class="mt-1 block w-full" type="number" name="marks" value="{{ old('marks') }}" x-model="student.marks" required autofocus autocomplete="marks" />
                                </div>
                                <x-input-error :messages="$errors->get('marks')" class="mt-2" />
                            </div>

                            <div class="flex justify-center">
                                <x-primary-button class="mt-3">Update</x-primary-button>
                            </div>
                        </div>
                    </form>
                </x-modal>

                <x-modal name="confirm-student-deletion" focusable>
                    <form id="StudentDeleteForm" method="POST" :action="`{{ route('students.destroy', '') }}/${studentId}`" class="px-16 py-10">
                        @csrf
                        @method('DELETE')

                        <div class="modal-body">
                            <div class="mb-4 text-lg">
                                Are you sure you want to delete this student record?
                            </div>
                            <div class="flex justify-center">
                                <x-secondary-button x-on:click.prevent="$dispatch('close-modal', { 'name': 'confirm-student-deletion' })" class="ml-4">Cancel</x-secondary-button>
                                <x-primary-button class="ml-4">Delete</x-primary-button>
                            </div>
                        </div>
                    </form>
                </x-modal>
            </div>
        </div>
    </div>

    <script>
        function studentManager() {
            return {
                student: {
                    id: null,
                    name: '',
                    subject: '',
                    marks: ''
                },
                studentId: null,
                openModal(modalName) {
                    this.$dispatch('open-modal', modalName);
                },
                editStudent(student) {
                    this.student = {
                        ...student
                    };
                    this.openModal('student-edit-form');
                },
                confirmStudentDeletion(studentId) {
                    this.studentId = studentId;
                    this.openModal('confirm-student-deletion');
                }
            };
        }
    </script>
@endsection
