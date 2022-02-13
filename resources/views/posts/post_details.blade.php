@extends('Layouts.MasterLayout')
@section('page_title','Post details')
@section('page_contents')

<!-------Post header------------->
<div class="container">
	<div class="jumbotron jumbotron-fluid mb-3 pl-0 pt-0 pb-0 bg-white position-relative">
		<div class="h-100 tofront">
			<div class="row justify-content-between">
				<div class="col-md-6 pt-6 pr-6 align-self-center">
					<p class="text-uppercase font-weight-bold">
						<a class="text-danger" href="{{URL::to('post_by_category',['category'=>$post->category])}}">{{$post->category}}</a>
					</p>
					<h1 class="display-4 secondfont mb-3 font-weight-bold">{{$post->title}}</h1>
					<div class="d-flex align-items-center">
						<small class="ml-2">Posted by {{$post->user->name}} <span class="text-muted d-block">
                        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                        </span>
						</small>
                        
					</div>
                    
				</div>
				<div class="col-md-6 pr-0">
					<img src="{{asset('storage/img/posts/'.$post->image)}}">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Post header -->
<!-----------Post contents------------->
<div class="container pt-4 pb-4"  style="padding-top:0px; !important">
	<div class="row justify-content-center">

		<div class="col-md-12 col-lg-12">
			<article class="article-post">
			<p>
				{!! $post->content !!}
			</p>
		</article>
            @if(Auth::check())
                @if($post->author==Auth::user()->id)
                    <p>   
                        <a href="{{URL::to('edit_post',['encrypted_id'=>\base64_encode($post->id)])}}">Edit</a>
                            |
                        <a href="#" data-toggle="modal" data-target="#post{{$post->id}}">Delete</a>  
                    </p>
                 @else
                    <div class="col-md-12 mt-2" style="color:orange">
                    <i class="icon fas fa-info-circle"></i> Only author of this post can manage
                </div>
            @endif
        @endif
		</div>
	</div>
</div>
<!-----------Related posts section------------->
<div class="container pt-4 pb-4">
	<h5 class="font-weight-bold spanborder"><span>Related posts</span></h5>
	<div class="row">
		<div class="col-lg-12">
			<div class="flex-md-row mb-4 box-shadow ">
        @if($related_posts->isEmpty())        
            <div class="col-md-12 mt-2" style="color:orange">
                <i class="icon fas fa-info-circle"></i> No related post found.
            </div>   
        @else
            @foreach($related_posts as $related_post)
				<div class="mb-3 d-flex align-items-center">
                <img height="80" src="{{asset('storage/img/posts/'.$related_post->image)}}">
					<div class="pl-3">
						<h2 class="mb-2 h6 font-weight-bold">
						<a class="text-dark" href="{{URL::to('post_details',['encrypted_id'=>\base64_encode($related_post->id)])}}">{{$related_post->title}}</a>
						</h2>
						<div class="card-text text-muted small">
                        {{$related_post->category}} | Posted by {{$related_post->user->name}}
						</div>
						<small class="text-muted">{{ \Carbon\Carbon::parse($related_post->created_at)->diffForHumans() }}</small>
					</div>
				</div>
            @endforeach
        @endif

			</div>
		</div>
	</div>
</div>

<!-- Modal delete notofication -->
<div class="modal fade" id="post{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="icon fas fa-info-circle" style="color:#DC1650"></i> Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure to delete <b>{{$post->title}}</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="{{URL::to('delete_post',['encrypted_id'=>\base64_encode($post->id)])}}">Delete</a>
      </div>
    </div>
  </div>
</div>
<!-- End Modal delete notofication -->


    


@endsection