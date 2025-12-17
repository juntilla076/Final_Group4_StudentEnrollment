<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Students
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">

                @if (session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('students.create') }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Add Student
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Name</th>
                                <th class="px-4 py-2 border">Email</th>
                                <th class="px-4 py-2 border">Course</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr class="text-center">
                                    <td class="px-4 py-2 border">{{ $student->id }}</td>
                                    <td class="px-4 py-2 border">{{ $student->user->name }}</td>
                                    <td class="px-4 py-2 border">{{ $student->user->email }}</td>
                                    <td class="px-4 py-2 border">{{ $student->course }}</td>
                                    <td class="px-4 py-2 border space-x-2">

                                        <a href="{{ route('students.show', $student) }}"
                                           class="text-blue-600 hover:underline">
                                            View
                                        </a>

                                        <a href="{{ route('students.edit', $student) }}"
                                           class="text-yellow-600 hover:underline">
                                            Edit
                                        </a>

                                        <form action="{{ route('students.destroy', $student) }}"
                                              method="POST"
                                              class="inline"
                                              onsubmit="return confirm('Delete this student?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 hover:underline">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                        No students found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $students->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
