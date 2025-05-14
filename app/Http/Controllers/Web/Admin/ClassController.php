<?php

namespace App\Http\Controllers\Web\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Student;
use App\Models\ClassModel;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function index(Request $request)
    {
        $notifications = DB::table('notifications')->orderBy('created_at', 'desc')->get();
        $classes = ClassModel::orderBy('created_at', 'desc')->get();
        $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('pages.portal.admin.assign-class.list', compact('notifications', 'classes', 'teachers'));
    }

    public function assign(Request $request){
        return response()->json(['success' => true,'error' => false,
            'message' => 'Class assigned successfully']);
    }

}
