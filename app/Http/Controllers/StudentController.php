<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; // ✅ THIS LINE WAS MISSING
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('user')->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email',
            'course' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make('password123'),
            'role'     => 'student',
        ]);

        Student::create([
            'user_id' => $user->id,
            'course'  => $request->course,
            'status'  => 'Enrolled',
        ]);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|max:255',
            'course' => 'required|string|max:255',
            'status' => 'required|in:Pending,Enrolled,Dropped',
            return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
        ]);

        // Update user info
        $student->user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        // Update student info
        $student->update([
            'course' => $request->course,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->user->delete(); // cascades if set properly
        return back()->with('success', 'Student deleted.');
    }
}
