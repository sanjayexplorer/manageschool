<?php 
namespace App\Http\Controllers\Web\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Helper;
class DashboardController extends Controller
{
     public function index(){
        return view('pages.dashboards.teacher.dashboard');
     }
     
}