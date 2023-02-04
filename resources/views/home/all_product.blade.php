@extends('home.app')
@section('content')
    <div class="hero_area">
        <!-- header section strats -->
        @include("home.header")
        <!-- product section -->
        @include('home.product_view')
        <!-- end product section -->


        <!-- Comments -->
        @include('home.comment_view')
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

{{--        <script>--}}
{{--            document.addEventListener("DOMContentLoaded", function (event) {--}}
{{--                var scrollpos = localStorage.getItem("scrollpos");--}}
{{--                if (scrollpos) window.scrollTo(0, scrollpos)--}}
{{--            })--}}
{{--            window.onbeforeunload = function (e) {--}}
{{--                localStorage.setItem("scrollpos", window.scrollY);--}}
{{--            }--}}
{{--        </script>--}}
@endsection
