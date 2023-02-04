<div style="text-align: center; padding-bottom: 30px;">
    <p style="font-size: 30px; text-align: center; padding-top: 20px; padding-bottom: 20px;">Комментарии</p>
    <form action="{{ route('add_comment') }}" method="post">
        @csrf
        <textarea name="comment" style="height: 150px; width: 600px;"
                  placeholder="Прокомментируйте что-нибудь здесь"></textarea>
        <input type="submit" class="btn btn-primary" value="Комментарий">
    </form>
</div>


<div style="padding-left: 20%">
    <p style="font-size: 30px; padding-bottom: 20px;">Все комментарии</p>

    @foreach($comments as $item)
        <div class="mb-5">
            <b>{{ $item->name }}</b>
            <p>{{ $item->comment }}</p>
            <a href="javascript::void(0)" onclick="reply(this)" data-CommentId="{{ $item->id }}">Отвечать</a>
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
                      placeholder="напишите что-нибудь здесь"></textarea> <br>
            <button type="submit" class="btn btn-primary">Отвечать</button>
            {{--                <a href="javascript::void(0)" class="btn btn-primary"></a>--}}
            <a href="javascript::void(0)" class="btn" onclick="reply_close(this)">Закрывать</a>
        </form>
    </div>
</div>
