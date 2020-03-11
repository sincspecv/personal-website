<section class="section numbered-sequence">
  <div class="container">
    <div class="columns is-centered numbered-sequence__heading">
      <div class="column">
        <h2>{!! esc_attr( $fields->section_heading ) !!}</h2>
      </div>
    </div>
    <div class="columns is-variable {{ count( $fields->sequence_items ) < 4 ? 'is-centered ' : '' }}is-6 is-multiline sequence-items">
      @foreach($fields->sequence_items as $item)
        <div class="column is-one-quarter-desktop is-half-tablet is-full-mobile sequence-item item-{{ $loop->iteration }}">
          <aside class="sequence-item__number">
            <span class="h1">{{ $loop->iteration }}.</span>
          </aside>
          <div class="sequence-item__heading">
            <h3>{!! esc_attr( $item->heading ) !!}</h3>
          </div>
          <article class="sequence-item__text">
            {!! $item->text !!}
          </article>
        </div>
      @endforeach
    </div>
  </div>
</section>
