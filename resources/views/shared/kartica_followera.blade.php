@foreach($user->followers as $follower)
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                        <a href="{{ route('profile', ['username' => $follower->user_id]) }}">
                        </a>
                    </div>
                    <div class="col-md-10">
                        <h4><a href="{{ route('profile', ['username' => $follower->user_id]) }}">{{ $follower->username }}</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach