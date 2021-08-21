@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<h1>タスク一覧</h1>
<header class="mb-4">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                {{-- トップページへのリンク --}}
                <a class="navbar-brand" href="/">TaskList</a>

                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="nav-bar">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav">
                        {{-- メッセージ作成ページへのリンク --}}
                        <li class="nav-item">{!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'nav-link']) !!}</li>
                    </ul>
                </div>
            </nav>
        </header>

    @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>タスク</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                
                
                    {{-- メッセージ詳細ページへのリンク --}}
                    <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                    <td>{{$task->status}}</td>
                    <td>{{ $task->content }}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'btn btn-primary']) !!}

@endsection