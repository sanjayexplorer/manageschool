<?php 
namespace App\Http\Controllers\Web\Public;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Helper;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Models\Inquiry;
use Session;
class PublicController extends Controller
{

    public function index() {
        return view('welcome');
    }
    public function inquiryPost(Request $request)
    {
        $messages = [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'query.required' => 'Query is required.',
        ];
    
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'query' => 'required',
        ], $messages);
    
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator)
                ->with('error', 'Validation error. Please correct the errors and try again.');
        }
    
        $inquiry = Inquiry::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'query' => $request->input('query'),
        ]);

        Session::flash('success', 'Form submitted successfully.');
        return redirect()->route('welcome'); 
    }
    
     
}