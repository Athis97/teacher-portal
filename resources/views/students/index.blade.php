@extends('layouts.app')

@section('content')
{{-- {{dd($students)}} --}}
    <div x-data="studentManager()">
        @if (session('success'))
            <div class="fixed top-4 right-4 z-50" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                <div class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 border border-gray-400"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-11h2v2H9V7zm0 4h2v4H9v-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Success icon</span>
                    </div>
                    <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                        aria-label="Close" @click="show = false">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        @endif
        <div class="container mx-auto md:max-w-5xl lg:max-w-6xl">
            <div class="mt-8 pb-8">
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
                                        <div class="border-e-2">Marks
                                            <a href="{{ route('home', ['sort' => $sort ? !$sort : true]) }}" class="">
                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.0686 15H7.9313C7.32548 15 7.02257 15 6.88231 15.1198C6.76061 15.2238 6.69602 15.3797 6.70858 15.5393C6.72305 15.7232 6.93724 15.9374 7.36561 16.3657L11.4342 20.4344C11.6323 20.6324 11.7313 20.7314 11.8454 20.7685C11.9458 20.8011 12.054 20.8011 12.1544 20.7685C12.2686 20.7314 12.3676 20.6324 12.5656 20.4344L16.6342 16.3657C17.0626 15.9374 17.2768 15.7232 17.2913 15.5393C17.3038 15.3797 17.2392 15.2238 17.1175 15.1198C16.9773 15 16.6744 15 16.0686 15Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M7.9313 9.00005H16.0686C16.6744 9.00005 16.9773 9.00005 17.1175 8.88025C17.2393 8.7763 17.3038 8.62038 17.2913 8.46082C17.2768 8.27693 17.0626 8.06274 16.6342 7.63436L12.5656 3.56573C12.3676 3.36772 12.2686 3.26872 12.1544 3.23163C12.054 3.199 11.9458 3.199 11.8454 3.23163C11.7313 3.26872 11.6323 3.36772 11.4342 3.56573L7.36561 7.63436C6.93724 8.06273 6.72305 8.27693 6.70858 8.46082C6.69602 8.62038 6.76061 8.7763 6.88231 8.88025C7.02257 9.00005 7.32548 9.00005 7.9313 9.00005Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                            </a>
                                        </div>
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
                                                <img src="https://eu.ui-avatars.com/api/?uppercase=false&rounded=true&background=0ea5e9&color=fff&name={{ $student->name }}"
                                                    alt="" srcset="" width="40px" height="40px" class="me-2">
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
                                                            <path
                                                                d="M0 10A10 10 0 1 0 10 0 10 10 0 0 0 0 10zm14.021-1.943-2.008 2.484L10 13.024l-2.01-2.483-2-2.484h8.033z" />
                                                        </svg>
                                                    </div>
                                                </x-slot>

                                                <x-slot name="content">
                                                    <x-dropdown-link
                                                        x-on:click="editStudent({{ $student }})">{{ __('Edit') }}</x-dropdown-link>

                                                    <x-dropdown-link
                                                        x-on:click="confirmStudentDeletion({{ $student->id }})">{{ __('Delete') }}</x-dropdown-link>
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
                                    <span
                                        class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                        <svg class="h-6 w-6 text-gray-800" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                    </span>
                                    <x-text-input id="create_name" class="mt-1 block w-full" type="text" name="name"
                                        value="{{ old('name') }}" required autofocus autocomplete="name" />
                                </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="create_subject" :value="__('Subject')" />
                                <div class="flex">
                                    <span
                                        class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                        <svg class="h-6 w-6 text-gray-800" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                                        </svg>

                                    </span>
                                    <x-text-input id="create_subject" class="mt-1 block w-full" type="text"
                                        name="subject" value="{{ old('subject') }}" required autofocus
                                        autocomplete="subject" />
                                </div>
                                <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="create_marks" :value="__('Mark')" />
                                <div class="flex">
                                    <span
                                        class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                        <svg class="h-6 w-6 text-gray-800" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z" />
                                        </svg>

                                    </span>
                                    <x-text-input id="create_marks" class="mt-1 block w-full" type="number"
                                        name="marks" value="{{ old('marks') }}" required autofocus
                                        autocomplete="marks" />
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
                    <form id="StudentUpdateForm" method="POST"
                        :action="`{{ route('students.update', '') }}/${student . id}`" class="px-16 py-10">
                        @csrf
                        @method('PUT')

                        <div class="modal-body">
                            <div class="mb-3">
                                <x-input-label for="edit_name" :value="__('Name')" />
                                <div class="flex">
                                    <span
                                        class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                        <svg class="h-6 w-6 text-gray-800" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                    </span>
                                    <x-text-input id="edit_name" class="mt-1 block w-full" type="text" name="name"
                                        value="{{ old('name') }}" x-model="student.name" required autofocus
                                        autocomplete="name" />
                                </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="edit_subject" :value="__('Subject')" />
                                <div class="flex">
                                    <span
                                        class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                        <svg class="h-6 w-6 text-gray-800" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                                        </svg>

                                    </span>
                                    <x-text-input id="edit_subject" class="mt-1 block w-full" type="text"
                                        name="subject" value="{{ old('subject') }}" x-model="student.subject" required
                                        autofocus autocomplete="subject" />
                                </div>
                                <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                            </div>
                            <div class="mb-3">
                                <x-input-label for="edit_marks" :value="__('Mark')" />
                                <div class="flex">
                                    <span
                                        class="mt-1 inline-flex items-center rounded-l-sm border border-e-0 border-gray-300 px-3 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-300 dark:text-gray-400">
                                        <svg class="h-6 w-6 text-gray-800" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z" />
                                        </svg>

                                    </span>
                                    <x-text-input id="edit_marks" class="mt-1 block w-full" type="number"
                                        name="marks" value="{{ old('marks') }}" x-model="student.marks" required
                                        autofocus autocomplete="marks" />
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
                    <form id="StudentDeleteForm" method="POST"
                        :action="`{{ route('students.destroy', '') }}/${studentId}`" class="px-16 py-10">
                        @csrf
                        @method('DELETE')

                        <div class="modal-body">
                            <div class="mb-4 text-lg">
                                Are you sure you want to delete this student record?
                            </div>
                            <div class="flex justify-center">
                                <x-secondary-button
                                    x-on:click.prevent="$dispatch('close-modal', { 'name': 'confirm-student-deletion' })"
                                    class="ml-4">Cancel</x-secondary-button>
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
                sort: 'desc',
                studentId: null,
                openModal(modalName) {
                    this.$dispatch('open-modal', modalName);
                },
                sortStudent() {
                    this.
                }
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
