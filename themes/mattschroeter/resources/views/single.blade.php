@extends('layouts.app')
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @if(!is_front_page())
      @include('partials.page-title')
    @endif
    @include('partials.content-single-'.get_post_type())
  @endwhile
@endsection
