<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use DB;
use Carbon\Carbon;

use App\Path\To\Result;

class FrontendController extends Controller
{
    public function HomePage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $deptdetail = App\DepartmentDetail::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $about = App\About::find(1);
        $skills = App\Skill::all();
        $home = App\HomePage::find(1);
        $sliders = App\Slider::orderBy('id', 'desc')->take(5)->get();
        $features = App\Feature::all();
        $services = App\Service::all();
        $counters = App\Counter::all();
        $partners = App\Partner::all();
        $faqs = App\Faq::all();
        $heading = App\Heading::find(1);
        $pricing = App\Pricing::all();
        $pricingfeatures = App\PricingFeature::all();
        $testimonials = App\Testimonial::all();
        $team = App\Team::all();
        $projects = App\Project::all();
        $projects_cat = App\ProjectCat::all();
        
        $posts = App\News::orderBy('news_date', 'desc')->take(10)->get();
        $pages = App\Page::all();
        
        $announcements = App\Announcement::orderBy('id', 'desc')->take(3)->get();
        $causelist = App\CauseList::all();
        $newslist = App\News::orderBy('id', 'desc')->skip(1)->take(3)->get();
        $news = App\News::latest('id')->first();
        
        $daily = App\DailyActivity::orderBy('id', 'desc')->take(3)->get();
        $rightblock = App\FooterSliderBlock::orderBy('id', 'desc')->take(10)->get();
        return view('Frontend.home')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $deptdetail,
            'metas' => $metas,
            'color' => $color,
            'about' => $about,
            'skills' => $skills,
            'home' => $home,
            'sliders' => $sliders,
            'features' => $features,
            'services' => $services,
            'counters' => $counters,
            'partners' => $partners,
            'faqs' => $faqs,
            'pricing' => $pricing,
            'pricingfeatures' => $pricingfeatures,
            'testimonials' => $testimonials,
            'team' => $team,
            'projects' => $projects,
            'projects_cat' => $projects_cat,
            'posts' => $posts,
            'pages' => $pages,
            'announcements' => $announcements,
            'causelist' => $causelist,
            'news' => $news,
            'newslist' => $newslist,
            'daily' => $daily,
            'rightblock' => $rightblock,
            
            
        ]);
    }

    public function AboutPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $about = App\About::find(1);
        $skills = App\Skill::all();
        $counters = App\Counter::all();
        $heading = App\Heading::find(1);
        $pages = App\Page::all();
        return view('Frontend.about')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'about' => $about,
            'skills' => $skills,
            'counters' => $counters,
            'pages' => $pages,
        ]);
    }

    public function FeaturesPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $features = App\Feature::all();
        $heading = App\Heading::find(1);
        $pages = App\Page::all();
        return view('Frontend.features')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'features' => $features,
            'pages' => $pages,
        ]);
    }

    public function JudgesPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        //$judges = App\Judge::all();
        $judges = App\Judge::orderBy('order', 'asc')->get();
        $heading = App\Heading::find(1);
        $pages = App\Page::all();
        return view('Frontend.council')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'judges' => $judges,
            'pages' => $pages,
        ]);
    }

    public function SingleJudgePage($id)
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $judges = App\Judge::all();
        $heading = App\Heading::find(1);
        $singlejudge = App\Judge::find($id);
        $pages = App\Page::all();
        return view('Frontend.councildetail')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'judges' => $judges,
            'singlejudge' => $singlejudge,
            'pages' => $pages,
        ]);
    }

    public function SingleSliderPage($id)
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $post = App\Slider::find($id);
        $posts = App\Slider::all();
        $pages = App\Page::all();
        $newslist = App\News::orderBy('id', 'desc')->skip(1)->take(10)->get();
        if (App::isLocale('en')) {
            $name = $post->title_en;
            $short_description = $post->description_en;
        }else{
            $name = $post->title;
            $short_description = $post->description;
        }
        return view('Frontend.slider')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'post' => $post,
            'posts' => $posts,
            'pages' => $pages,
            'name' => $name,
            'short_description' => $short_description,
            'newslist' => $newslist,
        ]);
    }

    public function ProjectsPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $projects = App\Project::all();
        $projects_cat = App\ProjectCat::all();
        $pages = App\Page::all();
        return view('Frontend.projects')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'projects' => $projects,
            'projects_cat' => $projects_cat,
            'pages' => $pages,
        ]);
    }
    

    public function SingleProjectPage($id)
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $project = App\Project::find($id);
        $pages = App\Page::all();
        return view('Frontend.project')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'project' => $project,
            'pages' => $pages,
        ]);
    }

    public function TeamPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $team = App\Team::all();
        $pages = App\Page::all();
        return view('Frontend.team')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'team' => $team,
            'pages' => $pages,
        ]);
    }

    public function PricesPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $pricing = App\Pricing::all();
        $pricingfeatures = App\PricingFeature::all();
        $pages = App\Page::all();
        return view('Frontend.prices')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'pricing' => $pricing,
            'pricingfeatures' => $pricingfeatures,
            'pages' => $pages,
        ]);
    }

    public function TestimonialsPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $partners = App\Partner::all();
        $heading = App\Heading::find(1);
        $testimonials = App\Testimonial::all();
        $pages = App\Page::all();
        return view('Frontend.testimonials')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'partners' => $partners,
            'testimonials' => $testimonials,
            'pages' => $pages,
        ]);
    }

    public function BlogPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Post::all();
        $pages = App\Page::all();
        return view('Frontend.blog')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
        ]);
    }

    public function SinglePostPage($id)
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $post = App\News::find($id);
        $posts = App\News::all();
        $newslist = App\News::orderBy('id', 'desc')->skip(1)->take(10)->get();
        $pages = App\Page::all();
        if (App::isLocale('en')) {
            $name = $post->name_en;
            $short_description = $post->short_description_en;
            $body = $post->body_en;
        }else{
            $name = $post->name;
            $short_description = $post->short_description;
            $body = $post->body;
        }
        return view('Frontend.post')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'post' => $post,
            'posts' => $posts,
            'pages' => $pages,
            'name' => $name,
            'short_description' => $short_description,
            'body' => $body,
            'newslist' => $newslist,
        ]);
    }
    
    public function SingleDepartmentPage($id)
    {
        
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $post = App\DepartmentDetail::find($id);
        $posts = App\DepartmentDetail::all();
        $newslist = App\DepartmentDetail::orderBy('id', 'desc')->skip(1)->take(10)->get();
        $pages = App\DepartmentDetail::all();
        if (App::isLocale('en')) {
            $name = $post->name_en;
            $short_description = $post->short_description_en;
            $body = $post->body_en;
        }else{
            $name = $post->name;
            $short_description = $post->short_description;
            $body = $post->body;
        }
        return view('Frontend.department')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'post' => $post,
            'posts' => $posts,
            'pages' => $pages,
            'name' => $name,
            'short_description' => $short_description,
            'body' => $body,
            'newslist' => $newslist,
        ]);
    }
    
     public function SingleCSRPage($id)
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $post = App\DailyActivity::find($id);
        $posts = App\DailyActivity::all();
        $newslist = App\News::orderBy('id', 'desc')->skip(1)->take(10)->get();
        $pages = App\Page::all();
        $daily = App\DailyActivity::all();
        if (App::isLocale('en')) {
            $name = $post->name_en;
            $short_description = $post->short_description_en;
            $body = $post->body_en;
        }else{
            $name = $post->name;
            $short_description = $post->short_description;
            $body = $post->body;
        }
        return view('Frontend.csr')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'post' => $post,
            'posts' => $posts,
            'pages' => $pages,
            'name' => $name,
            'short_description' => $short_description,
            'body' => $body,
            'newslist' => $newslist,
            'daily' => $daily,
            
        ]);
    }
    
    
    public function SingleDailyPage($id)
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $post = App\DailyActivity::find($id);
        $posts = App\DailyActivity::all();
        $pages = App\Page::all();
        if (App::isLocale('en')) {
            $name = $post->name_en;
            $short_description = $post->short_description_en;
            $long_description = $post->long_description_en;
        }else{
            $name = $post->name;
            $short_description = $post->short_description;
            $long_description = $post->long_description;
        }
        return view('Frontend.post')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'post' => $post,
            'posts' => $posts,
            'pages' => $pages,
            'name' => $name,
            'short_description' => $short_description,
            'long_description' => $long_description,
        ]);
    }
    
    public function FaqPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $faqs = App\Faq::all();
        $heading = App\Heading::find(1);
        $pages = App\Page::all();
        return view('Frontend.faq')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'faqs' => $faqs,
            'pages' => $pages,
        ]);
    }

    public function ContactPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $pages = App\Page::all();
        return view('Frontend.contact')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'pages' => $pages,
        ]);
    }
    
    public function Scode41Page()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $pages = App\Page::all();
        return view('Frontend.scode41')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'pages' => $pages,
        ]);
    }

    public function PagesPage($id)
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $pages = App\Page::all();
        $currentPage = App\Page::find($id);
        $locale = App::getLocale();
        if (App::isLocale('en')) {
            $title = $currentPage->title_en;
            $content = $currentPage->content_en;
        }else{
            $title = $currentPage->title;
            $content = $currentPage->content;
        }
        return view('Frontend.page')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'pages' => $pages,
            'title' => $title,
            'content' => $content,
            
        ]);
    }
    
    public function AnnouncemenetsPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $announcements_cat = App\AnnouncementCat::all();
        $pages = App\Page::all();
        $announcements = App\Announcement::orderBy('id','desc')->paginate(10);
       $archive = App\Announcement::orderBy('created_at', 'desc')
        ->whereNotNull('created_at')
        ->get()
        ->groupBy(function($post) {
            return $post->created_at->format('Y');
        })
        ->map(function ($item) {
            return $item
                ->sortByDesc('created_at')
                ->groupBy( function ( $item ) {
                    return $item->created_at->format('F');
                });
        });
        $newslist = App\News::orderBy('id', 'desc')->take(5)->get();
        return view('Frontend.announcements')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'announcements' => $announcements,
            'announcements_cat' => $announcements_cat,
            'pages' => $pages,
            'archive' => $archive,
            'newslist' => $newslist,
        ]);
    }
    public function CSRPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Post::all();
        $pages = App\Page::all();
        $news = App\DailyActivity::orderBy('id','desc')->paginate(6);
        $districts = App\District::all();
        $townships = App\Township::all();
        $departments = App\Department::all();
        $positions = App\Position::all();
        $newslist = App\News::orderBy('id', 'desc')->skip(1)->take(10)->get();
        $archive = App\News::orderBy('created_at', 'desc')
        ->whereNotNull('created_at')
        ->get()
        ->groupBy(function($post) {
            return $post->created_at->format('Y');
        })
        ->map(function ($item) {
            return $item
                ->sortByDesc('created_at')
                ->groupBy( function ( $item ) {
                    return $item->created_at->format('F');
                });
        });
        return view('Frontend.csrs')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
        'districts' => $districts,
        'townships' => $townships,
        'departments' => $departments,
        'positions' => $positions,
            'search' => '',
            'district' => '',
            'tsp' => '',
            'dept' => '',
            'posi' => '',
            'start_date' => '',
        'end_date' => '',
            'newslist' => $newslist,
            'archive' => $archive,
            
            
            
            
        ]);
    }
    public function findCityWithStateID($id)
    {
        $city = App\Township::where('district_id',$id)->get();
        return response()->json($city);
    }
    public function NewsPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Post::all();
        $pages = App\Page::all();
        $news = App\News::orderBy('id','desc')->paginate(4);
        $districts = App\District::all();
        $townships = App\Township::all();
        $departments = App\Department::all();
        
        $positions = App\Position::orderBy('id', 'asc')->take(8)->get();
        $newslist = App\News::orderBy('id', 'desc')->skip(1)->take(10)->get();
        $archive = App\News::orderBy('news_date', 'desc')
        ->whereNotNull('news_date')
        ->get()
        ->groupBy(function($post) {
        
        $year = date('Y', strtotime($post->news_date));
        return $year;
        })
        ->map(function ($item) {
            return $item
                ->sortByDesc('news_date')
                ->groupBy( function ( $item ) {
                    
                    $year = date('F', strtotime($item->news_date));
        return $year;
                });
        });
        return view('Frontend.news')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
        'districts' => $districts,
        'townships' => $townships,
        'departments' => $departments,
        'positions' => $positions,
            'search' => '',
            'district' => '',
            'tsp' => '',
            'dept' => '',
            'posi' => '',
            'start_date' => '',
        'end_date' => '',
            'newslist' => $newslist,
            'archive' => $archive,
            
            
            
            
        ]);
    }
    public function DepartmentsPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        
        $news = App\DepartmentDetail::orderBy('id','desc')->paginate(4);
        $districts = App\District::all();
        $townships = App\Township::all();
        $departments = App\Department::all();
        
        $positions = App\Position::orderBy('id', 'asc')->take(8)->get();
       
        return view('Frontend.departments')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'news' => $news,
        'districts' => $districts,
        'townships' => $townships,
        'departments' => $departments,
        'positions' => $positions,
            'search' => '',
            'district' => '',
            'tsp' => '',
            'dept' => '',
            'posi' => '',
            'start_date' => '',
        'end_date' => '',
            
            
            
            
        ]);
    }
    
    public function NewsPositionPage($id)
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Post::all();
        $pages = App\Page::all();
        $districts = App\District::all();
        $townships = App\Township::all();
        $departments = App\Department::all();
        $positions = App\Position::all();
        $news = App\News::where('position',$id)->orderBy('id','desc')->paginate(10);
     $newslist = App\News::orderBy('id', 'desc')->skip(1)->take(10)->get();
        $archive = App\News::orderBy('news_date', 'desc')
        ->whereNotNull('news_date')
        ->get()
        ->groupBy(function($post) {
            
            $year = date('Y', strtotime($post->news_date));
        return $year;
        })
        ->map(function ($item) {
            return $item
                ->sortByDesc('news_date')
                ->groupBy( function ( $item ) {
                    
                    $year = date('F', strtotime($item->news_date));
        return $year;
                });
        });
        return view('Frontend.news')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
        'districts' => $districts,
        'townships' => $townships,
        'departments' => $departments,
        'positions' => $positions,
            'search' => '',
            'district' => '',
            'tsp' => '',
            'dept' => '',
            'posi' => '',
            'start_date' => '',
        'end_date' => '',
            'newslist' => $newslist,
            'archive' => $archive,
        ]);
    }
    
    public function CovidPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Post::all();
        $pages = App\Page::all();
        $news = App\Covid::orderBy('news_date','desc')->paginate(4);
        $districts = App\District::all();
        $townships = App\Township::all();
        $departments = App\Department::all();
        $rightblock = App\FooterSliderBlock::orderBy('id', 'desc')->take(10)->get();
        $positions = App\Position::orderBy('id', 'asc')->take(8)->get();
        $newslist = App\Covid::orderBy('id', 'desc')->skip(1)->take(10)->get();
         $ctype1 = App\CovidTopBox::where('type',1)->orderBy('id','desc')->take(1)->get();
        $ctype2 = App\CovidTopBox::where('type',2)->orderBy('id','desc')->take(1)->get();
        $ctype3 = App\CovidTopBox::where('type',3)->orderBy('id','desc')->take(1)->get();
        $ctype4 = App\CovidTopBox::where('type',4)->orderBy('id','desc')->take(1)->get();
        $archive = App\Covid::orderBy('created_at', 'desc')
        ->whereNotNull('created_at')
        ->get()
        ->groupBy(function($post) {
            return $post->created_at->format('Y');
        })
        ->map(function ($item) {
            return $item
                ->sortByDesc('created_at')
                ->groupBy( function ( $item ) {
                    return $item->created_at->format('F');
                });
        });
        return view('Frontend.covid')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
        'districts' => $districts,
        'townships' => $townships,
        'departments' => $departments,
        'positions' => $positions,
            'search' => '',
            'district' => '',
            'tsp' => '',
            'dept' => '',
            'posi' => '',
            'start_date' => '',
        'end_date' => '',
            'newslist' => $newslist,
            'archive' => $archive,
            'rightblock' => $rightblock,
            'ctype1' => $ctype1,
            'ctype2' => $ctype2,
            'ctype3' => $ctype3,
            'ctype4' => $ctype4,
            
        ]);
    }
    
   public function SingleCovidPage($id)
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $judges = App\Covid::all();
        $heading = App\Heading::find(1);
        $singlejudge = App\Covid::find($id);
        $pages = App\Page::all();
       $ctype1 = App\CovidTopBox::where('type',1)->orderBy('id','desc')->take(1)->get();
        $ctype2 = App\CovidTopBox::where('type',2)->orderBy('id','desc')->take(1)->get();
        $ctype3 = App\CovidTopBox::where('type',3)->orderBy('id','desc')->take(1)->get();
        $ctype4 = App\CovidTopBox::where('type',4)->orderBy('id','desc')->take(1)->get();
       $rightblock = App\FooterSliderBlock::orderBy('id', 'desc')->take(10)->get();
        return view('Frontend.covids')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'judges' => $judges,
            'singlejudge' => $singlejudge,
            'pages' => $pages,
            'rightblock' => $rightblock,
            'ctype1' => $ctype1,
            'ctype2' => $ctype2,
            'ctype3' => $ctype3,
            'ctype4' => $ctype4,
            
        ]);
    }
    
    public function NewsLocationPage($id)
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Post::all();
        $pages = App\Page::all();
        $districts = App\District::all();
        $townships = App\Township::all();
        $departments = App\Department::all();
        $positions = App\Position::all();
        
        $news = App\News::where('tsp',$id)->orderBy('id','desc')->paginate(10);
     $newslist = App\News::orderBy('id', 'desc')->skip(1)->take(10)->get();
        $archive = App\News::orderBy('news_date', 'desc')
        ->whereNotNull('news_date')
        ->get()
        ->groupBy(function($post) {
            
            $year = date('Y', strtotime($post->news_date));
        return $year;
        })
        ->map(function ($item) {
            return $item
                ->sortByDesc('news_date')
                ->groupBy( function ( $item ) {
                    
                    $year = date('F', strtotime($item->news_date));
        return $year;
                });
        });
        return view('Frontend.news')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
        'districts' => $districts,
        'townships' => $townships,
        'departments' => $departments,
        'positions' => $positions,
            'search' => '',
            'district' => '',
            'tsp' => '',
            'dept' => '',
            'posi' => '',
            'start_date' => '',
        'end_date' => '',
            'newslist' => $newslist,
            'archive' => $archive,
        ]);
    }
    
    public function NewsArchivePage($id)
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Post::all();
        $pages = App\Page::all();
        $districts = App\District::all();
        $townships = App\Township::all();
        $departments = App\Department::all();
        $positions = App\Position::all();
        $news = App\News::where('news_date','like',"%".$id."%")->orderBy('id','desc')->paginate(10);
        
     $newslist = App\News::orderBy('id', 'desc')->skip(1)->take(10)->get();
        $archive = App\News::orderBy('news_date', 'desc')
        ->whereNotNull('news_date')
        ->get()
        ->groupBy(function($post) {
            
            $year = date('Y', strtotime($post->news_date));
        return $year;
        })
        ->map(function ($item) {
            return $item
                ->sortByDesc('news_date')
                ->groupBy( function ( $item ) {
                    
                    $year = date('F', strtotime($item->news_date));
        return $year;
                });
        });
        return view('Frontend.news')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
        'districts' => $districts,
        'townships' => $townships,
        'departments' => $departments,
        'positions' => $positions,
            'search' => '',
            'district' => '',
            'tsp' => '',
            'dept' => '',
            'posi' => '',
            'start_date' => '',
        'end_date' => '',
            'newslist' => $newslist,
            'archive' => $archive,
        ]);
    }
    
    public function NewsSearchPage(Request $request)
    {
        \DB::connection()->enableQueryLog();
        
        $search = $request->get('search');
        
        $district = $request->get('district');
        $tsp = $request->get('township');
        $dept = $request->get('department');
        $position = $request->get('position');
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
            
        
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $districts = App\District::all();
        $townships = App\Township::where('district_id',$district)->get();
        $departments = App\Department::all();
        $positions = App\Position::all();
        $newslist = App\News::orderBy('id', 'desc')->skip(1)->take(10)->get();
        
      $news = App\News::query();

if(request()->filled('search')) {
    $news->Where('name','like',"%".$search."%");
    $news->Where('body','like',"%".$search."%");
}
if(request()->filled('district')) {
    $news->Where('district', $district);
}
if(request()->filled('township')) {
    $news->Where('tsp', $tsp);
}
if(request()->filled('department')) {
    $news->Where('department', $dept);
}
if(request()->filled('position')) {
    $news->Where('position', $position);
}
    
        if($request->filled('start_date') && $request->filled('end_date')) 
{
       $start_date = $request->get('start_date').' 00:00:00';
       $end_date = $request->get('end_date').' 23:59:59';
       
       $news->whereBetween('created_at', [$start_date, $end_date]);
                
}


        $news = $news->paginate(6);
/*$query = DB::getQueryLog();
$query = end($query);
dd($query);*/ 
        $archive = App\News::orderBy('news_date', 'desc')
        ->whereNotNull('news_date')
        ->get()
        ->groupBy(function($post) {
            
            $year = date('Y', strtotime($post->news_date));
        return $year;
        })
        ->map(function ($item) {
            return $item
                ->sortByDesc('news_date')
                ->groupBy( function ( $item ) {
                    
                    $year = date('F', strtotime($item->news_date));
        return $year;
                });
        });
        return view('Frontend.news')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'districts' => $districts,
        'townships' => $townships,
        'departments' => $departments,
        'positions' => $positions,
            'news' => $news,
            'search' => $search,
            'district' => $district,
        'tsp' => $tsp,
        'dept' => $dept,
        'posi' => $position,
        'start_date' => $start_date,
        'end_date' => $end_date,
            'newslist' => $newslist,
            'archive' => $archive,
        ]);
    }
    public function LocationsPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Post::all();
        $pages = App\Page::all();
        $news = App\Location::orderBy('id','desc')->paginate(4);
        
        
        return view('Frontend.locations')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
            
            
            
        ]);
    }
    public function DailysPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\DailyActivity::all();
        $cats = App\DailyActivityCat::all();
        $pages = App\Page::all();
        $news = App\DailyActivity::paginate(5);
        return view('Frontend.dailys')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
            'cats' => $cats,
            
        ]);
    }

    public function CausesPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\CauseList::all();
        $cats = App\DailyActivityCat::all();
        $pages = App\Page::all();
        $news = App\CauseList::paginate(5);
        return view('Frontend.causelists')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
            'cats' => $cats,
            
        ]);
    }
    public function CriminalPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\CauseList::all();
        $pages = App\Page::all();
        $news = App\CauseList::paginate(5);
        
        
        return view('Frontend.causelistscriminal')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
            
        ]);
    }
    public function CivilPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\CauseList::all();
        $pages = App\Page::all();
        $news = App\CauseList::paginate(5);
        
        return view('Frontend.causelistscivil')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
            
        ]);
    }
    public function WritPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\CauseList::all();
        $pages = App\Page::all();
        $news = App\CauseList::paginate(5);
        
        return view('Frontend.causelistswrit')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
            
        ]);
    }
    public function JudgementPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\JudgementList::all();
        $cats = App\DailyActivityCat::all();
        $pages = App\Page::all();
        $news = App\JudgementList::paginate(5);
        return view('Frontend.judgementlists')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
            'cats' => $cats,
            
        ]);
    }
    public function JCriminalPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\CauseList::all();
        $pages = App\Page::all();
        $news = App\CauseList::paginate(5);
        
        
        return view('Frontend.judgementlistscriminal')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
            
        ]);
    }
    public function JCivilPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\CauseList::all();
        $pages = App\Page::all();
        $news = App\CauseList::paginate(5);
        
        return view('Frontend.judgementlistscivil')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
            
        ]);
    }
    public function JWritPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\CauseList::all();
        $pages = App\Page::all();
        $news = App\CauseList::paginate(5);
        
        return view('Frontend.judgementlistswrit')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
            
        ]);
    }
    public function PostponePage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\PostponeList::all();
        $cats = App\DailyActivityCat::all();
        $pages = App\Page::all();
        $news = App\PostponeList::paginate(5);
        return view('Frontend.postponelists')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
            'cats' => $cats,
            
        ]);
    }
    public function PCriminalPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\CauseList::all();
        $pages = App\Page::all();
        $news = App\CauseList::paginate(5);
        
        
        return view('Frontend.postponelistscriminal')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
            
        ]);
    }
    public function PCivilPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\CauseList::all();
        $pages = App\Page::all();
        $news = App\CauseList::paginate(5);
        
        return view('Frontend.postponelistscivil')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
            
        ]);
    }
    public function PWritPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\CauseList::all();
        $pages = App\Page::all();
        $news = App\CauseList::paginate(5);
        
        return view('Frontend.postponelistswrit')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
            
        ]);
    }
    public function SingleAnnouncementPage($id)
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $judges = App\Announcement::all();
        $heading = App\Heading::find(1);
        $singlejudge = App\Announcement::find($id);
        $pages = App\Page::all();
        return view('Frontend.announcement')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'judges' => $judges,
            'singlejudge' => $singlejudge,
            'pages' => $pages,
        ]);
    }
    
    
   public function VideosPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Media::all();
        $pages = App\Page::all();
        //$news = App\News::all();
        $news = App\Media::paginate(5);
        return view('Frontend.videos')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
        ]);
    }
    public function TenderPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Tender::all();
        $pages = App\Page::all();
        //$news = App\News::all();
        $news = App\Tender::orderBy('id','desc')->paginate(5);
        return view('Frontend.tender')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
        ]);
    }
    public function RulingPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Tender::all();
        $pages = App\Page::all();
        //$news = App\News::all();
        $news = App\Tender::paginate(5);
        return view('Frontend.ruling')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
        ]);
    }
    public function AnnualreportPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Tender::all();
        $pages = App\Page::all();
        //$news = App\News::all();
        $news = App\Tender::paginate(5);
        return view('Frontend.annualreport')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
        ]);
    }
    public function StrategicPlanPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Tender::all();
        $pages = App\Page::all();
        //$news = App\News::all();
        $news = App\Tender::paginate(5);
        return view('Frontend.strategicplanning')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
        ]);
    }
    public function JudicialJPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Tender::all();
        $pages = App\Page::all();
        //$news = App\News::all();
        $news = App\Tender::paginate(5);
        return view('Frontend.judicialjournal')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
        ]);
    }
    public function OtherpdfPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Tender::all();
        $pages = App\Page::all();
        //$news = App\News::all();
        $news = App\Tender::paginate(5);
        return view('Frontend.otherspdf')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
        ]);
    }
     public function PhotoPage()
    {
        $infos = App\Info::find(1);
        $socials = App\Social::find(1);
        $navbar = App\Navbar::all();
        $metas = App\Meta::find(1);
        $color = App\Color::find(1);
        $heading = App\Heading::find(1);
        $posts = App\Photo::all();
        $pages = App\Page::all();
        //$news = App\News::all();
        $news = App\Photo::paginate(5);
        return view('Frontend.photo')->with([
            'infos' => $infos,
            'heading' => $heading,
            'socials' => $socials,
            'items' => $navbar,
            'metas' => $metas,
            'color' => $color,
            'posts' => $posts,
            'pages' => $pages,
            'news' => $news,
        ]);
    }

}