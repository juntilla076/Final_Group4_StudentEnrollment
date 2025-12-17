<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Welcome Card --}}
            <section class="bg-white rounded-xl shadow-sm p-6 border">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">
                    Welcome, {{ $student->name ?? Auth::user()->name }}
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700">
                    <p>
                        <span class="font-medium">Student ID:</span>
                        {{ $student->student_id ?? 'N/A' }}
                    </p>

                    <p>
                        <span class="font-medium">Status:</span>
                        @if(isset($student->status))
                            <span class="px-2 py-1 text-sm rounded-full
                                {{ $student->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ ucfirst($student->status) }}
                            </span>
                        @else
                            N/A
                        @endif
                    </p>
                </div>
            </section>

            {{-- Course Information --}}
            <section class="bg-white rounded-xl shadow-sm p-6 border">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">
                    My Course
                </h2>

                @if(!empty($student->course))
                    <div class="p-4 bg-blue-50 rounded-lg text-blue-800">
                        {{ $student->course }}
                    </div>
                @else
                    <p class="text-gray-500 italic">
                        You are not enrolled in any courses yet.
                    </p>
                @endif
            </section>

        </div>
    </div>
</x-app-layout>
