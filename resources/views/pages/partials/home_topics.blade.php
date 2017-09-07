

@if (count($topics))


    @foreach ($topics as $topic)
        <div class="media">
          <div class="media-body">
            <h2 class="media-heading">
              <a href="{{ $topic->link() }}" title="{{ $topic->title }}">
                  {{{ $topic->title }}}
              </a>
            </h2>

            <div class="row">
              <div class="col-xs-6">
                @if ($topic->order > 0 && !Input::get('filter') && Route::currentRouteName() != 'home' )
                    <span class="badge">{{ lang('Stick') }}</span>
                @else
                    <span class="badge">
                      <a href="#" style="color:#fff;">{{ $topic->category->name }}</a>
                    </span>
                @endif
              </div>
              <div class="col-xs-6">
                <a class="pull-right" style="color:#666;" href="{{ $topic->link() }}">
                    {{ $topic->vote_count }} {{ lang('Up Votes') }}
                    <span> ⋅ </span>
                    {{ $topic->reply_count }} {{ lang('Replies') }}
                 </a>
              </div>
            </div>

            <p style="margin-top:10px;color:#888;">{{ $topic->excerpt }}</p>

          </div>
        </div>
        <hr>
    @endforeach


@else
   <div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
@endif
