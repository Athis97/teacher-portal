@extends('layouts.app')

@section('content')
    <div x-data="studentManager()">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold mb-4">Student Management</h1>

            @if(session('success'))
                <div class="bg-green-500 text-white p-4 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2 px-4">ID</th>
                            <th class="py-2 px-4">Name</th>
                            <th class="py-2 px-4">Subject</th>
                            <th class="py-2 px-4">Marks</th>
                            <th class="py-2 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($students as $student)
                            <tr>
                                <td class="border px-4 py-2">{{ $student->id }}</td>
                                <td class="border px-4 py-2">{{ $student->name }}</td>
                                <td class="border px-4 py-2">{{ $student->subject }}</td>
                                <td class="border px-4 py-2">{{ $student->marks }}</td>
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

            <x-primary-button x-on:click="openModal('student-create-form')" class="mt-5">Add</x-primary-button>

            <x-modal name="student-create-form" focusable>
                <form id="StudentCreateForm" method="POST" action="{{ route('students.store') }}" class="px-16 py-10">
                    @csrf

                    <div class="modal-body">
                        <div class="mb-3">
                            <x-input-label for="create_name" :value="__('Name')" />
                            <div class="flex">
                                <x-text-input id="create_name" class="mt-1 block w-full" type="text" name="name" required autofocus autocomplete="username" />
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="create_subject" :value="__('Subject')" />
                            <div class="flex">
                                <x-text-input id="create_subject" class="mt-1 block w-full" type="text" name="subject" required autofocus autocomplete="username" />
                            </div>
                            <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="create_marks" :value="__('Mark')" />
                            <div class="flex">
                                <x-text-input id="create_marks" class="mt-1 block w-full" type="number" name="marks" required autofocus autocomplete="username" />
                            </div>
                            <x-input-error :messages="$errors->get('marks')" class="mt-2" />
                        </div>

                        <div class="flex justify-center">
                            <x-primary-button class="mt-3">Create</x-primary-button>
                        </div>
                    </div>
                </form>
            </x-modal>

            <x-modal name="student-edit-form" focusable>
                <form id="StudentUpdateForm" method="POST" :action="`{{ route('students.update', '') }}/${student.id}`" class="px-16 py-10">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">
                        <div class="mb-3">
                            <x-input-label for="edit_name" :value="__('Name')" />
                            <div class="flex">
                                <x-text-input id="edit_name" class="mt-1 block w-full" type="text" name="name" x-model="student.name" required autofocus autocomplete="username" />
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="edit_subject" :value="__('Subject')" />
                            <div class="flex">
                                <x-text-input id="edit_subject" class="mt-1 block w-full" type="text" name="subject" x-model="student.subject" required autofocus autocomplete="username" />
                            </div>
                            <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="edit_marks" :value="__('Mark')" />
                            <div class="flex">
                                <x-text-input id="edit_marks" class="mt-1 block w-full" type="number" name="marks" x-model="student.marks" required autofocus autocomplete="username" />
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
                            Are you sure you want to delete this student?
                        </div>
                        <div class="flex justify-center">
                            <x-secondary-button x-on:click.prevent="$dispatch('close-modal', { 'name': 'confirm-student-deletion' })">Cancel</x-secondary-button>
                            <x-primary-button class="ml-4">Delete</x-primary-button>
                        </div>
                    </div>
                </form>
            </x-modal>
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
                    this.student = { ...student };
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
