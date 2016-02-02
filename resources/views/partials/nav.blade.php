<ul class="nav nav-tabs">
    @foreach ($items as $route => $text)
  <li role="presentation" {!! Html::classes(['active' => Route::is($route)]) !!}>
      <a href="{{ route($route) }}">{{ $text }}</a>
    </li>
    @endforeach
</ul>