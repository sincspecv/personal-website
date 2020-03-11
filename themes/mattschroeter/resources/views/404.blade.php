@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <section class="section four-oh-four">
      <div class="container">
        <div class="columns is-centered is-vcentered">
          <span class="alert alert-warning h3">
            {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
          </div>
          {!! get_search_form(false) !!}
        </div>
      </div>
    </section>

  @endif
@endsection
