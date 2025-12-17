<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Enrollment Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- Header -->
<header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-blue-700">Student Enrollment Dashboard</h1>
            <p class="text-gray-500">Overview of student registration & enrollment status</p>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Logout
            </button>
        </form>
    </div>
</header>

<!-- Main -->
<main class="max-w-7xl mx-auto px-6 py-8 space-y-8">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Create Button -->
    <div class="flex justify-end">
        <button onclick="openCreateModal()"
            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Add Student
        </button>
    </div>

    <!-- Stats -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-sm text-gray-500">Total Students</h2>
            <p class="text-3xl font-bold text-blue-700">{{ $totalStudents }}</p>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-sm text-gray-500">New Enrollments Today</h2>
            <p class="text-3xl font-bold text-blue-700">{{ $enrollmentsToday }}</p>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-sm text-gray-500">Active Students</h2>
            <p class="text-3xl font-bold text-blue-700">{{ $activeStudents }}</p>
        </div>

        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-sm text-gray-500">Graduated Students</h2>
            <p class="text-3xl font-bold text-blue-700">{{ $graduatedStudents }}</p>
        </div>
    </section>

    <!-- Table -->
    <section class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-semibold text-blue-700 mb-4">Recent Enrollments</h2>

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-4 py-2 text-left text-xs">Name</th>
                    <th class="px-4 py-2 text-left text-xs">Student ID</th>
                    <th class="px-4 py-2 text-left text-xs">Course</th>
                    <th class="px-4 py-2 text-left text-xs">Date</th>
                    <th class="px-4 py-2 text-left text-xs">Status</th>
                    <th class="px-4 py-2 text-left text-xs">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y">
            @foreach($recentEnrollments as $student)
                <tr>
                    <td class="px-4 py-2">{{ $student->name }}</td>
                    <td class="px-4 py-2">{{ $student->student_id }}</td>
                    <td class="px-4 py-2">{{ $student->course }}</td>
                    <td class="px-4 py-2">{{ $student->created_at->format('Y-m-d') }}</td>
                    <td class="px-4 py-2">{{ $student->status }}</td>
                    <td class="px-4 py-2 flex gap-2">

                        <button onclick="openEditModal(
                            {{ $student->id }},
                            '{{ $student->name }}',
                            '{{ $student->student_id }}',
                            '{{ $student->course }}',
                            '{{ $student->status }}'
                        )"
                        class="bg-blue-600 text-white px-3 py-1 rounded text-sm">
                            Edit
                        </button>

                        <form method="POST" action="{{ route('students.destroy', $student->id) }}"
                              onsubmit="return confirm('Permanently delete this student?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded text-sm">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>

</main>

<!-- CREATE MODAL -->
<div id="createModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded w-96">
        <h3 class="text-lg font-semibold mb-4">Add Student</h3>

        <form method="POST" action="{{ route('students.store') }}">
            @csrf

            <input name="name" placeholder="Name" class="w-full border p-2 rounded mb-3" required>
            <input name="student_id" placeholder="Student ID" class="w-full border p-2 rounded mb-3" required>
            <input name="course" placeholder="Course" class="w-full border p-2 rounded mb-3" required>

            <select name="status" class="w-full border p-2 rounded mb-4">
                <option>Pending</option>
                <option>Enrolled</option>
                <option>Dropped</option>
            </select>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeCreateModal()" class="bg-gray-300 px-3 py-2 rounded">
                    Cancel
                </button>
                <button class="bg-green-600 text-white px-3 py-2 rounded">
                    Create
                </button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT MODAL -->
<div id="editModal" class="fixed inset-0 hidden bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded w-96">
        <h3 class="text-lg font-semibold mb-4">Edit Student</h3>

        <form id="editForm" method="POST">
            @csrf
            @method('PATCH')

            <input id="modalName" name="name" class="w-full border p-2 rounded mb-3" required>
            <input id="modalStudentID" name="student_id" class="w-full border p-2 rounded mb-3" required>
            <input id="modalCourse" name="course" class="w-full border p-2 rounded mb-3" required>

            <select id="modalStatus" name="status" class="w-full border p-2 rounded mb-4">
                <option>Pending</option>
                <option>Enrolled</option>
                <option>Dropped</option>
            </select>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeEditModal()" class="bg-gray-300 px-3 py-2 rounded">
                    Cancel
                </button>
                <button class="bg-blue-600 text-white px-3 py-2 rounded">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openCreateModal() {
    document.getElementById('createModal').classList.remove('hidden');
}
function closeCreateModal() {
    document.getElementById('createModal').classList.add('hidden');
}
function openEditModal(id, name, studentId, course, status) {
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('modalName').value = name;
    document.getElementById('modalStudentID').value = studentId;
    document.getElementById('modalCourse').value = course;
    document.getElementById('modalStatus').value = status;
    document.getElementById('editForm').action = `/students/${id}`;
}
function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}
</script>

</body>
</html>
