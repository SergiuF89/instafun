@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img class="rounded-circle" src="{{ $user->profile->profileImage() }}" style="width:250px;">
            </div>
            <div class="col-9 pt-5 pl-5">
                <div class="d-flex pl-5 justify-content-between align-items-baseline">
                      <div class="d-flex align-items-center pb-4">
                            <h3>{{ $user->username }}</h3>
                              <follow-button user-id="{{ $user->id }}"></follow-button>
                      </div>
                      @can ('update', $user->profile)
                              <a href="/posts/create">Add new post</a>
                      @endcan
                </div>
                  @can ('update', $user->profile)
                        <a class="ml-5" href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                  @endcan
                  <div class="d-flex pl-5">
                          <div class="pr-5"><strong>{{$user->posts->count()}} </strong>posts</div>
                          <div class="pr-5"><strong>23k </strong>followers</div>
                          <div class="pr-5"><strong>212 </strong>following</div>
                  </div>
                      <div class="pt-4 pl-5 font-weight-bold">{{ $user->profile->title }}</div>
                      <div class="pl-5">{{ $user->profile->description }}</div>
                      <div class="pl-5"><a href="#">{{ $user->profile->url }}</a></div>
                   </div>
            </div>

        <div class="row pt-5">
            @foreach($user->posts as $post)
                  <div class="col-4">
                        <p>{{$post->caption}}</p>
                        <a href="/posts/{{ $post->id }}"><img class='pb-4 w-75 h-75' src="/storage/{{ $post->image }}" alt=""></a>
                  </div>
            @endforeach
        </div>
    </div>
@endsection
