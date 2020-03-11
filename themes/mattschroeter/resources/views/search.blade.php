@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <section class="section no-search-results">
      <div class="container">
        <div class="columns is-centered">
          <div class="alert alert-warning" style="text-align:center">
            <span class="h3" style="display:inline-block;margin-bottom:1.44rem">{{ __('Sorry, no results were found.', 'sage') }}</span>
            {!! get_search_form(false) !!}
          </div>
        </div>
      </div>
    </section>
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

  {!! get_the_posts_navigation() !!}
@endsection
