@extends('core::public.master')

@section('title', $model->title . ' – ' . trans('news::global.name') . ' – ' . $websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbAbsoluteSrc())
@section('bodyClass', 'body-event body-event-' . $model->id)

@section('main')

    @include('core::public._btn-prev-next', ['module' => 'Events', 'model' => $model])
    <article>
        <h1>{{ $model->title }}</h1>
        {!! $model->present()->thumb(null, 200) !!}
        <div class="date">{!! $model->present()->dateFromTo !!} <br>{!! $model->present()->timeFromTo !!}</div>
        <p class="summary">{{ nl2br($model->summary) }}</p>
        <a class="btn btn-default btn-xs" href="{{ route($lang.'.events.slug.ics', $model->slug) }}">
            <span class="fa fa-calendar"></span> @lang('db.Add to calendar')
        </a>
        <div class="body">{!! $model->body !!}</div>
    </article>

@stop
