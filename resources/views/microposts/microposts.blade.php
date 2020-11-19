@if (count($microposts) > 0)
    <ul class="list-unstyled">
        @foreach($microposts as $micropost)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{Gravatar::get($micropost->user->email,['size'=>50])}}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show',$micropost->user->name,['user'=>$micropost->user->id])!!}
                    <span class="text-muted">posted at {{$micropost->created_at}}</span>
                </div>
                <div>
                    <p class="mb-0">{!!nl2br(e($micropost->content))!!}</p>
                </div>
                <div class="btn-group">
                    @if (Auth::user()->is_favorite($micropost->id))
                        {!! Form::open(['route' => ['favorites.unfavorite',$micropost->id],'method' => 'delete']) !!}
                            {!! Form::submit('unFavorite',['class' => "btn btn-warning btn-sm"]) !!}
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route' => ['favorites.favorite',$micropost->id]]) !!}
                            {!! Form::submit('Favorite',['class' => "btn btn-success btn-sm"]) !!}
                        {!! Form::close() !!}
                    @endif
                    @if(Auth::id() == $micropost->user_id)
                    {!! Form::open(['route'=>['microposts.destroy',$micropost->id],'method'=>'delete'])!!}
                        {!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm ml-1'])!!}
                    {!! Form::close()!!}
                    @endif
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    {{$microposts->links()}}
@endif
