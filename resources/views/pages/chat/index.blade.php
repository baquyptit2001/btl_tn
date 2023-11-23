@extends('layouts.app')

@section('title', "Chat")

@section('active', 'chat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h4>
                        Chat List
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Last message
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <a href="{{ route('chat.show', $user->id) }}">
                                                    {{ $user->name }}
                                                </a>
                                            </td>
                                            <td>
                                                @if($user->lastMessage)
                                                    @if($user->lastMessage->sender_id == null)
                                                        <span style="font-weight: bold;">
                                                            You:
                                                        </span>
                                                    @endif
                                                    {{ $user->lastMessage->message }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
