<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use App\BlogCategory;
use App\BlogSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;
use Auth;
use Carbon\Carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::paginate();
        return view('admin.blog.blog',[
            'blog' => $blog,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.add-blog',[
            'blog_category' => BlogCategory::all(),
            'sub_category'  => BlogSubCategory::all(),
        ]);
    }
    function Blogs(){
        // $blogs = Blog::paginate();
        return view('admin.blog.blog',[
            'blogs'         => Blog::orderBy('id', 'desc')->paginate(10),
            'categories'    => BlogCategory::all(),
            'subcategories' => BlogSubCategory::all()
        ]);
    }
    function Post($slug){
        $blog = Blog::whereSlug($slug)->first();
        return view('admin.blog.post',[
            'blog' => $blog,
        ]);
    }
    function CatBlog($subcat_id){
        return view('admin.blog.blog-page',[
            'categories'    => BlogCategory::all(),
            'subcategories' => BlogSubCategory::all(),
            'blogs'         => Blog::paginate(),
        ]);
    }
    function BlogEdit($slug){
        $blog = Blog::where('slug', $slug)->first();
        return view('admin.blog.edit-blog',[
            'blog_category' => BlogCategory::all(),
            'sub_category'  => BlogSubCategory::all(),
            'blog'         => $blog,
        ]);
    }
    function BlogUpdate(Request $request){
        $update_blog = Blog::findOrFail($request->blog_id);
        $update_blog->title = $request->title;
        $update_blog->post = $request->post;
        $update_blog->summary = $request->summary;
        $update_blog->slug = Str::slug($request->title);
        $update_blog->category_id = $request->blog_category;
        $update_blog->subcategory_id = $request->sub_category;
        if($request->hasFile('thumbnail')){
            $thumbnail = $request->file('thumbnail');
            $extension = Str::slug($request->title).'.'.$thumbnail->getClientOriginalExtension();
            $old_location = public_path('images/thumbnail/'.$update_blog->created_at->format('Y/m').'/'.$update_blog->id.'/'.$update_blog->thumbnail);
            if(file_exists($old_location)){
                unlink($old_location);
            }
            Image::make($thumbnail)->save(public_path('images/thumbnail/'.$update_blog->created_at->format('Y/m').'/'.$update_blog->id.'/'. $extension));
            $update_blog->thumbnail = $extension;
            $update_blog->save();
        }
        $update_blog->save();
        return redirect()->route('Blogs')->with('success','Blog Upadated Successfully Done !');
    }
    function BlogDelete($id){
        Blog::findOrFail($id)->delete();
        return back()->with('success', 'Blog deleted successfully !');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumbnail'     => ['required'],
            'title'         => ['required', 'min:3', 'unique:blogs'],
            'summary'       => ['required','min:20'],
            'blog_category' => ['required'],
            'sub_category'  => ['required'],
            'post'          => ['required'],
        ]);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->post = $request->post;
        $blog->summary = $request->summary;
        $blog->slug = Str::slug($request->title);
        $blog->user_id = Auth::id();
        $blog->category_id = $request->blog_category;
        $blog->subcategory_id = $request->sub_category;
        $blog->save();

        if($request->hasFile('thumbnail')){
            $new_location = public_path('images/thumbnail/')
            . $blog->created_at->format('Y/m/')
            . $blog->id . '/';
            File::makeDirectory($new_location , $mode = 0777, true, true);
            $image = $request->file('thumbnail');
            $ext   = Str::slug($request->title).'.'. $image->getClientOriginalExtension();
            Image::make($image)->save($new_location . $ext);
            $blog_update = Blog::findOrFail($blog->id);
            $blog_update->thumbnail = $ext;
            $blog_update->save();
        }
        return redirect()->route('Blogs')->with('success','Blog Post Successfully Done !');


    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        return 'blog update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    //Blog Category
    function BlogCategory(){
        return view('admin.blog.blog-category',[
            'BlogCategory' => BlogCategory::paginate()
        ]);
    }
    function AddBlogCategory(Request $request){
        $request->validate([
            'blog_category_name' => ['required', 'min:3', 'unique:blog_categories']
        ],[
            'blog_category_name.required'    => '* The blog category name field is required.',
            'blog_category_name.min'         => '* The blog category name must be at least 3 characters.',
            'blog_category_name.unique'      => '* The blog category name has already been taken.'
        ]);
        $blog = new BlogCategory();
        $blog->blog_category_name = $request->blog_category_name;
        $blog->slug = Str::slug($request->blog_category_name);
        $blog->user_id = Auth::id();
        $blog->save();
        return back()->with('success', 'Blog Category Added Successfully');
    }
    function EditBlogCategory($slug){
        $get_blog_category  = BlogCategory::where('slug', $slug)->first();
        return view('admin.blog.edit-blog-category',[
            'blog_category' => $get_blog_category,
        ]);
    }
    function UpdateBlogCategory(Request $request){
        $request->validate([
            'blog_category_name' => ['required', 'min:3', 'unique:blog_categories']
        ],[
            'blog_category_name.required'    => '* The blog category name field is required.',
            'blog_category_name.min'         => '* The blog category name must be at least 3 characters.',
            'blog_category_name.unique'      => '* The blog category name has already been taken.'
        ]);
        $update = BlogCategory::findOrfail($request->id);
        $update->blog_category_name = $request->blog_category_name;
        $update->blog_category_name = $request->blog_category_name;
        $update->slug = Str::slug($request->blog_category_name);
        $update->save();
        return redirect()->route('BlogCategory')->with('success', 'Blog Category Updated Successfully');
    }
    function DeleteBlogCategory($id){
        $blog = BlogSubCategory::where('category_id', $id)->count();
        if($blog > 0){
            return back()->with('danger', "You can't Delete this Blog Category. alrady have Sub Catgory. 1st you delete Sub Category");
        }else{
            BlogCategory::findOrFail($id)->delete();
            return back()->with('success', 'Blog Category Deleted Successfully!');
        }
    }

    //Blog Sub Category
    function BlogSubCategory(){
        return view('admin.blog.blog-sub-category',[
            'BlogCategory'      => BlogCategory::paginate(),
            'BlogSubcategory'   => BlogSubCategory::paginate(),
        ]);
    }
    function AddSubCategory(Request $request){
        $request->validate([
            'sub_category_name' => ['required', 'min:3', 'unique:blog_sub_categories'],
            'blog_category_id' => ['required'],
        ],[
            'sub_category_name.required'    => '* The blog sub category name field is required.',
            'blog_category_id.required'    => '* The blog category name field is required.',
            'sub_category_name.required'    => '* The blog sub category name field is required.',
            'sub_category_name.min'         => '* The blog sub category name must be at least 3 characters.',
            'sub_category_name.unique'      => '* The blog sub category name has already been taken.'
        ]);
        $sub_category = new BlogSubCategory;
        $sub_category->user_id = Auth::id();
        $sub_category->category_id = $request->blog_category_id;
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->slug = Str::slug($request->sub_category_name);
        $sub_category->save();
        return back()->with('success', 'Blog sub category added successfull');

    }
    function EditSubCategory($slug){
        $get_sub_category = BlogSubCategory::where('slug', $slug)->first();
        return view('admin.blog.edit-sub-category',[
            'blog_category' => BlogCategory::orderBy('blog_category_name', 'asc')->get(),
            'sub_category'  => $get_sub_category,
        ]);
    }
    function UpdateSubCategory(Request $request){
        $request->validate([
            'sub_category_name' => ['required', 'min:3', 'unique:blog_sub_categories']
        ],[
            'sub_category_name.required'    => '* The blog sub category name field is required.',
            'sub_category_name.min'         => '* The blog sub category name must be at least 3 characters.',
            'sub_category_name.unique'      => '* The blog sub category name has already been taken.'
        ]);
        $update = BlogSubCategory::findOrfail($request->id);
        $update->category_id = $request->blog_category_id;
        $update->sub_category_name = $request->sub_category_name;
        $update->slug = Str::slug($request->sub_category_name);
        $update->save();
        return redirect()->route('BlogSubCategory')->with('success', 'Blog Category Updated Successfully');
    }
    // function DeleteSubCategory($slug){
    //     // BlogSubCategory::where('slug', $slug)->first()->delete();
    //     // return back()->with('danger', 'Blog Category Updated Successfully');
    // }
    function DeleteSubCategory($id){
        $blog = Blog::where('subcategory_id', $id)->count();
        if($blog > 0){
            return back()->with('danger', "You can't Delete this Blog Sub Category. Already have Post. 1st you delete Post");
        }else{
        BlogSubCategory::findOrFail($id)->delete();
        return back()->with('success', 'Blog Sub Category Deleted Successfully');
        }
    }

    public function image()
    {
        return view('admin.blog.image');
    }
    function imageUpload(Request $request)
    {
        if($request->hasFile('thumbnail')){
            $image = $request->file('thumbnail');
            return  Str::random(20).'.'. $image->getClientOriginalExtension();
        }
    }
    function GetCategoryID($category_id){
        return "$category_id";
    }


}
