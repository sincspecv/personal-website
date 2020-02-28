<div class="social-media">
  @foreach($social_media as $account)
    <div class="social-icon">
      <a href="{{ $account->link }}" target="_blank" title="My {{ $account->network }} account."><i class="fab fa-{{ $account->network }}"></i></a>
    </div>
  @endforeach
</div>
