@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">かあスレッド(index)</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <p>{{ Auth::user()->name }}さん、投稿してみましょう！</p>
                        <form method="POST" action="{{ route('post.store') }}">
                            @csrf
                            <textarea name="message"></textarea>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="reply_post_id" value="0">
                            <button class="btn btn-primary btn-sm" type="submit">
                                投稿する
                            </button>
                        </form>
                    </div>
                    
                    <h5>現在の投稿状況</h5>

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">id</th>
                          <th scope="col">メッセージ</th>
                          <th scope="col">User ID</th>
                          <th scope="col">Reply</th>
                          <th scope="col">Created</th>
                          <th scope="col">Updated</th>
                          <th scope="col">Config</th>

                        </tr>
                      </thead>
                      @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->message}}</td>
                            <td>{{$post->user_id}}</td>
                            <td>{{$post->reply_post_id}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td><a href="{{ route('post.show' , ['id' => $post->id]) }}">詳細</a></td>
                        </tr>
                      @endforeach
                      <tbody>

                      </tbody>
                    </table>
                    
                    <h5>現在の登録状況</h5>

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">id</th>
                          <th scope="col">name</th>
                          <th scope="col">email</th>
                          <th scope="col">password</th>
                          <th scope="col">picture</th>
                          <th scope="col">Created</th>
                          <th scope="col">Updated</th>
                        </tr>
                      </thead>
                      @foreach ($members as $member)
                        <tr>
                            <td>{{$member->id}}</td>
                            <td>{{$member->name}}</td>
                            <td>{{$member->email}}</td>
                            <td>{{$member->password}}</td>
                            <td>{{$member->picture}}</td>
                            <td>{{$member->created_at}}</td>
                            <td>{{$member->updated_at}}</td>
                        </tr>
                      @endforeach
                      <tbody>

                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection