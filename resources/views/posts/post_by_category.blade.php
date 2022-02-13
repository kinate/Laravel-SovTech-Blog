@extends('Layouts.MasterLayout')
@section('page_title','Post category')
@section('page_contents')


    
<!----------MAIN---------->
<div class="container">
	<div class="row justify-content-between">
		<div class="col-md-12">
			<h5 class="font-weight-bold spanborder"><span>{{$category}} Posts</span></h5>

            @include('Layouts.notify')

            @if($posts->isEmpty())
                <div class="col-md-12 mt-2" style="color:orange">
                <i class="icon fas fa-info-circle"></i> No post found for category, please <a href="{{url('login')}}">login</a> to post {{$category}}
                </div>
            @else
            @foreach($posts as $post)
			<div class="mb-3 d-flex justify-content-between">
				<div class="pr-3">
					<h2 class="mb-1 h4 font-weight-bold">
					<a class="text-dark" href="{{URL::to('post_details',['encrypted_id'=>\base64_encode($post->id)])}}">{{$post->title}}</a> 
					</h2>
                    <!--post description here-->
                    
                    @if(Auth::check())
                        @if($post->author==Auth::user()->id)
                            <p>   
                                <a href="{{URL::to('edit_post',['encrypted_id'=>\base64_encode($post->id)])}}">Edit</a>
                                |
                                <a href="{{URL::to('delete_post',['encrypted_id'=>\base64_encode($post->id)])}}">Delete</a> 
                            </p>
                        @else
                            <div class="col-md-12 mt-2" style="color:orange">
                            <i class="icon fas fa-info-circle"></i> Only author of this post can manage
                            </div>
                        @endif
                    @endif
					<div class="card-text text-muted small">
					{{$post->category}} | Posted by {{$post->user->name}} 
					</div>
					<small class="text-muted">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
				</div>
				<img height="120" src="{{asset('storage/img/posts/'.$post->image)}}">
			</div>
            @endforeach
            @endif
           
		</div>
 
	</div>

</div>

@endsection

