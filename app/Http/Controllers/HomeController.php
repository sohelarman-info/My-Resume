<?php

namespace App\Http\Controllers;

use App\About;
use App\Blog;
use App\Education;
use App\Fact;
use App\Footer;
use App\home;
use App\Pcat;
use App\Portfolio;
use App\Ppost;
use App\PpostImages;
use App\Profession;
use App\Resume;
use App\Service;
use App\ServicePost;
use App\Skill;
use App\Social;
use App\Summary;
use App\Testimonial;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Str;
use File;
use Illuminate\Support\Facades\Mail;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard',[
            'abouts' => About::all(),
        ]);
    }
    //Home Section
    function HomeSection(){
        return view('admin.front.home-section.home-section', [
            'homes' => home::all(),
        ]);
    }
    function HomeStore(Request $request){
        $request->validate([
            'icon_name' => ['required','min:3'],
            'title' => ['required','min:3'],
        ]);
        $home = new home;
        $home->user_id              = Auth::id();
        $home->icon_name            = $request->icon_name;
        $home->title                = $request->title;
        $home->slug                 = Str::slug($request->icon_name);
        $home->title_color          = $request->title_color;
        $home->title_font           = $request->title_font;
        $home->tagline              = $request->tagline;
        $home->designation          = $request->designation;
        $home->designation_color    = $request->designation_color;
        $home->designation_font     = $request->designation_font;
        $home->site_name            = $request->site_name;
        $home->site_url             = $request->site_url;
        $home->save();

        if($request->hasFile('logo')){
            $create_folder = public_path('about-section/logo/') . Carbon::now()->format('Y/m/').$home->id . '/';
            File::makeDirectory($create_folder, $mode = 0777, true, true);
            $image = $request->file('logo');
            $extension = Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save($create_folder.$extension);
            $home_update = home::findOrfail($home->id);
            $home_update->logo = $extension;
            $home_update->save();
        }
        if($request->hasFile('thumbnail')){
            $create_folder = public_path('about-section/thumbnail/') . Carbon::now()->format('Y/m/').$home->id . '/';
            File::makeDirectory($create_folder, $mode = 0777, true, true);
            $image = $request->file('thumbnail');
            $extension = Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1000)->save($create_folder.$extension);
            $home_update = home::findOrfail($home->id);
            $home_update->thumbnail = $extension;
            $home_update->save();
        }

        return back()->with('success', 'Home section updated successfully !');

    }
    function HomeEdit($slug){
        return view('admin.front.home-section.edit-home-section',[
            'home' => home::where('slug', $slug)->first(),
        ]);
    }
    function HomeUpdate(Request $request){
        $request->validate([
            'icon_name' => ['required','min:3'],
            'title' => ['required','min:3'],
        ]);
        $home = home::findOrFail($request->id);
        $home->user_id              = Auth::id();
        $home->icon_name            = $request->icon_name;
        $home->title                = $request->title;
        $home->slug                 = Str::slug($request->icon_name);
        $home->title_color          = $request->title_color;
        $home->title_font           = $request->title_font;
        $home->tagline              = $request->tagline;
        $home->designation          = $request->designation;
        $home->designation_color    = $request->designation_color;
        $home->designation_font     = $request->designation_font;
        $home->site_name            = $request->site_name;
        $home->site_url             = $request->site_url;
        $home->save();

        if($request->hasFile('logo')){
            $create_folder = public_path('about-section/logo/') . $home->created_at->format('Y/m/').$home->id . '/';
            $image = $request->file('logo');
            $extension = Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $old_image_location = public_path('about-section/logo/') . $home->created_at->format('Y/m/').$home->id . '/'. $home->logo;
            if(file_exists($old_image_location)){
                unlink($old_image_location);
            }
            Image::make($image)->save($create_folder.$extension);
            $home_update = home::findOrfail($home->id);
            $home_update->logo = $extension;
            $home_update->save();
        }
        if($request->hasFile('thumbnail')){
            $create_folder = public_path('about-section/thumbnail/') . $home->created_at->format('Y/m/').$home->id . '/';
            $image = $request->file('thumbnail');
            $extension = Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $old_image_location = public_path('about-section/thumbnail/') . $home->created_at->format('Y/m/').$home->id . '/'. $home->thumbnail;
            if(file_exists($old_image_location)){
                unlink($old_image_location);
            }
            Image::make($image)->resize(1920,1000)->save($create_folder.$extension);
            $home_update = home::findOrfail($home->id);
            $home_update->thumbnail = $extension;
            $home_update->save();
        }

        return redirect()->route('HomeSection')->with('success', 'Home section updated successfully !');
    }
    function HomeDelete($slug){
       $home = home::where('slug', $slug)->first();
       $old_logo_location = public_path('about-section/logo/') . $home->created_at->format('Y/m/').$home->id . '/'. $home->logo;
            if(file_exists($old_logo_location)){
                unlink($old_logo_location);
        }
       $old_thumbnail_location = public_path('about-section/thumbnail/') . $home->created_at->format('Y/m/').$home->id . '/'. $home->thumbnail;
       if(file_exists($old_thumbnail_location)){
           unlink($old_thumbnail_location);
       }
       $home->delete();
       return back()->with('success', 'Home Section Cleared');
    }

    //About Section
    function AboutSection(){
        return view('admin.front.about-section.about-section',[
            'homes'     => home::all(),
            'abouts'    => About::all()
        ]);
    }
    function AboutStore(Request $request){
        $request->validate([
            'icon_name' => ['required','min:3'],
            'title'     => ['required','min:3'],
            'name'      => ['required','min:3'],
        ]);
        $about = new About;
        $about->user_id              = Auth::id();
        $about->icon_name            = $request->icon_name;
        $about->name                 = $request->name;
        $about->title                = $request->title;
        $about->about                = $request->about;
        $about->summary              = $request->summary;
        $about->description          = $request->description;
        $about->slug                 = Str::slug($request->icon_name);
        $about->save();
        if($request->hasFile('thumbnail')){
            $create_folder = public_path('about-section/photos/') . Carbon::now()->format('Y/m/').$about->id . '/';
            File::makeDirectory($create_folder, $mode = 0777, true, true);
            $image = $request->file('thumbnail');
            $extension = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save($create_folder.$extension);
            $about_update = About::findOrfail($about->id);
            $about_update->thumbnail = $extension;
            $about_update->save();
        }

        return back()->with('success', 'About section updated successfully !');
    }
    function AboutEdit($slug){
        return view('admin.front.about-section.edit-about-section',[
            'about' => About::where('slug', $slug)->first(),
        ]);
    }
    function AboutUpdate(Request $request){
        $request->validate([
            'icon_name' => ['required','min:3'],
            'title'     => ['required','min:3'],
            'name'      => ['required','min:3'],
        ]);
        $about = About::findOrFail($request->id);
        $about->user_id              = Auth::id();
        $about->icon_name            = $request->icon_name;
        $about->name                 = $request->name;
        $about->title                = $request->title;
        $about->about                = $request->about;
        $about->summary              = $request->summary;
        $about->description          = $request->description;
        $about->slug                 = Str::slug($request->icon_name);
        $about->save();
        if($request->hasFile('thumbnail')){
            $create_folder = public_path('about-section/photos/') . $about->created_at->format('Y/m/').$about->id . '/';
            $image = $request->file('thumbnail');
            $extension = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
            $old_image_location = public_path('about-section/photos/') . $about->created_at->format('Y/m/').$about->id . '/'. $about->thumbnail;
            if(file_exists($old_image_location)){
                unlink($old_image_location);
            }
            Image::make($image)->save($create_folder.$extension);
            $about_update = About::findOrfail($about->id);
            $about_update->thumbnail = $extension;
            $about_update->save();
        }
        return redirect()->route('AboutSection')->with('success', 'About section updated successfully');
    }
    function AboutDelete($slug){
        $about = About::where('slug', $slug)->first();
        $old_photo_location = public_path('about-section/photos/') . $about->created_at->format('Y/m/').$about->id . '/'. $about->thumbnail;
        if(file_exists($old_photo_location)){
            unlink($old_photo_location);
        }
        $about->delete();
        return back()->with('success', 'About Section Cleared');
    }

    //Fact Section
    function factSection(){
        return view('admin.front.fact-section.fact-section',[
            'facts' => Fact::all(),
            'abouts' => About::all()
        ]);
    }
    function FactStore(Request $request){
        $fact = new Fact;
        $fact->user_id	= Auth::id();
        $fact->title = $request->title;
        $fact->client = $request->client;
        $fact->project = $request->project;
        $fact->support = $request->support;
        $fact->worker = $request->worker;
        $fact->fact = $request->fact;
        $fact->save();
        return back()->with('success', 'Fact section updated successfully');
    }
    function FactUpdate(Request $request){
        $fact = Fact::findOrFail($request->id);
        $fact->user_id	= Auth::id();
        $fact->title = $request->title;
        $fact->client = $request->client;
        $fact->project = $request->project;
        $fact->support = $request->support;
        $fact->worker = $request->worker;
        $fact->fact = $request->fact;
        $fact->save();
        return back()->with('success', 'Fact section updated successfully');
    }
    //Skill Section
    function SkillSection(){
        return view('admin.front.skill-section.skill-rating',[
            'skills' => Skill::all(),
            'facts'  => Fact::all(),
        ]);
    }
    function SkillStore(Request $request){
        $request->validate([
            'html'          => ['integer','between:1,100'],
            'css'           => ['integer','between:1,100'],
            'bootstrap'     => ['integer','between:1,100'],
            'javascript'    => ['integer','between:1,100'],
            'jquery'        => ['integer','between:1,100'],
            'php'           => ['integer','between:1,100'],
            'laravel'       => ['integer','between:1,100'],
            'wordpress'     => ['integer','between:1,100'],
            'photoshop'     => ['integer','between:1,100'],
            'editing'       => ['integer','between:1,100'],
            'others'        => ['integer','between:1,100'],
        ]);
        $skill = new Skill();
        $skill->user_id     = Auth::id();
        $skill->title       = $request->title;
        $skill->skill       = $request->skill;
        $skill->html        = $request->html;
        $skill->css         = $request->css;
        $skill->bootstrap   = $request->bootstrap;
        $skill->javascript  = $request->javascript;
        $skill->jquery      = $request->jquery;
        $skill->php         = $request->php;
        $skill->laravel     = $request->laravel;
        $skill->wordpress   = $request->wordpress;
        $skill->photoshop   = $request->photoshop;
        $skill->editing     = $request->editing;
        $skill->others      = $request->others;
        $skill->save();
        return back()->with('success', 'Skill Added successfully');
    }
    function SkillUpdate(Request $request){
        $request->validate([
            'html'          => ['integer','between:1,100'],
            'css'           => ['integer','between:1,100'],
            'bootstrap'     => ['integer','between:1,100'],
            'javascript'    => ['integer','between:1,100'],
            'jquery'        => ['integer','between:1,100'],
            'php'           => ['integer','between:1,100'],
            'laravel'       => ['integer','between:1,100'],
            'wordpress'     => ['integer','between:1,100'],
            'photoshop'     => ['integer','between:1,100'],
            'editing'       => ['integer','between:1,100'],
            'others'        => ['integer','between:1,100'],
        ]);
        $skill = Skill::findOrFail($request->id);
        $skill->user_id     = Auth::id();
        $skill->title       = $request->title;
        $skill->skill       = $request->skill;
        $skill->html        = $request->html;
        $skill->css         = $request->css;
        $skill->bootstrap   = $request->bootstrap;
        $skill->javascript  = $request->javascript;
        $skill->jquery      = $request->jquery;
        $skill->php         = $request->php;
        $skill->laravel     = $request->laravel;
        $skill->wordpress   = $request->wordpress;
        $skill->photoshop   = $request->photoshop;
        $skill->editing     = $request->editing;
        $skill->others      = $request->others;
        $skill->save();
        return back()->with('success', 'Skill Updated successfully');
    }
    function SkillDelete($id){
        $skill = Skill::findOrFail($id);
        $skill->delete();
        return back()->with('success', 'All data clear successfully');
    }
    function ResumeSection(){
        return view('admin.front.resume-section.resume-section',[
            'resumes'       => Resume::all(),
            'summaires'     => Summary::all(),
            'educations'    => Education::all(),
            'professions'   => Profession::all(),
        ]);
    }
    function ResumeStore(Request $request){
        $request->validate([
            'title'          => 'required'
        ]);
        $resume = new Resume();
        $resume->user_id = Auth::id();
        $resume->title = $request->title;
        $resume->resume = $request->resume;
        $resume->save();
        return back()->with('success', 'Added resume successfully');
    }
    function ResumeDelete($id){
        $resume = Resume::findOrFail($id);
        $resume->delete();
        return back()->with('success', 'Resume section cleared');
    }
    function ResumeEdit($id){
        return view('admin.front.resume-section.edit-resume',[
            'resume' => Resume::findOrFail($id),
        ]);
    }
    function ResumeEditUpdate(Request $request){
        $resume = Resume::findOrFail($request->id);
        $resume->user_id = Auth::id();
        $resume->title = $request->title;
        $resume->resume = $request->resume;
        $resume->save();
        return redirect()->route('ResumeSection')->with('success', 'Resume updated successfully');
    }
    //Summary Section
    function AddSummary($id){
        $resume = Resume::findOrFail($id);
        return view('admin.front.resume-section.add-summary',[
            'summary'   => Summary::all(),
            'resume'    => $resume,
        ]);
    }
    function SummaryStore(Request $request){
        $request->validate([
            'title'          => 'required'
        ]);
        $summary = new Summary();
        $summary->user_id = Auth::id();
        $summary->resume_id = $request->id;
        $summary->title = $request->title;
        $summary->summary = $request->summary;
        $summary->save();
        return redirect()->route('ResumeSection')->with('success', 'Summary added successfully');
    }
    function SummaryDelete($id){
        $summary = Summary::findOrFail($id)->delete();
        return back()->with('success', 'Summary Deleted');
    }
    function SummaryEdit($id){
        $summary = Summary::findOrFail($id);
        return view('admin.front.resume-section.edit-summary',[
            'summary' =>$summary,
        ]);
    }
    function SummaryUpdate(Request $request){
        $request->validate([
            'title'          => 'required'
        ]);
        $summary = Summary::findOrFail($request->id);
        $summary->user_id = Auth::id();
        $summary->title = $request->title;
        $summary->summary = $request->summary;
        $summary->save();
        return redirect()->route('ResumeSection')->with('success', 'Summary Updated');

    }
    //Education Section
    function AddEducation($id){
        $resume = Resume::findOrFail($id);
        return view('admin.front.resume-section.add-education',[
            'resume' => $resume,
        ]);
    }
    function EducationStore(Request $request){
        $request->validate([
            'title'          => 'required',
            'name'          => 'required',
            'start'          => 'required',
        ]);
        $education = new Education();
        $education->user_id = Auth::id();
        $education->resume_id = $request->id;
        $education->title = $request->title;
        $education->name = $request->name;
        $education->start = $request->start;
        $education->end = $request->end;
        $education->description = $request->description;
        $education->save();
        return redirect()->route('ResumeSection')->with('success', 'Education added!');
    }
    function EducationEdit($id){
        return view('admin.front.resume-section.edit-education',[
            'education' => Education::findOrFail($id),
        ]);
    }
    function EducationDelete($id){
        $education = Education::findOrFail($id);
        $education->delete();
        return redirect()->route('ResumeSection')->with('success', 'Education Deleted!');
    }
    function EducationUpdate(Request $request){
        $request->validate([
            'title'          => 'required',
            'name'          => 'required',
            'start'          => 'required',
        ]);
        $education = Education::findOrFail($request->id);
        $education->user_id = Auth::id();
        $education->title = $request->title;
        $education->name = $request->name;
        $education->start = $request->start;
        $education->end = $request->end;
        $education->description = $request->description;
        $education->save();
        return redirect()->route('ResumeSection')->with('success', 'Education Updated!');
    }
    //Profession Section
    function AddProfession($id){
        $resume = Resume::findOrFail($id);
        return view('admin.front.resume-section.add-profession',[
            'resume' => $resume,
        ]);
    }
    function ProfessionStore(Request $request){
        $request->validate([
            'title'          => 'required',
            'name'          => 'required',
            'start'          => 'required',
        ]);
        $education = new Profession();
        $education->user_id = Auth::id();
        $education->resume_id = $request->id;
        $education->title = $request->title;
        $education->name = $request->name;
        $education->start = $request->start;
        $education->end = $request->end;
        $education->description = $request->description;
        $education->save();
        return redirect()->route('ResumeSection')->with('success', 'Profession added!');
    }
    function ProfessionDelete($id){
        Profession::findOrFail($id)->delete();
        return redirect()->route('ResumeSection')->with('success', 'Profession Deleted!');
    }
    function ProfessionEdit($id){
        $profession = Profession::findOrFail($id);
        return view('admin.front.resume-section.edit-profession',[
            'profession' => $profession,
        ]);
    }
    function ProfessionUpdate(Request $request){
        $request->validate([
            'title'          => 'required',
            'name'          => 'required',
            'start'          => 'required',
        ]);
        $profession = Profession::findOrFail($request->id);
        $profession->user_id = Auth::id();
        $profession->title = $request->title;
        $profession->name = $request->name;
        $profession->start = $request->start;
        $profession->end = $request->end;
        $profession->description = $request->description;
        $profession->save();
        return redirect()->route('ResumeSection')->with('success', 'Profession Updated!');
    }
    //portfolio
    function Portfolio(){
        return view('admin.front.portfolio.portfolio',[
            'portfolios'    => Portfolio::all(),
            'pcats'         => Pcat::orderBy('id', 'desc')->get(),
            'pposts'        => Ppost::orderBy('id', 'desc')->paginate(),
        ]);
    }
    function PortfolioStore(Request $request){
        $request->validate([
            'title'          => ['required', 'min:3', 'max:100']
        ]);
        $resume = new Portfolio();
        $resume->user_id = Auth::id();
        $resume->title = $request->title;
        $resume->portfolio = $request->portfolio;
        $resume->save();
        return back()->with('success', 'Added Portfolio successfully');
    }
    function PortfolioDelete($id){
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();
        return back()->with('success', 'Portfolio Cleared');
    }
    function PortfolioEdit($id){
        return view('admin.front.portfolio.portfolio-edit',[
            'portfolio' => Portfolio::findOrFail($id),
        ]);
    }
    function PortfolioUpdate(Request $request){
        $request->validate([
            'title'          => ['required', 'min:3', 'max:100']
        ]);
        $resume = Portfolio::findOrFail($request->id);
        $resume->user_id = Auth::id();
        $resume->title = $request->title;
        $resume->portfolio = $request->portfolio;
        $resume->save();
        return redirect()->route('Portfolio')->with('success', 'Portfolio Updated');
    }
    function PcatAdd(Request $request){
        $request->validate([
            'name'          => ['required','unique:pcats', 'min:3', 'max:15']
        ]);
        $pcat = new Pcat();
        $pcat->user_id = Auth::id();
        $pcat->name = $request->name;
        $pcat->slug = Str::slug($request->name);
        $pcat->save();
        return back()->with('success', 'Portfolio Category Added !');
    }
    function PcatDelete($slug){
        $pcat = Pcat::where('slug', $slug)->first();
        $pcat->delete();
        return back()->with('success', 'Portfolio Category Deleted !');
    }
    function PcatEdit($slug){
        $pcat = Pcat::where('slug', $slug)->first();
        return view('admin.front.portfolio.pcat-edit',[
            'pcat' => $pcat,
        ]);
    }
    function PcatUpdate(Request $request){
        $request->validate([
            'name'          => ['required','unique:pcats', 'min:3', 'max:15']
        ]);
        $pcat = Pcat::findOrFail($request->id);
        $pcat->user_id = Auth::id();
        $pcat->name = $request->name;
        $pcat->slug = Str::slug($request->name);
        $pcat->save();
        return redirect()->route('Portfolio')->with('success', 'Portfolio Category Updated !');
    }
    function AddPpost(){
        return view('admin.front.portfolio.ppost-add',[
            'pcats' => Pcat::orderBy('id', 'desc')->get(),
        ]);
    }
    function PpostStore(Request $request){
        $request->validate([
            'title'          => ['required','min:3','max:100'],
            'client'         => ['required','min:3','max:100'],
            'pcat_id'        => ['required'],
            'thumbnail'          => ['required'],
        ]);
        $ppost              = new Ppost();
        $ppost->user_id     = Auth::id();
        $ppost->pcat_id     = $request->pcat_id;
        $ppost->title       = $request->title;
        $ppost->client      = $request->client;
        $ppost->company     = $request->company;
        $ppost->link        = $request->link;
        $ppost->slug        = Str::slug($request->title);
        $ppost->post        = $request->post;
        $ppost->summary     = $request->summary;
        $ppost->save();
        if($request->hasFile('thumbnail')){
            $new_location = public_path('portfolio/thumbnail/').
            $ppost->created_at->format('Y/m/').
            $ppost->id . '/' ;
            File::makeDirectory($new_location , $mode = 0777, true , true);
            $image = $request->file('thumbnail');
            $extension = Str::slug($request->title) .'.'. $image->getClientOriginalExtension();
            Image::make($image)->save($new_location . $extension);
            $ppost_update = Ppost::findOrFail($ppost->id);
            $ppost_update->thumbnail = $extension;
            $ppost_update->save();

        }
        if($request->hasFile('photo')){
            $new_location = public_path('portfolio/photo/').
            $ppost->created_at->format('Y/m/').
            $ppost->id . '/' ;
            File::makeDirectory($new_location , $mode = 0777, true , true);
            $image = $request->file('photo');
            $extension = Str::slug($request->client) .'.'. $image->getClientOriginalExtension();
            Image::make($image)->save($new_location . $extension);
            $ppost_update = Ppost::findOrFail($ppost->id);
            $ppost_update->photo = $extension;
            $ppost_update->save();

        }
        if($request->hasFile('images')){
            $images = $request->file('images');
            $new_location = public_path('portfolio/images/')
            . $ppost->created_at->format('Y/m/')
            . $ppost->id . '/';
            File::makeDirectory($new_location , $mode = 0777, true, true);
            foreach ($images as $img) {
                $img_ext   = Str::random(16).'.'. $img->getClientOriginalExtension();
                Image::make($img)->save($new_location . $img_ext);
                PpostImages::insert([
                    'user_id'       => Auth::id(),
                    'ppost_id'      => $ppost->id,
                    'images'        => $img_ext,
                    'created_at'    => Carbon::now()
                ]);
            }
        }

        return redirect()->route('Portfolio')->with('success','Portfolio Project Added');
    }
    function PpostEdit($slug){
        return view('admin.front.portfolio.ppost-edit',[
            'pcats' => Pcat::orderBy('id', 'desc')->get(),
            'ppost' => Ppost::where('slug', $slug)->first(),
        ]);
    }
    function PpostUpdate(Request $request){
        $request->validate([
            'title'          => ['required','min:3','max:100'],
            'pcat_id'          => ['required'],
        ]);
        $ppost              = Ppost::findOrFail($request->id);
        $ppost->user_id     = Auth::id();
        $ppost->pcat_id     = $request->pcat_id;
        $ppost->title       = $request->title;
        $ppost->client      = $request->client;
        $ppost->company     = $request->company;
        $ppost->link        = $request->link;
        $ppost->slug        = Str::slug($request->title);
        $ppost->post        = $request->post;
        $ppost->summary     = $request->summary;
        if($request->hasFile('thumbnail')){
            $thumbnail = $request->file('thumbnail');
            $extension_name = Str::slug($request->title).'.'.$thumbnail->getClientOriginalExtension();
            $old_thumbnail_location = public_path('portfolio/thumbnail/').
            $ppost->created_at->format('Y/m/').
            $ppost->id . '/' . $ppost->thumbnail;
            if(file_exists($old_thumbnail_location)){
                unlink($old_thumbnail_location);
            }
            Image::make($thumbnail)->save(public_path('portfolio/thumbnail/').
            $ppost->created_at->format('Y/m/').
            $ppost->id . '/' . $extension_name);
            $ppost->thumbnail = $extension_name;
        }
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $extension_name = Str::slug($request->client).'.'.$photo->getClientOriginalExtension();
            $old_photo_location = public_path('portfolio/photo/').
            $ppost->created_at->format('Y/m/').
            $ppost->id . '/' . $ppost->photo;
            if(file_exists($old_photo_location)){
                unlink($old_photo_location);
            }
            Image::make($photo)->save(public_path('portfolio/photo/').
            $ppost->created_at->format('Y/m/').
            $ppost->id . '/' . $extension_name);
            $ppost->photo = $extension_name;
        }
        if($request->hasFile('images')){
            $ppost_id = $request->id;
             $images = $request->file('images');

             $new_location = public_path('portfolio/images/')
             . $ppost->created_at->format('Y/m/'). $ppost->id . '/';

             $pimg = PpostImages::where('ppost_id', $ppost->id)->get();
            foreach ($pimg as $item) {
            $oldimg = public_path('portfolio/images/'.$ppost->created_at->format('Y/m/'.$item->ppost_id).'/'.$item->images);

        }
             File::makeDirectory($new_location , $mode = 0777, true, true);
             foreach ($images as $img) {
                 $img_ext   = Str::random(5).'.'. $img->getClientOriginalExtension();
                 Image::make($img)->save($new_location . $img_ext);
                 PpostImages::insert([
                     'user_id'    => Auth::id(),
                     'ppost_id'    => $ppost_id,
                     'images'      => $img_ext,
                     'created_at'  => Carbon::now()
                 ]);
             }
         }
        $ppost->save();
        return redirect()->route('Portfolio')->with('success','Portfolio Project Updated');
    }
    function PpostView($slug){
        return view('admin.front.portfolio.ppost-view',[
            'pcats' => Pcat::orderBy('id', 'desc')->get(),
            'ppost' => Ppost::where('slug', $slug)->first(),
            'ppost_images' => PpostImages::where('ppost_id', 1),
        ]);
    }
    function PpostDelete($id){
        Ppost::findOrFail($id)->delete();
        PpostImages::where('ppost_id', $id)->Delete();
        return redirect()->route('Portfolio')->with('success','Portfolio Project Deleted');
    }
    function MultipleImageDelete($id){
        PpostImages::findOrFail($id)->ForceDelete();
        return back()->with('success','Multiple Image Delete Deleted');
    }
    //Services
    function Services(){
        return view('admin.front.services.service',[
            'services' => Service::all(),
            'service_post'  => ServicePost::orderBy('id', 'desc')->get(),
        ]);
    }
    function ServiceStore(Request $request){
        $service = new Service();
        $service->user_id = Auth::id();
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->service = $request->service;
        $service->save();
        return redirect()->route('Services')->with('success', 'Services Added');
    }
    function ServiceUpdate(Request $request){
        $service = Service::findOrFail($request->id);
        $service->user_id = Auth::id();
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->service = $request->service;
        $service->save();
        return redirect()->route('Services')->with('success', 'Service Updated');
    }
    function ServiceDelete($slug){
        Service::where('slug', $slug)->first()->delete();
        return redirect()->route('Services')->with('success', 'Service Deleted');
    }
    function ServiceEdit($slug){
        return view('admin.front.services.services-edit',[
            'service'       => Service::where('slug', $slug)->first(),
        ]);
    }
    function ServiceAdd($id){
        return view('admin.front.services.service-add',[
            'service' => Service::findOrfail($id),
        ]);
    }
    function ServiceAddStore(Request $request){
        $request->validate([
            'title'          => ['required','min:3','max:100', 'unique:service_posts'],
            'icon'           => ['required'],
            'summary'        => ['required', 'min:7'],
        ]);
        $service = new ServicePost();
        $service->user_id = Auth::id();
        $service->service_id = $request->id;
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->summary = $request->summary;
        $service->post = $request->post;
        $service->icon = $request->icon;
        $service->icon_color = $request->icon_color;
        $service->icon_hover_color = $request->icon_hover_color;
        $service->bg_color = $request->bg_color;
        $service->bg_hover_color = $request->bg_hover_color;
        $service->save();
        return redirect()->route('Services')->with('success', 'Service Added');
    }
    function EditService($slug){
        return view('admin.front.services.service-edit', [
            'service' => ServicePost::where('slug', $slug)->first(),
        ]);
    }
    function EditServiceUpdate(Request $request){
        $request->validate([
            'title'          => ['required','min:3','max:100'],
            'icon'           => ['required'],
            'summary'        => ['required', 'min:7'],
        ]);
        $service = ServicePost::findOrFail($request->id);
        $service->service_id = $request->service_id;
        $service->user_id = Auth::id();
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->summary = $request->summary;
        $service->post = $request->post;
        $service->icon = $request->icon;
        $service->icon_color = $request->icon_color;
        $service->icon_hover_color = $request->icon_hover_color;
        $service->bg_color = $request->bg_color;
        $service->bg_hover_color = $request->bg_hover_color;
        $service->save();
        return redirect()->route('Services')->with('success', 'Service Added');
    }
    function DeleteService($slug){
        ServicePost::where('slug', $slug)->first()->delete();
        return redirect()->route('Services')->with('success', 'Service Deleted');
    }
    function ServiceView($slug){
        return view('admin.front.services.service-view',[
            'service' => ServicePost::where('slug', $slug)->first(),
            'pcats' => Pcat::all()
        ]);
    }
    function Testimonials(){
        return view('admin.front.testimonials.testimonials',[
            'testimonials' => Testimonial::orderBy('id', 'desc')->paginate(10),
        ]);
    }
    function TestimonialAdd(){
        return view('admin.front.testimonials.testimonial-add');
    }
    function TestimonialStore(Request $request){
        $request->validate([
            'name'          => ['required','min:3','max:100'],
            'title'          => ['required','min:3','max:200'],
        ]);
        $testimonial = new Testimonial();
        $testimonial->user_id       = Auth::id();
        $testimonial->name          = $request->name;
        $testimonial->title         = $request->title;
        $testimonial->designation   = $request->designation;
        $testimonial->about         = $request->about;
        $testimonial->address       = $request->address;
        $testimonial->phone         = $request->phone;
        $testimonial->email         = $request->email;
        $testimonial->quote         = $request->quote;
        $testimonial->summary       = $request->summary;
        $testimonial->slug          = Str::slug($request->name);
        if($request->status == 1){
            $testimonial->status        = 1;
        }else{
            $testimonial->status        = 2;
        }
        $testimonial->save();


        if($request->hasFile('photo')){
            $new_location = public_path('testimonial/photo/').
            $testimonial->created_at->format('Y/m/').
            $testimonial->id . '/' ;
            File::makeDirectory($new_location , $mode = 0777, true , true);
            $image = $request->file('photo');
            $extension = Str::slug($request->name.'-'.$testimonial->id) .'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 500)->save($new_location . $extension);
            $testimonial_update = Testimonial::findOrFail($testimonial->id);
            $testimonial_update->photo = $extension;
            $testimonial_update->slug = Str::slug($request->name.'-'.$testimonial->id);
            $testimonial_update->save();

        }
        return redirect()->route('Testimonials')->with('success', 'Testimonial Added');
    }
    function TestimonialDelete($slug){
        Testimonial::where('slug', $slug)->first()->delete();
        return redirect()->route('Testimonials')->with('success', 'Testimonial Deleted');
    }
    function TestimonialView($slug){
        $testimonial = Testimonial::where('slug', $slug)->first();
        return view('admin.front.testimonials.testimonial-view',[
            'testimonial' => $testimonial,
        ]);
    }
    function TestimonialUpdate(Request $request){
        $request->validate([
            'name'          => ['required','min:3','max:100'],
            'title'          => ['required','min:3','max:200'],
        ]);
        $testimonial = Testimonial::findOrFail($request->id);
        $testimonial->user_id       = Auth::id();
        $testimonial->name          = $request->name;
        $testimonial->title         = $request->title;
        $testimonial->designation   = $request->designation;
        $testimonial->about         = $request->about;
        $testimonial->address       = $request->address;
        $testimonial->phone         = $request->phone;
        $testimonial->email         = $request->email;
        $testimonial->quote         = $request->quote;
        $testimonial->summary       = $request->summary;
        $testimonial->slug          = Str::slug($request->name.'-'.$testimonial->id);
        if($request->status == 1){
            $testimonial->status        = 1;
        }else{
            $testimonial->status        = 2;
        }
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $extension_name = Str::slug($request->name.'-'.$testimonial->id).'.'.$photo->getClientOriginalExtension();
            $old_photo_location = public_path('testimonial/photo/').
            $testimonial->created_at->format('Y/m/').
            $testimonial->id . '/' . $testimonial->photo;
            if(file_exists($old_photo_location)){
                unlink($old_photo_location);
            }
            Image::make($photo)->save(public_path('testimonial/photo/').
            $testimonial->created_at->format('Y/m/').
            $testimonial->id . '/' . $extension_name);
            $testimonial->photo = $extension_name;
        }
        $testimonial->save();
        return redirect()->route('Testimonials')->with('success', 'Testimonial Updated');
    }
    //Contact
    function send(Request $request){
        $this->validate($request, [
            'name'      => 'required', 'min:4',
            'email'     => 'required|email',
            'subject'   => 'required',
            'message'   => 'required',
        ]);

        $data = array(
            'name'      => $request->name,
            'subject'  => $request->subject,
            'message'  => $request->message,
        );
        Mail::to('sohelarman.info@gmail.com')->send(new SendMail($data));
        return back()->with('success', 'Mail send successfully done');
    }
    //Footer
    function Footer(){
        return view('admin.front.footer.footer',[
            'footers' => Footer::all(),
            'socials' => Social::orderBy('id', 'desc')->get(),
        ]);
    }
    function AddFooter(Request $request){
        $request->validate([
            'name'          => ['required','min:3','max:100'],
            'title'          => ['required','min:3','max:200'],
        ]);
        $footer             = new Footer();
        $footer->user_id    = Auth::id();
        $footer->name       = $request->name;
        $footer->title      = $request->title;
        $footer->summary    = $request->summary;
        $footer->copyright    = $request->copyright;
        $footer->save();
        return redirect()->route('Footer')->with('success', 'Footer Added');
    }
    function AddSocial(Request $request){
        $request->validate([
            'social_name'          => ['required','min:2','max:100'],
            'social_link'          => ['required','min:2','max:100'],
            'social_icon'          => ['required','min:2','max:100'],
        ]);
        $footer                 = new Social();
        $footer->user_id        = Auth::id();
        $footer->section_id     = $request->id;
        $footer->social_name    = $request->social_name;
        $footer->social_link    = $request->social_link;
        $footer->social_icon    = $request->social_icon;
        $footer->save();
        return redirect()->route('Footer')->with('success', 'Social Media Added');
    }
    function DeleteFooter($id){
        Footer::findOrFail($id)->delete();
        return back()->with('success', 'Footer Deleted');
    }
    function SocialDelete($id){
        Social::findOrFail($id)->delete();
        return back()->with('success', 'Footer Deleted');
    }
    function FooterEdit($id){
        return view('admin.front.footer.footer-edit',[
            'footer' => Footer::findOrFail($id),
        ]);
    }
    function FooterUpdate(Request $request){
        $request->validate([
            'name'          => ['required','min:3','max:100'],
            'title'          => ['required','min:3','max:200'],
        ]);
        $footer                 = Footer::findOrFail($request->id);
        $footer->user_id        = Auth::id();
        $footer->name           = $request->name;
        $footer->title          = $request->title;
        $footer->summary        = $request->summary;
        $footer->copyright      = $request->copyright;
        $footer->save();
        return redirect()->route('Footer')->with('success', 'Footer Updated');
    }
    function SocialEdit($id){
        return view('admin.front.footer.social-edit',[
            'social' => Social::findOrFail($id),
        ]);
    }
    function SocialUpdate(Request $request){
        $request->validate([
            'social_name'          => ['required','min:2','max:100'],
            'social_link'          => ['required','min:2','max:100'],
            'social_icon'          => ['required','min:2','max:100'],
        ]);
        $social                 = Social::findOrFail($request->id);
        $social->user_id        = Auth::id();
        $social->section_id     = $request->id;
        $social->social_name    = $request->social_name;
        $social->social_link    = $request->social_link;
        $social->social_icon    = $request->social_icon;
        $social->save();
        return redirect()->route('Footer')->with('success', 'Social Media Updated');
    }

}
