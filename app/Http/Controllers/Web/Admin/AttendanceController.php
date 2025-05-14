<?php
namespace App\Http\Controllers\Web\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Student;
use App\Models\ClassModel;
use App\Models\Section;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
class AttendanceController extends Controller
{

    public function index(Request $request)
    {
        $notifications = DB::table('notifications')->orderBy('created_at', 'desc')->get();
        $classes = ClassModel::has('students')->orderBy('created_at', 'desc')->get();
        return view('pages.portal.admin.attendance.list', compact('notifications', 'classes'));
    }

    public function classStudents(Request $request, $classId)
    {

        $perPage = 15;
        $page = $request->page ?? 1;
     
        $sections = Section::where('class_id', $classId)->has('students')->orderBy('created_at', 'desc')->get();

        if ($sections->isEmpty()) {
            return redirect()->back()->with('error', 'No section found for this class.');
        }

        $sectionId = $request->section_id ?? $sections->first()->id;
        $attendanceDate = $request->date ?? now()->toDateString();
        $roleNumber = $request->role_number ?? null;
        $studentQuery = Student::where('section_id', $sectionId)
            ->whereIn('status', ['active', 'inactive'])
            ->with([
                'attendances' => function ($query) use ($attendanceDate) {
                    $query->where('date', $attendanceDate);
                }
            ])
            ->when($roleNumber, function ($query) use ($roleNumber) {
                $query->where('role_number', $roleNumber);
            })
            ->orderBy('created_at', 'desc')
            ->skip(($page - 1) * $perPage)
            ->take($perPage);


        $students = $studentQuery->get();

        $summary = $this->getAttendanceSummary($students);

        if ($request->ajax()) {
            return view('pages.portal.admin.attendance.students.partials-list', [
                'students' => $students,
                'currentPage' => $page,
                'attendanceDate' => $attendanceDate,
                 'summary' => $summary,
            ])->render();
        }

        $notifications = DB::table('notifications')->orderBy('created_at', 'desc')->get();

        return view('pages.portal.admin.attendance.students.list', [
            'students' => $students,
            'notifications' => $notifications,
            'currentPage' => $page,
            'classId' => $classId,
            'sections' => $sections,
            'sectionId' => $sectionId,
            'attendanceDate' => $attendanceDate,
             'summary' => $summary,
        ]);
    }

    private function getAttendanceSummary($students)
{
    $present = $students->filter(fn($s) => $s->attendances->first()?->status === 'present')->count();
    $absent  = $students->filter(fn($s) => $s->attendances->first()?->status === 'absent')->count();
    $late    = $students->filter(fn($s) => $s->attendances->first()?->status === 'late')->count();

    return [
        'present' => $present,
        'absent'  => $absent,
        'late'    => $late,
    ];
}


    public function storeAttendance(Request $request)
    {
        $request->validate([
            'attendance.*' => 'required|in:present,absent,late',
        ]);

        if(!$request->attendance){
            return response()->json(['success' => true, 'error' => false, 'msg' => 'Something went wrong!']);
        }

        foreach ($request->attendance as $studentId => $status) {
            Attendance::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'date' => now()->toDateString(),
                ],
                [
                    'status' => $status,
                ]
            );
        }
        return response()->json(['success' => true, 'error' => false, 'msg' => 'Attendance saved successfully!']);
    }

}
