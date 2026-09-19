<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InfosRequestValidation;
use App\Http\Requests\SocialsRequestValidation;
use App\Http\Requests\MetasRequestValidation;
use App\Http\Requests\UsersRequestValidation;
use App\Http\Requests\HeadingsRequestValidation;
use Illuminate\Support\Facades\Route;
use App;
use Hash;
use Auth;
use Session;

class SettingsController extends Controller
{
    public function lookups()
    {
        return view('Backend.lookups', [
            'districts' => App\District::orderBy('id', 'desc')->paginate(15, ['*'], 'district_page'),
            'districtOptions' => App\District::orderBy('name')->get(),
            'townships' => App\Township::with('district')->orderBy('id', 'desc')->paginate(15, ['*'], 'township_page'),
            'positions' => App\Position::orderBy('id', 'desc')->paginate(15, ['*'], 'position_page'),
        ]);
    }

    public function updateLookup(Request $request, $type, $id)
    {
        $model = $type === 'district' ? App\District::class : ($type === 'township' ? App\Township::class : App\Position::class);
        $item = $model::findOrFail($id);
        $item->name = $request->name;
        $item->name_en = $request->name_en ?: $request->name;
        if ($type === 'township') $item->district_id = $request->district_id;
        $item->save();
        return back()->with('success', ucfirst($type).' updated successfully.');
    }

    public function deleteLookup($type, $id)
    {
        if ($type === 'district' && App\Township::where('district_id', $id)->exists()) {
            return back()->with('danger', 'This district is in use by one or more townships and cannot be deleted.');
        }
        if ($type === 'township' && App\News::where('tsp', $id)->exists()) {
            return back()->with('danger', 'This township is in use by one or more news records and cannot be deleted.');
        }
        if ($type === 'position' && (App\News::where('position', $id)->exists() || App\Team::where('position', $id)->exists())) {
            return back()->with('danger', 'This position is in use and cannot be deleted.');
        }
        $model = $type === 'district' ? App\District::class : ($type === 'township' ? App\Township::class : App\Position::class);
        $model::findOrFail($id)->delete();
        return back()->with('success', ucfirst($type).' deleted successfully.');
    }
/**
* Display Our Settings Page.
*
* @return \Illuminate\Http\Response
*/
    public function index()
    {
        $info = App\Info::find(1);
        $socials = App\Social::find(1);
        $metas = App\Meta::find(1);
        $admin = Auth::user();
        $color = App\Color::find(1);
        $homePage = App\HomePage::find(1);
        $heading = App\Heading::find(1);
        $navbar = App\Navbar::all();
        $admin = Auth::user();
        $users = App\User::all();
        $districts = App\District::all();
        $townships = App\Township::all();
        $departments = App\Department::all();
        $positions = App\Position::all();
        return view('Backend.settings')->with([
        'info' => $info,
        'socials' => $socials,
        'metas' => $metas,
        'admin' => $admin,
        'color' => $color,
        'homePage' => $homePage,
        'navbar' => $navbar,
        'heading' => $heading,
        'admin' => $admin,
        'users' => $users,
        'districts' => $districts,
        'townships' => $townships,
        'departments' => $departments,
        'positions' => $positions,
        ]);
    }
/**
* Update Company Infos.
*
* @param  \Illuminate\Http\InfosRequestValidation  $request
* @return \Illuminate\Http\Response
*/
    public function updateCompany(InfosRequestValidation $request)
    {
        $infoToUpdate = App\Info::find(1);
        $infoToUpdate->name = $request->name;
        $infoToUpdate->email = $request->email;
        $infoToUpdate->phone = $request->phone;
        $infoToUpdate->address = $request->address;
        $infoToUpdate->country = $request->country;
        $infoToUpdate->state = $request->state;
        $infoToUpdate->city = $request->city;
        $infoToUpdate->zipcode = $request->zipcode;
        $infoToUpdate->save();
        Session::flash('success', 'Your Informations has been updated successfully.');
        return redirect()->back();
    }
/**
* Update Social Media Links.
*
* @param  \Illuminate\Http\SocialsRequestValidation  $request
* @return \Illuminate\Http\Response
*/
    public function updateSocials(SocialsRequestValidation $request)
    {
        $socialToUpdate = App\Social::find(1);
        $socialToUpdate->facebook = $request->facebook;
        $socialToUpdate->twitter = $request->twitter;
        $socialToUpdate->linkedin = $request->linkedin;
        $socialToUpdate->instagram = $request->instagram;
        $socialToUpdate->youtube = $request->youtube;
        $socialToUpdate->vimeo = $request->vimeo;
        $socialToUpdate->save();
        Session::flash('success', 'Your Social Media Links has been updated successfully.');
        return redirect()->back();
    }
/**
* Update Meta Tags Data.
*
* @param  \Illuminate\Http\MetasRequestValidation  $request
* @return \Illuminate\Http\Response
*/
    public function updateMetas(MetasRequestValidation $request)
    {
        $metaToUpdate = App\Meta::find(1);
        $metaToUpdate->title = $request->title;
        $metaToUpdate->description = $request->description;
        $metaToUpdate->keywords = $request->keywords;
        $metaToUpdate->copyright = $request->copyright;
        if (!empty($request->file('favicon'))) {
            unlink('uploads/' . $metaToUpdate->favicon);
            $favicon = time() . $request->file('favicon')->getClientOriginalName();
            $request->favicon->move('uploads/', $favicon);
            $metaToUpdate->favicon = $favicon;
        }
        $metaToUpdate->save();
        Session::flash('success', 'Your Meta Data Tags has been updated successfully.');
        return redirect()->back();
    }
/**
* Update Theme Color.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
    public function updateColor(Request $request)
    {
        $colorUpdate = App\Color::find(1);
        $colorUpdate->color = $request->color;
        $colorUpdate->save();
        Session::flash('success', 'Your Theme Color has been updated successfully.');
        return redirect()->back();
    }
/**
* Update Home Page Customization.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
    public function updateHomePage(Request $request)
    {
        $homePage = App\HomePage::find(1);
        $homePage->slider = $request->slider;
        $homePage->history = $request->history;
        $homePage->features = $request->features;
        $homePage->services = $request->services;
        $homePage->projects = $request->projects;
        $homePage->counter = $request->counter;
        $homePage->faq = $request->faq;
        $homePage->team = $request->team;
        $homePage->pricing = $request->pricing;
        $homePage->testimonials = $request->testimonials;
        $homePage->partners = $request->partners;
        $homePage->news = $request->news;
        $homePage->save();
        Session::flash('success', 'Your Home Page has Been Customized Successfully');
        return redirect()->back();
    }
/**
* Store Updated Navbar Item Title.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
    public function storeNavbar(Request $request, $id)
    {
        $item = App\Navbar::find($id);
        $item->title = $request->title;
        $item->save();
        Session::flash('success', 'Your Navbar Item Has been Updated Successfully');
        return redirect()->route('settingspage');
    }
/**
* Store Updated Navbar Item Appearance.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
    public function storeNavbarShow(Request $request, $id)
    {
        $item = App\Navbar::find($id);
        $item->appear = $request->appear;
        $item->save();
        Session::flash('success', 'Your Navbar Item Appearance Has been Updated Successfully');
        return redirect()->route('settingspage');
    }
/**
* Add New Admin Account.
*
* @param  \Illuminate\Http\UsersRequestValidation  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
    public function addAdmin(UsersRequestValidation $request)
    {
        
        $newAdmin = App\User::create([
        'name' => $request->name,
        'about' => $request->about,
        'role' => $request->role,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        ]);
        $newAdmin->save();
        Session::flash('success', 'Your New Admin Account has been created successfully');
        return redirect()->back();
    }
/**
* Update Admin Password.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
    public function updateAdminPassword(Request $request)
    {
        $admin = Auth::user();
        $currentpass = $request->current_password;
        $new = $request->new_password;
        $admin->email = $request->new_email;
        $confirm = $request->confirm_password;
        if (Hash::check($currentpass, $admin->password) && $new == $confirm) {
            $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:5',
            ]);
            $admin->password = bcrypt($request->new_password);
            $admin->save();
            Session::flash('success', 'Your Password Has Been Changed successfully');
            return redirect()->back();
        } else {
            Session::flash('danger', 'Please Enter a Valid Password');
            return redirect()->back();
        }
    }

    /**
* Delete Admin.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
    public function deleteAdmin($id)
    {
        $admin = App\User::find($id);
        $admin->delete();
        Session::flash('success', 'This Admin had been Deleted successfully.');
        return redirect()->route('settingspage');
    }
/**
* Update Company Infos.
*
* @param  \Illuminate\Http\InfosRequestValidation  $request
* @return \Illuminate\Http\Response
*/
    public function updateHeadings(HeadingsRequestValidation $request)
    {
        $heading = App\Heading::find(1);
        $heading->home_history = $request->home_history;
        $heading->home_skills = $request->home_skills;
        $heading->home_why = $request->home_why;
        $heading->home_services = $request->home_services;
        $heading->home_projects = $request->home_projects;
        $heading->home_faq = $request->home_faq;
        $heading->home_pricing = $request->home_pricing;
        $heading->home_team = $request->home_team;
        $heading->home_testimonials =  $request->home_testimonials;
        $heading->home_partners = $request->home_partners;
        $heading->home_news = $request->home_news;
        $heading->footer_contact = $request->footer_contact;
        $heading->footer_links = $request->footer_links;
        $heading->footer_keep = $request->footer_keep;
        $heading->footer_newsletter = $request->footer_newsletter;
        $heading->about_title = $request->about_title;
        $heading->about_mission = $request->about_mission;
        $heading->about_vision = $request->about_vision;
        $heading->about_history = $request->about_history;
        $heading->about_skills = $request->about_skills;
        $heading->features_why = $request->features_why;
        $heading->features_title = $request->features_title;
        $heading->features_choice = $request->features_choice;
        $heading->services_title = $request->services_title;
        $heading->services_discover = $request->services_discover;
        $heading->services_other = $request->services_other;
        $heading->services_contact = $request->services_contact;
        $heading->projects_title = $request->projects_title;
        $heading->projects_quality = $request->projects_quality;
        $heading->projects_overview = $request->projects_overview;
        $heading->projects_details = $request->projects_details;
        $heading->team_title = $request->team_title;
        $heading->team_meet = $request->team_meet;
        $heading->prices_title = $request->prices_title;
        $heading->prices_most = $request->prices_most;
        $heading->testimonials_title = $request->testimonials_title;
        $heading->testimonials_say = $request->testimonials_say;
        $heading->testimonials_loyals = $request->testimonials_loyals;
        $heading->blog_title = $request->blog_title;
        $heading->blog_share = $request->blog_share;
        $heading->blog_recent = 'Recent Posts';
        $heading->faq_title = $request->faq_title;
        $heading->faq_any = $request->faq_any;
        $heading->contact_title = $request->contact_title;
        $heading->contact_send = $request->contact_send;
        $heading->faq_keep = $request->faq_keep;
        $heading->save();
        Session::flash('success', 'Your Informations has been updated successfully.');
        return redirect()->back();
    }
}
