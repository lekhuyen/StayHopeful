<?php

namespace App\Http\Controllers;

use App\Models\Categories_sliders;
use App\Models\DonateInfo;
use App\Models\Project;
use App\Models\Sliders;
use App\Models\Video;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Psy\Readline\Hoa\Console;

use function Laravel\Prompts\alert;

class AdminPageController extends Controller
{
    public function viewsidebar()
    {
        return view('frontend.adminpage.index');
    }
    public function viewdashboard()
    {
        $amount = DonateInfo::select('amount')->get();
        $project = Project::selectRaw('COUNT(id) as total_projects, COUNT(CASE WHEN status = 1 THEN 1 END) as status_1')
            ->groupBy('status')
            ->get();
        $allproject = Project::all();
        $totalproject = $project->sum('total_projects');
        $totalstatus = $project->sum('status_1');
        $totalamount = $amount->sum('amount');

        $bigchart = $this->bigchart();
        $chartproject = $this->chartproject();
        $chartcompleted = $this->chartcompleted();
        return view('frontend.adminpage.manager.dashboard', compact('allproject','bigchart', 'chartproject', 'totalamount', 'totalproject', 'totalstatus', 'chartcompleted'));
    }
    public function viewmanagerpost()
    {
        return view('frontend.adminpage.manager.post');
    }
    public function viewmanagerdesign()
    {
        $sliders = Sliders::paginate(4);
        return view('frontend.adminpage.manager.design', compact('sliders'));
    }
    public function sliderview()
    {
        $projects = Project::orderBy('id', 'desc')
            ->where('status', 0)
            ->limit(3)
            ->get();
        $project_finish = Project::orderBy('id', 'desc')
            ->where('status', 1)
            ->limit(4)
            ->get();
        $videos = Video::orderBy('id', 'desc')->limit(3)->get();

        $slider = Sliders::all();

        return view('index', compact('slider', 'projects', 'project_finish', 'videos'));
    }
    public function getdonateuser()
    {
        $userinfoCollection = DonateInfo::orderBy('created_at', 'desc')->limit(10)->get();

        foreach ($userinfoCollection as $userinfo) {
            $timecreate = $userinfo->created_at;
            $timenow = Carbon::now();
            $timedifference = $timenow->diffInMinutes($timecreate);

            $userinfo->formattedTime = Carbon::now()->subMinutes($timedifference)->diffForHumans();
            $userinfo->imageURL = asset('img/humanicon.png');
        }
        return response()->json(['userinfoCollection' => $userinfoCollection]);

    }
    public function create_slider(Request $request)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $slider = new Sliders();
            $slider->url_image = 'images/' . $filename;
            $slider->slider_name = $request->nameimg;
            $slider->save();

        }

        return redirect()->back()->with('success', 'Slider created successfully');
    }
    public function update_slider(Request $request, Sliders $slider)
    {
        if ($request->hasFile('image')) {
            if (File::exists($slider->url_image)) {
                $imagePath = public_path($slider->url_image);
                File::delete($imagePath);
            }
            $image = $request->file('image');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $slider->url_image = 'images/' . $filename;
        }
        $slider->slider_name = $request->nameimage;
        $slider->save();

        return redirect()->back()->with('success', 'Success update Sliders');


    }
    public function delete_slider(Sliders $slider)
    {
        $imagePath = public_path($slider->url_image);

        $slider->delete();

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        return redirect()->back()->with('success', 'Slider deleted successfully');
    }
    public function getSliderImage($id)
    {
        $slider = Sliders::find($id);
        return response()->json([
            'url' => asset($slider->url_image),
            'slider_name' => $slider->slider_name
        ]);
    }
    public function viewlistuser()
    {
        $user = User::paginate(6);
        return view('frontend.adminpage.manager.listuser', compact('user'));
    }

    //donate admin
    public function viewlistdonate()
    {
        $donateinfo = DonateInfo::all();
        return view('frontend.adminpage.listdonate.list', compact('donateinfo'));
    }

    // register user
    public function registeruser(Request $request)
    {
        $hashpass = Hash::make($request->password);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $hashpass;
        $user->role = $request->role;
        $user->status = 0;
        $user->save();
        return redirect()->back()->with('success', 'Create User successfully');
    }
    public function updateuser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Not found user');
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        // $user->status = $request->status;
        $user->save();
        return redirect()->back()->with('success', 'Update User successfully');
    }
    public function getiduser($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    public function deleteuser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'Delete User successfully');

    }
    public function banned($id)
    {
        $now = date('Y-m-d H:i:s');
        try {
            DB::table('users')->where('id', $id)->update([
                'status' => 0,
                'deleted_at' => $now,
            ]);
            return response()->json(['message' => 'User has been Active']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error banned: ' . $e->getMessage()]);

        }

    }
    public function active($id)
    {
        $now = date('Y-m-d H:i:s');
        try {
            DB::table('users')->where('id', $id)->update([
                'status' => 1,
                'deleted_at' => $now,
            ]);
            return response()->json(['message' => 'User has been Banned']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error Active: ' . $e->getMessage()]);

        }

    }

    public function bigchart()
    {
        $amountday = DonateInfo::selectRaw('DAYOFWEEK(created_at) as days, SUM(amount) as total_amount')
            ->groupBy('days')
            ->get();

        $days = [];
        $amounts = [];

        foreach ($amountday as $amount) {
            $days[] = date('l', strtotime("Sunday + {$amount->days} days"));
            $amounts[] = $amount->total_amount;
        }

        $data = [
            "days" => $days,
            "amounts" => $amounts,
        ];

        return $data;
    }
    public function chartproject()
    {
        $project = Project::selectRaw('MONTH(created_at) as months, COUNT(id) as projectid')
            ->groupBy('months')
            ->get();

        $ids = [];
        $months = [];

        foreach ($project as $p) {
            $ids[] = $p->projectid;
            $months[] = date('F', strtotime("{$p->months}-01"));
        }

        $data = [
            'ids' => $ids,
            'months' => $months,
        ];

        return $data;
    }
    public function chartcompleted(){
        $project = Project::selectRaw('MONTH(created_at) as months, COUNT(CASE WHEN status = 1 THEN 1 END) as projectstatus')
            ->groupBy('months')
            ->get();

        $status = [];
        $months = [];

        foreach ($project as $p) {
            $status[] = $p->projectstatus;
            $months[] = date('F', strtotime("{$p->months}-01"));
        }

        $data = [
            'status' => $status,
            'months' => $months,
        ];

        return $data;
    }
}
