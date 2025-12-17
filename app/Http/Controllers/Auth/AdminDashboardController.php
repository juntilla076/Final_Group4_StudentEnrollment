<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total students
        $totalStudents = Student::count();

        // New enrollments today
        $enrollmentsToday = Student::whereDate('created_at', now())->count();

        // Active students
        $activeStudents = Student::where('status', 'Enrolled')->count();

        // Graduated students
        $graduatedStudents = Student::where('status', 'Graduated')->count();

        // Recent enrollments (last 5)
        $recentEnrollments = Student::orderBy('created_at', 'desc')->take(5)->get();

        // Pass all variables to the view
        return view('admin.dashboard', compact(
            'totalStudents',
            'enrollmentsToday',
            'activeStudents',
            'graduatedStudents',
            'recentEnrollments'
        ));
    }
}
