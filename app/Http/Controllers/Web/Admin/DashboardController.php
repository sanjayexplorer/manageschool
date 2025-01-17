<?php 
namespace App\Http\Controllers\Web\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Helper;
class DashboardController extends Controller
{
     public function Dashboard(){
        return view('pages.dashboards.admin.dashboard');
     }
     
}