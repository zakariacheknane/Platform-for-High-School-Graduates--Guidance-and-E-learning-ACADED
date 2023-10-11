@foreach($comments as $comment)
    <div class="w3-container">
        <div style=""><h3>{{ $comment->user->name }} :</h3><br>
        <p class="p">{{ $comment->body }}</p></div>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <div style="float:left;width:700px;"><input type="text" name="comment_body" class="form-control" /></div>
                 <div class="form-group">
                <input type="submit" class="w3-btn w3-indigo w3-round" value="Repondre" />
            </div>
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
           
        </form> <hr>
        @include('partials._comment_replies', ['comments' => $comment->replies])
    </div>
   
@endforeach
<style>
    .p{
        font-family:verdana;
        font-size:12pt;
        margin-top:-20px;
    }
    </style>