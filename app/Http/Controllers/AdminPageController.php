<?php

namespace App\Http\Controllers;

use App\Mail\MailReply;
use App\Models\Categories_sliders;
use App\Models\Category;
use App\Models\Contactdetail;
use App\Models\Contactus;
use App\Models\DonateInfo;
use App\Models\Project;
use App\Models\Sliders;
use App\Models\Video;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Psy\Readline\Hoa\Console;

use function Laravel\Prompts\alert;

class AdminPageController extends Controller
{
    public function viewsidebar()
    {
        return view('frontend.adminpage.index');
    }
    public function viewmail()
    {
        $mail = Contactus::orderBy('id', 'desc')->paginate(4);
        // $mail = Contactus::all();
        return view('frontend.adminpage.manager.mailbox', compact('mail'));
    }

    public function getreplymail($id)
    {
        $mail = Contactus::where('id', '=', $id)->select('*')->first();
        return view('frontend.adminpage.manager.replymail', compact('mail'));
    }
    public function viewmaildetail($id)
    {
        $detail = Contactus::find($id);
        $mail = Contactdetail::where('contact_id', '=', $id)->select('*')->first();
        return view('frontend.adminpage.manager.maildetail', compact('mail', 'detail'));
    }
    public function sendreplymail(Request $request, $id)
    {
        $request->validate([
            'email' => 'required',
            'message' => 'required',
            'subject' => 'required',
        ]);
        $email = $request->email;
        $message = $request->message;
        $subject = $request->subject;
        $contact = Contactus::find($id);
        $contact->status = 1;
        $contact->save();
        $detail = new Contactdetail();
        $detail->message = $message;
        $detail->contact_id = $id;
        $detail->save();
        Mail::to($email)->send(new MailReply($message, $subject));

        return redirect()->route('admin.viewmail')->with('success', 'Send Mail Success');
    }



    public function viewdashboard()
    {
        $amount = DonateInfo::select('amount')->get();
        $project = Project::selectRaw('COUNT(id) as total_projects, COUNT(CASE WHEN status = 1 THEN 1 END) as status_1')
            ->groupBy('status')
            ->get();
        $userCount = User::withTrashed()->count();

        $allproject = Project::all();

        $totalproject = $project->sum('total_projects');
        $totalstatus = $project->sum('status_1');
        $totalamount = $amount->sum('amount');

        $bigchart = $this->bigchart();
        $chartproject = $this->chartproject();
        $chartcompleted = $this->chartcompleted();
        $usercountchart = $this->usercountchart();
        $todayRegistrations = DB::table('users')
            ->whereDate('created_at', now()->toDateString())
            ->count();

        $yesterdayRegistrations = DB::table('users')
            ->whereDate('created_at', '<', now()->toDateString())
            ->count();

        $growthPercentage = 0;
        if ($yesterdayRegistrations > 0) {
            $growthPercentage = (($todayRegistrations - $yesterdayRegistrations) / $yesterdayRegistrations) * 100;
        }

        // tinh % của donate
        $todaydonate = DB::table('donate_infos')
            ->whereDate('created_at', now()->toDateString())
            ->sum('amount');
        $todaydonate2 = DB::table('donate_infos')
            ->whereDate('created_at', now()->toDateString())
            ->count();
        $perviousdonate = DB::table('donate_infos')
            ->whereDate('created_at', '<', now()->toDateString())
            ->sum('amount');
        // dump($todaydonate);
        // dump($perviousdonate);
        $donatepercentage = 0;
        if ($perviousdonate > 0) {
            $donatepercentage = (($todaydonate - $perviousdonate) / $perviousdonate) * 100;
        }
        // tinh % của project
        $todayproject = DB::table('projects')
            ->whereMonth('created_at', now()->month)
            ->count();
        $perviousproject = DB::table('projects')
            ->whereMonth('created_at', '<', now()->month)
            ->count();
        $projectprecenttage = 0;
        if ($perviousproject > 0) {
            $projectprecenttage = (($todayproject - $perviousproject) / $perviousproject) * 100;
        }
        // tính % project hoàn thành
        $todaystatus = DB::table('projects')
            ->whereMonth('created_at', now()->month)
            ->where('status', '=', 1)
            ->count();
        $previousstatus = DB::table('projects')
            ->whereMonth('created_at', '<', now()->month)
            ->where('status', '=', 1)
            ->count();
        $statusprecentage = 0;

        if ($previousstatus > 0) {
            $statusprecentage = (($todaystatus - $previousstatus) / $previousstatus) * 100;
        }
        return view('frontend.adminpage.manager.dashboard', compact('userCount', 'statusprecentage', 'projectprecenttage', 'donatepercentage', 'growthPercentage', 'allproject', 'bigchart', 'chartproject', 'totalamount', 'totalproject', 'totalstatus', 'chartcompleted', 'usercountchart'));
    }

    public function viewmanagerdesign(Request $request)

    {
        
        $sliders = Sliders::orderBy('id', 'desc')->paginate(3);
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
        $categories = Category::orderBy('id', 'desc')->get();
        // tong donate
        $donatetotal = DonateInfo::select('amount')->get();
        $totalamount = $donatetotal->sum('amount');


        return view('index', compact('slider', 'projects', 'project_finish', 'videos', 'totalamount', 'categories'));
    }
    // public function viewnav(){


    //     return view('frontend.site', compact('infouser'));
    // }



    public function GetTotalAmount()
    {
        try {
            $totalAmount = DonateInfo::sum('amount');

            return response()->json(['totalAmount' => $totalAmount]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching total amount'], 500);
        }
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
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg',
            'nameimg' => 'required',
        ]);
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
        
        if ($request->hasFile('image_update')) {
            if (File::exists($slider->url_image)) {
                $imagePath = public_path($slider->url_image);
                File::delete($imagePath);
            }
            $image = $request->file('image_update');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            $slider->url_image = 'images/' . $filename;
        }
        $slider->slider_name = $request->nameimage_update;
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
        $user = User::orderBy('id', 'desc')->paginate(4);
        return view('frontend.adminpage.manager.listuser', compact('user'));
    }

    public function changeUserStatus($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->status = request('status');
            $user->save();

            return response()->json(['success' => true, 'message' => 'User status updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'User not found'], 404);
    }
    //donate admin
    public function viewlistdonate()
    {
        $donateinfo = DonateInfo::orderBy('id', 'desc')->paginate(2);
        return view('frontend.adminpage.listdonate.list', compact('donateinfo'));
    }

    // register user
    public function registeruser(Request $request)

    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $verify_token = Str::random(6);
        $hashpass = Hash::make($request->password);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $hashpass;
        $user->role = $request->role;
        $user->verified_token = $verify_token;
        $user->status = 1;
        $user->is_volunteer = 0;
        $user->is_sponsor = 0;
        $user->save();
        return redirect()->back()->with('success', 'Create User successfully');
    }
    public function updateuser(Request $request, $id)
    {
        $verify_token = Str::random(6);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);
        $hashpass = Hash::make($request->password);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = $hashpass;
        $user->verified_token = $verify_token;
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
    public function usercountchart()
    {
        $usercount = User::withTrashed()
            ->selectRaw('DAYOFWEEK(created_at) as days, count(*) as total_users')
            ->groupBy('days')
            ->get();

        $days = [];
        $userCounts = [];

        foreach ($usercount as $count) {
            $days[] = date('l', strtotime("Sunday + {$count->day} days"));
            $userCounts[] = $count->total_users;
        }

        $data = [
            "days" => $days,
            "userCounts" => $userCounts,
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
    public function chartcompleted()
    {
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
    public function searchdashboard(Request $request)
    {
        $projects = Project::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('money2', 'like', '%' . $request->search . '%')
            ->orWhere('status', 'like', '%' . $request->search . '%')
            ->get();

        $output = '';

        foreach ($projects as $project) {
            $statusText = ($project->status == 1) ? 'Finish' : 'Unfinish';

            $output .=
                '<tr>
                    <td> ' . $project->id . ' </td>
                    <td> ' . $project->title . '</td>
                    <td> ' . $project->money2 . '</td>
                    <td> ' . $project->created_at . '</td>
                    <td> ' . $statusText . '</td>
                </tr>';
        }

        return $output;
    }
    public function searchdesign(Request $request)
    {
        $sliders = Sliders::where('slider_name', 'like', '%' . $request->search . '%')
            ->get();

        $output = '';

        foreach ($sliders as $slider) {
            $output .=
                '<tr>
                <td> ' . $slider->id . ' </td>
                <td><img src="' . asset($slider->url_image) . '" width="100" onclick="openImagePopup(\'' . asset($slider->url_image) . '\')"></td>
                <td> ' . $slider->slider_name . '</td>
                <td>
                    <a href="#" data-slider-id="' . $slider->id . '" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <button type="button" class="btn btn-success" style="margin-right: 10px;">
                            <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                        </button>
                    </a>
                </td>
                <td>
                    <form method="POST" action="' . route('admin.delete_slider', ['slider' => $slider->id]) . '">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-x" style="color: #ffffff;"></i>
                        </button>
                    </form>
                </td>
            </tr>';
        }

        return $output;
    }
    public function searchlistuser(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->orWhere('role', 'like', '%' . $request->search . '%')
            ->get();

        $output = '';

        foreach ($users as $user) {
            $output .= '<tr>
                            <td>' . $user->id . '</td>
                            <td><img src="' . asset('img/omg.jpeg') . '" class="image-hover" width="50px" height="50px" style="border-radius: 50%; margin-right: 20px">' . $user->name . '</td>
                            <td>' . $user->email . '</td>
                            <td>' . $user->role . '</td>
                            <td>';

            if ($user->status == '0') {
                $output .= '<button class="btn btn-success active" data-active="' . $user->id . '">Active</button>';
            } else {
                $output .= '<button class="btn btn-danger banned" data-banned="' . $user->id . '">Banned</button>';
            }

            $output .= '</td>
                            <td style="text-align: center">
                                <a href="#" data-user-id="' . $user->id . '" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="' . route('admin.deleteuser', $user->id) . '" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>';
        }

        return $output;
    }
    public function searchlistdonate(Request $request)
    {
        $users = DonateInfo::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('email', 'like', '%' . $request->search . '%')
            ->orWhere('phone', 'like', '%' . $request->search . '%')
            ->orWhere('project_id', 'like', '%' . $request->search . '%')
            ->orWhere('method', 'like', '%' . $request->search . '%')
            ->orWhere('amount', 'like', '%' . $request->search . '%')
            ->get();

        $output = '';

        foreach ($users as $user) {
            $output .= '<tr>
                            <td>' . $user->id . '</td>
                            <td>' . $user->name . '</td>
                            <td>' . $user->email . '</td>
                            <td>' . $user->phone . '</td>
                            <td>' . $user->project_id . '</td>
                            <td>' . $user->method . '</td>
                            <td>' . $user->amount . '</td>
                            <td class="clickmessage">' . $user->message . '</td>
                        </tr>
                        <tr class="message-hide">
                            <td colspan="8">' . $user->message . '</td>
                        </tr>';
        }

        return $output;
    }
    public function searchhome(Request $request)
    {

        $searchproject = Project::where('title', 'like', '%' . $request->search . '%')->get();

        $output = '';
        foreach ($searchproject as $project) {
            $output .= '<div class="result-search">
                            <a href="' . route('detail.post', [$project->id, Str::slug($project->title) . '.html']) . '">
                                <div class="image-search">
                                    <img src="' . asset($project->images[0]->image) . '" alt="' . $project->title . '">
                                </div>
                                <div class="text-result">
                                    ' . $project->title . '
                                </div>
                            </a>
                        </div>';
        }

        return $output;
    }




    // public function xacnhanotp(){
    //     return view('frontend.login.otp');
    // }
}
