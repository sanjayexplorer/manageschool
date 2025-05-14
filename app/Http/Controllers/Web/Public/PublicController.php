<?php 
namespace App\Http\Controllers\Web\Public;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Inquiry;
use App\Notifications\DynamicNotification;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryEmail;
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
            'message.required' => 'Message is required.',
        ];
    
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
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
            'message' => $request->input('message'),
        ]);
    
        $notificationData = [
            'type' => 'inquiry',
            'subject' => 'New Inquiry from ' . $inquiry->name,
            'message' => $inquiry->message,
            'email' => $inquiry->email,
        ];

        
       $admin = User::where('id', '!=', auth()->id())
       ->whereIn('status', ['active', 'inactive'])
       ->whereHas('roles', function ($query) {
           $query->where('name', 'admin');
       })
       ->first();

       if ($admin) {
        $admin->notify(new DynamicNotification($notificationData));
        // $admin->notify((new DynamicNotification($notificationData))->delay(now()->addSeconds(5)));

      }

        Session::flash('success', 'Form submitted successfully.');
        return redirect()->route('welcome'); 
    }
    
    
    public function imageUpload(Request $request){
        return response()->json(['success', true, 'error' => false,'msg'=>'image uploded successfully']);
    }
    public function inquiryEmail(){
        $to = 'barethsanjay37@gmail.com';
        $msg = 'Dummy mail';
        $subject = 'from manageschool';
        $senderEmail = 'sender@example.com';
        Mail::to($to)->send(new InquiryEmail($msg, $subject, $senderEmail));
    }
    
}
