<?php
namespace App\Http\Controllers\Web\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\ClassModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class TeacherController extends Controller
{
   
    public function index(Request $request)
    {
        $notifications = DB::table('notifications')->orderBy('created_at', 'desc')->get();
        return view('pages.portal.admin.teacher.list', compact('notifications'));
    }
    

    public function getTeachersData(Request $request)
    {
        $query = Teacher::select('id', 'first_name', 'last_name', 'status', 'created_at');
    
        return DataTables::of($query)
            ->addColumn('actions', function ($teacher) {
                return view('pages.portal.admin.teacher.partials.actions', compact('teacher'))->render();
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

        return view('pages.portal.admin.teacher.add', compact('notifications', 'classes'));
    }

    public function store(Request $request)
    {

        $messages = [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'phone.required' => 'Phone is required.',
            'gender.required' => 'Gender is required.',
            'date_of_birth.required' => 'Date of birth is required.',
            'qualification.required' => 'Qualification is required.',
            'specialization.required' => 'Specialization is required.',
            'status.required' => 'Status is required.',
        ];

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'qualification' => 'required',
            'specialization' => 'required',
            'status' => 'required',
        ], $messages);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $teacher = Teacher::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'qualification' => $request->qualification,
            'specialization' => $request->specialization,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.teachers.index');

    }
    public function show($id)
    {
        $teacher = Teacher::where('id', $id)
            ->whereIn('status', ['active', 'inactive'])
            ->first();

        $notifications = DB::table('notifications')
            ->orderBy('created_at', 'desc')
            ->get();

        if (!$teacher) {
            return redirect()->route('teachers.index');
        }

        return view('pages.portal.admin.teacher.view', compact('teacher', 'notifications'));
    }


    public function edit($id)
    {
        $teacher = Teacher::where('id', $id)
            ->whereIn('status', ['active', 'inactive'])
            ->first();
        $notifications = DB::table('notifications')
            ->orderBy('created_at', 'desc')
            ->get();
        $classes = ClassModel::with('sections')->get();
        if (!$teacher) {
            return redirect()->route('teachers.index');
        }

        return view('pages.portal.admin.teacher.edit', compact('teacher', 'classes', 'notifications'));
    }


    public function update(Request $request, $id)
    {

     

         $messages = [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'phone.required' => 'Phone is required.',
            'gender.required' => 'Gender is required.',
            'date_of_birth.required' => 'Date of birth is required.',
            'qualification.required' => 'Qualification is required.',
            'specialization.required' => 'Specialization is required.',
            'status.required' => 'Status is required.',
        ];


       $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'qualification' => 'required',
            'specialization' => 'required',
            'status' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $teacher = Teacher::whereId($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'qualification' => $request->qualification,
            'specialization' => $request->specialization,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.teachers.index');
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

}
