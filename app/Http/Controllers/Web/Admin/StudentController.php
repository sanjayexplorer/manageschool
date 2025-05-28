<?php
namespace App\Http\Controllers\Web\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Section;
use App\Models\ClassModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon;
class StudentController extends Controller
{
    // public function index(Request $request)
    // {
    //     $perPage = 10;
    //     $page = $request->page ?? 1;

    //     $students = Student::whereIn('status', ['active', 'inactive'])
    //         ->orderBy('created_at', 'desc')
    //         ->skip(($page - 1) * $perPage)
    //         ->take($perPage)
    //         ->get();

    //     if ($request->ajax()) {
    //         return view('pages.portal.admin.student.partials-list', [
    //             'students' => $students,
    //             'currentPage' => $page
    //         ])->render();
    //     }

    //     $notifications = DB::table('notifications')->orderBy('created_at', 'desc')->get();

    //     return view('pages.portal.admin.student.list', [
    //         'students' => $students,
    //         'notifications' => $notifications,
    //         'currentPage' => $page
    //     ]);
    // }

    public function index(Request $request)
    {
        $notifications = DB::table('notifications')->orderBy('created_at', 'desc')->get();
        return view('pages.portal.admin.student.list', compact('notifications'));
    }


    public function getStudentsData(Request $request)
    {
        $query = Student::select('id', 'first_name', 'last_name', 'status', 'created_at');

        return DataTables::of($query)
            ->addColumn('actions', function ($student) {
                return view('pages.portal.admin.student.partials.actions', compact('student'))->render();
            })
            ->rawColumns(['actions'])
            ->make(true);
    }


    public function create()
    {
        $notifications = DB::table('notifications')
            ->orderBy('created_at', 'desc')
            ->get();

        $classes = ClassModel::with('sections')->get();

        return view('pages.portal.admin.student.add', compact('notifications', 'classes'));
    }

    public function store(Request $request)
    {

        $messages = [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'phone.required' => 'Phone is required.',
            'gender.required' => 'Gender is required.',
            'dob.required' => 'Date of birth is required.',
            'address_line_1.required' => 'Address line 1 is required.',
            'class_id.required' => 'Class is required.',
            'admission_date.required' => 'Admission date is required.',
            'status.required' => 'Status is required.',
        ];

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'address_line_1' => 'required',
            'class_id' => 'required',
            'admission_date' => 'required',
            'status' => 'required',
        ], $messages);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $classId = $request->class_id;

        $studentCount = Student::where('class_id', $classId)->count();

        $newRollNumber = $studentCount + 1;

        $studentsPerSection = 50;
        $sectionIndex = floor($studentCount / $studentsPerSection);
        $sectionLetter = chr(65 + $sectionIndex);


        $section = Section::firstOrCreate([
            'class_id' => $classId,
            'name' => $sectionLetter,
        ]);

        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'address_line_1' => $request->address_line_1,
            'class_id' => $classId,
            'section_id' => $section->id,
            'roll_number' => $newRollNumber,
            'admission_date' => $request->admission_date,
            'guardian_name' => $request->guardian_name,
            'guardian_relation' => $request->guardian_relation,
            'guardian_email' => $request->guardian_email,
            'guardian_phone' => $request->guardian_phone,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.students.index');

    }
    public function show($id)
    {
        $student = Student::where('id', $id)
            ->whereIn('status', ['active', 'inactive'])
            ->first();

        $notifications = DB::table('notifications')
            ->orderBy('created_at', 'desc')
            ->get();

        if (!$student) {
            return redirect()->route('students.index');
        }

        return view('pages.portal.admin.student.view', compact('student', 'notifications'));
    }


    public function edit($id)
    {
        $student = Student::where('id', $id)
            ->whereIn('status', ['active', 'inactive'])
            ->first();
        $notifications = DB::table('notifications')
            ->orderBy('created_at', 'desc')
            ->get();
        $classes = ClassModel::with('sections')->get();
        if (!$student) {
            return redirect()->route('students.index');
        }

        return view('pages.portal.admin.student.edit', compact('student', 'classes', 'notifications'));
    }


    public function update(Request $request, $id)
    {

        $messages = [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'phone.required' => 'Phone is required.',
            'gender.required' => 'Gender is required.',
            'dob.required' => 'Date of birth is required.',
            'address_line_1.required' => 'Address line 1 is required.',
            'class_id.required' => 'Class is required.',
            'admission_date.required' => 'Admission date is required.',
            'status.required' => 'Status is required.',
        ];

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'address_line_1' => 'required',
            'class_id' => 'required',
            'admission_date' => 'required',
            'status' => 'required',
        ], $messages);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $student = Student::whereId($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'address_line_1' => $request->address_line_1,
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'roll_number' => $request->roll_number,
            'admission_date' => $request->admission_date,
            'guardian_name' => $request->guardian_name,
            'guardian_relation' => $request->guardian_relation,
            'guardian_email' => $request->guardian_email,
            'guardian_phone' => $request->guardian_phone,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.students.index');
    }

    public function destroy(Request $request, $id)
    {
        if (!$id) {
            return response([
                'success' => false,
                'error' => true,
                'msg' => 'Something went wrong'
            ]);
        }

        return response([
            'success' => true,
            'error' => false,
            'msg' => 'Deleted successfully'
        ]);
    }


    public function bulkUpload()
    {
        $notifications = DB::table('notifications')->orderBy('created_at', 'desc')->get();
        return view('pages.portal.admin.student.bulk-upload', compact('notifications'));
    }


    public function handleBulkUpload(Request $request)
    {

        $request->validate([
            'admissions' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('admissions');
        $path = $file->getRealPath();
       

        if (($handle = fopen($path, 'r')) !== false) {
            $isHeader = true;

            while (($row = fgetcsv($handle, 1000, ',')) !== false) {

                if ($isHeader) {
                     dd(vars: $isHeader);
                    $isHeader = false;
                    continue;
                }

                if (count($row) < 13) {
                    continue;
                }


                dd(\Carbon\Carbon::parse($row[4])->format('Y-m-d'));

                $classId = $request->class_id;

                $studentCount = Student::where('class_id', $classId)->count();

                $newRollNumber = $studentCount + 1;

                $studentsPerSection = 50;
                $sectionIndex = floor($studentCount / $studentsPerSection);
                $sectionLetter = chr(65 + $sectionIndex);


                $section = Section::firstOrCreate([
                    'class_id' => $classId,
                    'name' => $sectionLetter,
                ]);
                

                Student::create([
                    'first_name' => $row[0],
                    'last_name' => $row[1],
                    'email' => $row[2],
                    'phone' => $row[3],
                    'dob' => \Carbon\Carbon::parse($row[4])->format('Y-m-d'),
                    'gender' => $row[5],
                    'address_line_1' => $row[6],
                    'class_id' => $classId,
                    'section_id' => $section->id,
                    'roll_number' => $newRollNumber,
                    'admission_date' => \Carbon\Carbon::parse($row[7])->format('Y-m-d'),
                    'guardian_name' => $row[8],
                    'guardian_relation' => $row[9],
                    'guardian_email' => $row[10],
                    'guardian_phone' => $row[11],
                    'status' => $row[12],
                ]);
                dd($row[0]);
            }

            fclose($handle);
        }

    }



//     public function importRiskCategories(Request $request)
// {
//     $request->validate([
//         'file' => 'required|mimes:xlsx,csv',
//     ]);

//     $filePath = $request->file('file')->store('temp');
//     $file = fopen(storage_path("app/{$filePath}"), "r");
//     $rowIndex = 0;
    
//     while (($row = fgetcsv($file)) !== false) {
//         $rowIndex++;
//         if ($rowIndex > 2) {
//                 States::create([
//                     'state' => $row[0],
//                     'cities' => $row[1],
//                     'risk_1' => json_encode(array('wind' => $row[2], 'ice' => $row[3], 'snow' => $row[4])),
//                     'risk_2' => json_encode(array('wind' => $row[5], 'ice' => $row[6], 'snow' => $row[7])),
//                     'risk_3' => json_encode(array('wind' => $row[8], 'ice' => $row[9], 'snow' => $row[10])),
//                     'risk_4' => json_encode(array('wind' => $row[11], 'ice' => $row[12], 'snow' => $row[13])),
//                     'building_code' => $row[14],
//                     'ASCE_code' => $row[15]
//                 ]);
//             }
//     }
// }

}

