<section class="section cascading-services">
  <div class="container">
    @foreach($fields->blocks as $service)
    <div class="columns service">
        <div class="column">
          <div class="service__icon">
            <i class="{{ $service->icon_class }}" aria-hidden="true"></i>
          </div>
          <div class="service__content">
            <h2 class="service__content-heading">{{ $service->heading }}</h2>
            <div class="service__content-text">
              {!! $service->text !!}
            </div>
            @if($service->link)
              <a class="service__content-link" href="{{ $service->link->url }}" target="{{ $service->link->target }}">{{ $service->link->title }}</a>
            @endif
          </div>
        </div>
    </div>
    @endforeach
  </div>
</section>
