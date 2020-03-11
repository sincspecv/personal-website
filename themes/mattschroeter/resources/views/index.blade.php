@extends('layouts.app')

@section('content')
  @include('partials.archive-title')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <section class="section post-archive">
    <div class="container">
      <div class="columns is-multiline">
        @while (have_posts()) @php the_post() @endphp
        @include('partials.archive-post')
        @endwhile
      </div>
    </div>
  </section>

  @if(wp_count_posts()->publish > get_option('posts_per_page'))
    <section class="section archive-pagination">
      <div class="container">
        <div class="clolumns is-centered">
          <div class="column">
            {!! App::pagination() !!}
          </div>
        </div>
      </div>
    </section>
  @endif

@endsection
