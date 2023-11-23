@extends('layouts.app')

@section('title', "Chat - " . $user->name)

@section('active', 'chat')

@php
    $authUser = auth()->user();
@endphp

@section('content')
    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container-fluid px-md-4">
            <div class="row no-gutters" style="justify-content: center">
                <div class="col-md-8">
                    <div class="card" style="height: 80vh;">
                        <div class="card-body">
                            <h4>
                                Chat with {{ $user->name }}
                            </h4>
                            <hr>
                            <div class="table-responsive">
                                <div class="chat-box">
                                    @foreach($chats as $message)
                                        <div
                                            class="outer-box box-{{ ($authUser->isAdmin() && $message->sender_id == null) || (!$authUser->isAdmin() && $message->sender_id != null) ? 'sender' : 'receiver' }}">
                                            @if(($authUser->isAdmin() && $message->sender_id == null) || (!$authUser->isAdmin() && $message->sender_id != null))
                                                <div class="row justify-content-end sender-message">
                                                    <div class="col-4">
                                                        <div class="alert alert-primary" role="alert">
                                                            {{ $message->message }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="row receiver-message">
                                                    <div class="col-4">
                                                        <div class="alert alert-secondary" role="alert">
                                                            {{ $message->message }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                                <form action="{{ route('chat.send', $user->id) }}" method="post">
                                    @csrf
                                    <div class="input-group">
                                        <div class="row no-gutters align-items-stretch">
                                            <div class="col-md-10">
                                                <input type="text" name="message" class="form-control"
                                                       placeholder="Type your message here...">
                                            </div>
                                            <div class="col-md-2 h-100">
                                                <button class="btn btn-primary send-message-button"
                                                        style="height: 100%;background-color: #242B64 !important;"
                                                        type="submit">
                                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                    Send
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <hr>
                            <a href="{{ route('chat.index') }}" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style="display: none"
         id="chat-sample"
         class="outer-box box-#{type}">
        <div class="row #{class}">
            <div class="col-4">
                <div class="alert alert-primary" role="alert">
                    #{message}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            Pusher.logToConsole = true;

            var pusher = new Pusher('4cf90ee119b2e0ac8c23', {
                cluster: 'ap1'
            });

            $('.chat-box').animate({scrollTop: $('.chat-box')[0].scrollHeight}, 500);

            let currentUserId = {{ $authUser->isAdmin() ? 'null' : $user->id }};

            var channel = pusher.subscribe('chat-channel');
            channel.bind('chat-event-{{ $user->id }}', function (data) {
                let message_data = data.message;
                let sample = $('#chat-sample').html();
                let type = message_data.sender_id == currentUserId ? 'sender' : 'receiver';
                let classType = message_data.sender_id == currentUserId ? 'justify-content-end sender-message' : 'receiver-message';
                let html = sample.replace(/#{message}/g, message_data.message)
                    .replace(/#{type}/g, type)
                    .replace(/#{class}/g, classType);
                $('.chat-box').append(html);
                $('.chat-box').animate({scrollTop: $('.chat-box')[0].scrollHeight}, 500);
            });
        });
    </script>
@endsection

@section('css')
    @parent
    <style>
        .chat-box {
            height: 60vh;
            overflow-y: scroll;
        }

        .send-message-button:hover {
            background-color: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .sender-message {
            margin-bottom: 10px;
            background-color: #f8f9fa;
            width: fit-content;
            max-width: 80%;
            border-radius: 10px;
        }

        .receiver-message {
            margin-bottom: 10px;
            width: fit-content;
            max-width: 80%;
            background-color: #242B64;
            color: #fff;
            border-radius: 10px;
        }

        .outer-box {
            width: 100%;
        }

        .box-sender {
            display: flex;
            justify-content: flex-end;
        }

        .box-receiver {
            display: flex;
            justify-content: flex-start;
        }
    </style>

@endsection
