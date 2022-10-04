<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Portfolio;
use Illuminate\Http\Request;
use App\Profile;
use App\Skill;
use App\User;
use Auth;
use File;
use Str;
use Image;

class AdminController extends Controller
{
    function Profile(){
        return view('admin.profile.profile',[
            'profile_count'     => Profile::where('user_id', Auth::id())->get(),
            'profiles'          => Profile::where('user_id', Auth::id())->first(),
            'blog'              => Blog::where('user_id', Auth::id()),
            'skill'             => Skill::where('user_id', Auth::id()),
            'portfolio'         => Portfolio::where('user_id', Auth::id()),
            'users'             => User::where('id', Auth::id())->first(),
        ]);
    }
    function AddProfile(Request $request){
        $user           = User::findOrFail(Auth::id());
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->save();
        $profile                = new Profile;
        $profile->user_id       = Auth::id();
        $profile->first_name    = $request->first_name;
        $profile->middle_name   = $request->middle_name;
        $profile->last_name     = $request->last_name;
        $profile->slug          = Str::slug(Auth::user()->name.'-'.Auth::id());
        $profile->title         = $request->title;
        $profile->designation   = $request->designation;
        $profile->gender        = $request->gender;
        $profile->region        = $request->region;
        $profile->birthday      = $request->birthday;
        $profile->nid           = $request->nid;
        $profile->address1      = $request->address1;
        $profile->address2      = $request->address2;
        $profile->city          = $request->city;
        $profile->state         = $request->state;
        $profile->country       = $request->country;
        $profile->zip           = $request->zip;
        $profile->phone         = $request->phone;
        $profile->about         = $request->about;
        $profile->summary       = $request->summary;
        $profile->description   = $request->description;
        $profile->status        = $request->status;
        $profile->save();
        if($request->hasFile('photo')){
            $new_location = public_path('user/photo/').
            $profile->created_at->format('Y/m/').
            Auth::id() . '/' ;
            File::makeDirectory($new_location , $mode = 0777, true , true);
            $image = $request->file('photo');
            $extension = Str::slug(Auth::user()->name.'-'.Auth::id()) .'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(500, 500)->save($new_location . $extension);
            $profile_update = Profile::findOrFail($profile->id);
            $profile_update->photo = $extension;
            $profile_update->slug = Str::slug(Auth::user()->name.'-'.Auth::id());
            $profile_update->save();

        }
        if($request->hasFile('cover')){
            $new_location = public_path('user/cover/').
            $profile->created_at->format('Y/m/').
            Auth::id() . '/' ;
            File::makeDirectory($new_location , $mode = 0777, true , true);
            $image = $request->file('cover');
            $extension = Str::slug(Auth::user()->name.'-'.Auth::id()) .'.'. $image->getClientOriginalExtension();
            Image::make($image)->save($new_location . $extension);
            $profile_update = Profile::findOrFail($profile->id);
            $profile_update->cover = $extension;
            $profile_update->slug = Str::slug(Auth::user()->name.'-'.Auth::id());
            $profile_update->save();

        }
        return back()->with('success', 'User information updated !');
    }
    function UpdateProfile(Request $request){
        $user           = User::findOrFail(Auth::id());
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->save();
        $profile                = Profile::findOrFail($request->id);
        $profile->first_name    = $request->first_name;
        $profile->middle_name   = $request->middle_name;
        $profile->last_name     = $request->last_name;
        $profile->slug          = Str::slug(Auth::user()->name.'-'.Auth::id());
        $profile->title         = $request->title;
        $profile->designation   = $request->designation;
        $profile->gender        = $request->gender;
        $profile->region        = $request->region;
        $profile->birthday      = $request->birthday;
        $profile->nid           = $request->nid;
        $profile->address1      = $request->address1;
        $profile->address2      = $request->address2;
        $profile->city          = $request->city;
        $profile->state         = $request->state;
        $profile->country       = $request->country;
        $profile->zip           = $request->zip;
        $profile->phone         = $request->phone;
        $profile->about         = $request->about;
        $profile->summary       = $request->summary;
        $profile->description   = $request->description;
        $profile->status        = $request->status;
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photo_extension = Str::slug($request->name.'-'.Auth::id()).'.'.$photo->getClientOriginalExtension();
            $old_location = public_path('user/photo/').$profile->created_at->format('Y/m/').Auth::id().'/'.$profile->photo;
            if(file_exists($old_location)){
                unlink($old_location);
            }
            Image::make($photo)->resize(500, 500)->save(public_path('user/photo/').$profile->created_at->format('Y/m/').Auth::id().'/'. $photo_extension);
            $photo_update        = Profile::findOrFail($profile->id);
            $photo_update->photo = $photo_extension;
            $photo_update->save();
        }
        if($request->hasFile('cover')){
            $cover = $request->file('cover');
            $cover_extension = Str::slug($request->name.'-'.Auth::id()).'.'.$cover->getClientOriginalExtension();
            $old_location = public_path('user/cover/').$profile->created_at->format('Y/m/').Auth::id().'/'.$profile->cover;
            if(file_exists($old_location)){
                unlink($old_location);
            }
            Image::make($cover)->save(public_path('user/cover/').$profile->created_at->format('Y/m/').Auth::id().'/'. $cover_extension);
            $cover_update           = Profile::findOrFail($profile->id);
            $cover_update->cover    = $cover_extension;
            $cover_update->save();
        }
        $profile->save();
        return back()->with('success', 'User information updated !');
    }
}
