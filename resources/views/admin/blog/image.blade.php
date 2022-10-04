@extends('admin.master')
@section('title','Blog Page')
@section('blog_menu_open','menu-open')
@section('blog_active','active')
@section('blog_open_active','active')
@section('content')
    <!-- Main content Start -->
	<section class="content">
        <!-- /.container-fluid -->
		<div class="container-fluid">
            {{--  Session Alerm start  --}}
            @if (session('UserAdd'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                {{ session('UserAdd') }}
            </div>
            @endif
            {{--  Session Alerm End  --}}
			<!-- Counter boxes (Start box) -->

            <form class="form-horizontal" action="{{ route('imageUpload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-4">
                        <!-- Horizontal Form -->
                        <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Add Other Options</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="thumbnail">Thumbnail</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="thumbnail" class="form-control custom-file-input @error('thumbnail') is-invalid @enderror" id="thumbnail" onchange="loadFile(event)">
                                            <label class="custom-file-label" for="thumbnail">Choose file</label>
                                            @error('thumbnail')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <img class="img-thumbnail" id="output"/>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add Thumbnail</button>
                            <button type="reset" class="btn btn-default float-right">Clear</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    <!-- /.card -->
                    </div>
                    <!-- /.col -->

                </div>

                <!-- Counter boxes (End box) -->

            </form>
		</div>
        <!-- /.container-fluid -->
	</section>
    <!-- Main content End -->
@endsection
@section('footer_js')
<script>
    $('#blog_category').change(function(){
        var categoryID = $(this).val();
        if(categoryID){
            $.ajax({
               type:"GET",
               url:"{{url('category-list-id')}}/"+categoryID,
               success:function(res){
                if(res){
                    $("#category_id").empty();
                    $("#category_id").append('<option>Select Sub Category</option>');
                    $.each(res,function(key,value){
                        $("#category_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });

                }else{
                   $("#category_id").empty();
                }
               }
            });
        }else{
            $("#category_id").empty();
            $("#category_id").empty();
        }
       });
        $('#category_id').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
               type:"GET",
               url:"{{url('api/get-city-list')}}/"+stateID,
               success:function(res){
                if(res){
                    $("#city_id").empty();
                    $("#city_id").append('<option>Select City</option>');
                    $.each(res,function(key,value){
                        $("#city_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });

                }else{
                   $("#city_id").empty();
                }
               }
            });
        }else{
            $("#city_id").empty();
        }

       });
</script>


<script>
    $(document).ready(function () {
    var option = document.getElementById("status").options;
    if (document.getElementById('source').value == "MANUAL") {
        $("#status").append('<option>OPEN</option>');
        $("#status").append('<option>DELIVERED</option>');
        }
    if (document.getElementById('source').value == "ONLINE") {
        $("#status").append('<option>OPEN</option>');
        $("#status").append('<option>DELIVERED</option>');
        $("#status").append('<option>SHIPPED</option>');
        }
    });
    </script>
{{-- CK Editor  --}}
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
  CKEDITOR.replace('my-editor', options);
</script>

{{--  Image upload preview  --}}
<script>
    var loadFile = function(event) {
      var output = document.getElementById('output');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
    };
  </script>
@endsection
