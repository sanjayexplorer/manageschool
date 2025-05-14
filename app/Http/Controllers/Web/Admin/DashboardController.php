<?php 
namespace App\Http\Controllers\Web\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
class DashboardController extends Controller
{
     public function index(){
          
      $notifications = DB::table('notifications')
      ->orderBy('created_at', 'desc')
      ->get();
    

        return view('pages.dashboards.admin.dashboard', compact('notifications'));
     }
     
}