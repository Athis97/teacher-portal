@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Students</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add New Student</button>
    </div>

    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Subject</th>
                <th class="px-4 py-2">Marks</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td contenteditable="true" data-id="{{ $student->id }}" data-field="name" class="border px-4 py-2">{{ $student->name }}</td>
                    <td contenteditable="true" data-id="{{ $student->id }}" data-field="subject" class="border px-4 py-2">{{ $student->subject }}</td>
                    <td contenteditable="true" data-id="{{ $student->id }}" data-field="marks" class="border px-4 py-2">{{ $student->marks }}</td>
                    <td class="border px-4 py-2">
                        <button class="btn btn-danger" onclick="deleteStudent({{ $student->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add Student Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addStudentForm" method="POST" action="{{ route('students.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="marks" class="form-label">Marks</label>
                            <input type="number" class="form-control" id="marks" name="marks" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('td[contenteditable=true]').forEach(cell => {
            cell.addEventListener('blur', function() {
                let id = this.dataset.id;
                let field = this.dataset.field;
                let value = this.textContent;

                fetch(`/students/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        [field]: value
                    })
                }).then(response => response.json())
                  .then(data => {
                      if (!data.success) {
                          alert('Error updating student details');
                      }
                  });
            });
        });

        function deleteStudent(id) {
            fetch(`/students/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      location.reload();
                  } else {
                      alert('Error deleting student');
                  }
              });
        }
    </script>
</div>
@endsection
