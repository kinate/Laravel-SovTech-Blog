@extends('Layouts.MasterLayout')
@section('page_title','New Post')
@section('page_contents')

@section('summernote_css')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

<div class="container pt-4 pb-4">
	<div class="row justify-content-center">
		
		<div class="col-md-12 col-lg-12">
		
			<div class="border p-5">
				<div class="row justify-content-between">
					<!-- <div class="col-md-5 mb-2 mb-md-0">
						<h5 class="font-weight-bold secondfont">Welcome!</h5>
						 Login to manage post
					</div> -->
					<div class="col-md-12">
                   
                    <form method="post" action="{{URL::to('update_post_data',['encrypted_id'=>\base64_encode($post->id)])}}" enctype="multipart/form-data"> 
                        @csrf
						<div class="row">
                            <div class="col-md-12 mt-2">
                                 <h3>Edit Post</h3>
							</div>
							<!-- form validation-->
							@if ($errors->any())
								
								<ul>
									@foreach ($errors->all() as $error)
										<li style="color:#DC1650">{{ $error }}</li>
									@endforeach
								</ul>
							@endif
							<!-- end form validation-->
                            @include('Layouts.notify')
                            @csrf  
							<div class="col-md-12 mt-2">
								<input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{$post->title}}" required>
							</div>
							<div class="col-md-12 mt-2">
								<input type="text" id="slug" name="slug" class="form-control" placeholder="Slug" value="{{$post->slug}}"  required readonly>
							</div>
                            <div class="col-md-12 mt-2">
								<select name="category" class="form-control" id="">
                                    <option value="{{$post->category}}" selected>{{$post->category}}</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Politics">Politics</option>
                                    <option value="Health">Health</option>
                                </select>
							</div>
                            <div class="col-md-12 mt-2">
                            <textarea id="summernote" name="content">{{$post->content}}</textarea>
                            </div>

                            <div class="col-md-12 mt-2">
                                <label for=""><b>Cover image</b></label>
								<input type="file" name="image" class="form-control" placeholder="Post image">
							</div>
                            
							<div class="col-md-3 mt-2">
								<button type="submit" class="btn btn-success btn-block">Update Post</button>

							</div>
						</div>
                        
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('sumernote_js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
$(document).ready(function() {
  $('#summernote').summernote();
});
</script>
@endsection