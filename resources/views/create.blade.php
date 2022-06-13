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
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" name="title"
                    value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3" placeholder="Content" name="content">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @isset($rubrics)
                    <div class="form-group">
                        <label for="rubric_id">Rubric</label>
                        <select class="form-control @error('rubric_id') is-invalid @enderror" id="rubric_id" name="rubric_id">
                            <option>Select rubric</option>
                            @foreach($rubrics as $k => $v)
                                <option value="{{ $k }}"
                                @if(old('rubric_id') == $k) selected @endif>{{ $v }}</option>
                            @endforeach
                        </select>
                        @error('rubric_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endisset

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // alert(222);
    </script>
@endsection
