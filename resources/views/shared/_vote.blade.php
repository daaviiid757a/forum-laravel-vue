@if ($model instanceof App\Question)
    @php
        $name = 'question';
        $firstURISegment = 'questions';
    @endphp
@elseif ($model instanceof App\Answer)
    @php
        $name = 'answer';
        $firstURISegment = 'answers';
    @endphp
@endif

@php
    $formId = $name . "-" . $model->id;
    $formAction = "/{$firstURISegment}/{$model->id}/vote";
@endphp
<div class="d-flex flex-column vote-controls">
    <a title="This {{$name}} is useful" class="vote-up {{ Auth::guest() ? 'off' : '' }}" onclick="event.preventDefault(); document.getElementById('up-vote-{{$formId}}').submit();">
        <i class="fas fa-caret-up fa-3x"></i>
    </a>

    <form action="{{ $formAction }}" id="up-vote-{{$formId}}" method="POST" style="display:none;">
        @csrf

        <input type="hidden" name="vote" value="1">
    </form>

    <span class="vote-count">{{ $model->votes_count }}</span>

    <a title="This {{$name}} is not useful" class="vote-down {{ Auth::guest() ? 'off' : '' }}" onclick="event.preventDefault(); document.getElementById('down-vote-{{$formId}}').submit();">
        <i class="fas fa-caret-down fa-3x"></i>
    </a>

    <form action="{{ $formAction }}" id="down-vote-{{$formId}}" method="POST" style="display:none;">
        @csrf

        <input type="hidden" name="vote" value="-1">
    </form>

    @if ($model instanceof App\Question)
    <favorite :question="{{ $model }}"></favorite>
    @elseif($model instanceof App\Answer)
    <accept :answer="{{ $model }}"></accept>
    @endif
</div>
{{--
@if ($model instanceof App\Question)
    @php
        $name = 'question';
        $firstURISegment = 'questions';
    @endphp
@elseif ($model instanceof App\Answer)
    @php
        $name = 'answer';
        $firstURISegment = 'answers';
    @endphp
@endif

@php
    $formId = $name . "-" . $model->id;
    $formAction = "/{$firstURISegment}/{$model->id}/vote";
@endphp
<div class="d-flex flex-column vote-controls">
    <a title="This {{$name}} is useful" class="vote-up {{ Auth::guest() ? 'off' : '' }}" onclick="event.preventDefault(); document.getElementById('up-vote-{{$formId}}').submit();">
        <i class="fas fa-caret-up fa-3x"></i>
    </a>

    <form action="{{ $formAction }}" id="up-vote-{{$formId}}" method="POST" style="display:none;">
        @csrf

        <input type="hidden" name="vote" value="1">
    </form>

    <span class="vote-count">{{ $model->votes_count }}</span>

    <a title="This {{$name}} is not useful" class="vote-down {{ Auth::guest() ? 'off' : '' }}" onclick="event.preventDefault(); document.getElementById('down-vote-{{$formId}}').submit();">
        <i class="fas fa-caret-down fa-3x"></i>
    </a>

    <form action="{{ $formAction }}" id="down-vote-{{$formId}}" method="POST" style="display:none;">
        @csrf

        <input type="hidden" name="vote" value="-1">
    </form>

    @if ($model instanceof App\Question)
        @include('shared._favorite', [
            'model' => $model
        ])
    @elseif($model instanceof App\Answer)
        @include('shared._accept', [
            'model' => $model
        ])
    @endif
</div> --}}

