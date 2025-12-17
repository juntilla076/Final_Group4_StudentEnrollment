<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student Details
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200">
                        <tbody>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-2 border text-left w-1/3">ID</th>
                                <td class="px-4 py-2 border">{{ $student->id }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border text-left">Name</th>
                                <td class="px-4 py-2 border">{{ $student->user->name }}</td>
                            </tr>
                            <tr class="bg-gray-50">
                                <th class="px-4 py-2 border text-left">Email</th>
                                <td class="px-4 py-2 border">{{ $student->user->email }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 border text-left">Course</th>
                                <td class="px-4 py-2 border">{{ $student->course }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <a href="{{ route('students.index') }}"
                       class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                        Back
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
