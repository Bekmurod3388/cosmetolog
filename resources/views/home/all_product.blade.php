@extends('home.app')
@section('content')
    <div class="hero_area">
        <!-- header section strats -->
        @include("home.header")
        <!-- product section -->
        @include('home.product_view')
        <!-- end product section -->


        <!-- Comments -->

        <div style="text-align: center; padding-bottom: 30px;">
            <p style="font-size: 30px; text-align: center; padding-top: 20px; padding-bottom: 20px;">Comments</p>
            <form action="{{ route('add_comment') }}" method="post">
                @csrf
                <textarea name="comment" style="height: 150px; width: 600px;"
                          placeholder="Comment something here"></textarea>
                <input type="submit" class="btn btn-primary" value="Comment">
            </form>
        </div>


        <div style="padding-left: 20%">
            <p style="font-size: 30px; padding-bottom: 20px;">All Comments</p>

            @foreach($comments as $item)
                <div class="mb-5">
                    <b>{{ $item->name }}</b>
                    <p>{{ $item->comment }}</p>
                    <a href="javascript::void(0)" onclick="reply(this)" data-CommentId="{{ $item->id }}">Reply</a>
                    @foreach($reply as $data)
                        @if($data->comment_id == $item->id)
                            <div class="mb-3 mt-3" style="padding-left: 3%">
                                <b>{{ $data->name }}</b>
                                <p>{{ $data->reply }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
            <div style="display: none;" class="replyDiv">
                <form action="{{ route('add_reply') }}" method="post">
                    @csrf
                    <input type="hidden" id="commentId" name="commentId">
                    <textarea name="reply" style="height: 100px; width: 500px;"
                              placeholder="write something hera"></textarea> <br>
                    <button type="submit" class="btn btn-primary">Reply</button>
                    {{--                <a href="javascript::void(0)" class="btn btn-primary"></a>--}}
                    <a href="javascript::void(0)" class="btn" onclick="reply_close(this)">Close</a>
                </form>
            </div>
        </div>
        <!-- end Comments -->


        <script type="text/javascript">
            function reply(caller) {
                document.getElementById('commentId').value = $(caller).attr('data-CommentId');
                $('.replyDiv').insertAfter($(caller));
                $('.replyDiv').show();
            }

            function reply_close(caller) {
                $('.replyDiv').hide();
            }
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function (event) {
                var scrollpos = localStorage.getItem("scrollpos");
                if (scrollpos) window.scrollTo(0, scrollpos)
            })
            window.onbeforeunload = function (e) {
                localStorage.setItem("scrollpos", window.scrollY);
            }
        </script>
@endsection
