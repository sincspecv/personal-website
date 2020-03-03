@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @if(!is_front_page())
      @include('partials.page-title')
    @endif
    @include('partials.modules')
  @endwhile
@endsection
