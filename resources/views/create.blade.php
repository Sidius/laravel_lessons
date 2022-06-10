@extends('layouts.layout')

@section('title') @parent:: {{ $title ?? null }} @endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">

            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                    value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" rows="3" placeholder="Content" name="content">{{ old('content') }}</textarea>
                </div>
                @isset($rubrics)
                    <div class="form-group">
                        <label for="rubric_id">Rubric</label>
                        <select class="form-control" id="rubric_id" name="rubric_id">
                            <option>Select rubric</option>
                            @foreach($rubrics as $k => $v)
                                <option value="{{ $k }}"
                                @if(old('rubric_id') == $k) selected @endif>{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                @endisset

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
