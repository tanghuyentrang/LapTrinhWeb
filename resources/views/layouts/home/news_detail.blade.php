@extends('layouts.home.layout')
@section('title','News Detail')
@section('css')

@endsection
@section('content')

<div class="section-row">
	<h3>{{ $article->summary }}</h3>
	<div class="post-body">
		<ul class="post-meta">
			<li>{{ $article->user->user_name }}</li>
			<li>{{ $article->created_at }}</li>
		</ul>
		<br>
		{!! $article->content !!}
	</div>
</div>

<div class="section-row">
	<div class="section-title">
		<h3 class="title"> Comments</h3>
	</div>
	<div class="post-comments">
        @foreach( $comment as $cm)
      
		<!-- comment -->
		<div class="media">
			
			<div class="media-body">
				<div class="media-heading">
					<h4>{{ $cm->user->user_name }}</h4>
					<span class="time">{{ $cm->created_at }}</span>
				</div>
				<p>{{ $cm->content }}</p>
			</div>
		</div>
		
		@endforeach
	</div>
</div>
@if(!empty(Auth::id()))
<div class="section-row">
	<div class="section-title">
		<h3 class="title"> <small>Leave a reply</small></h3>
	</div>
	<form class="post-reply" action="{{ route('admin_comment_store') }}" method="post">
		@csrf
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<input type="hidden" name="article_id" value="{{ $article->id }}">
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
					<textarea class="input" name="content" placeholder="Comment..." required></textarea>
				</div>
			</div>
			<div class="col-md-12">
				<button class="primary-button">Submit</button>
			</div>

		</div>
	</form>
</div>
@endif
@endsection
@section('js')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c364861377e05c8"></script>
@endsection