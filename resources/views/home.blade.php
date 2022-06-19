@extends('layouts.layout')

@section('title') @parent:: {{ $title ?? null }} @endsection

@section('header')
    @parent
@endsection

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1>{{ $title ?? null }}</h1>
{{--            @php--}}
{{--               echo 1484848;--}}
{{--            @endphp--}}
{{--            {!! mb_strtoupper($hi ?? null) !!}--}}
{{--            @{{ title }}--}}
{{--            @verbatim--}}
{{--                {{ title }}--}}
{{--            @endverbatim--}}

            {{-- $title ?? null --}}

{{--            @isset($data_1)--}}
{{--                @if(count($data_1) > 20)--}}
{{--                    Count > 20--}}
{{--                @elseif(count($data_1) < 20)--}}
{{--                    Count < 20--}}
{{--                @else--}}
{{--                    Count = 20--}}
{{--                @endif--}}
{{--            @endisset--}}

{{--            @isset($data_2)--}}
{{--                Isset data_2--}}
{{--            @endisset--}}

{{--            @production--}}
{{--                <h1>PRODUCTION</h1>--}}
{{--            @endproduction--}}

{{--            @env('local')--}}
{{--                <h1>LOCAL</h1>--}}
{{--            @endenv--}}

{{--            @for($i = 0; $i < count($data_1); $i++)--}}
{{--                @if($data_1[$i] % 2 != 0)--}}
{{--                    @continue--}}
{{--                @elseif($data_1[$i] == 6 || $data_1[$i] == 8)--}}
{{--                    @continue--}}
{{--                @elseif($data_1[$i] == 16)--}}
{{--                    @break--}}
{{--                @endif--}}
{{--                {{ $data_1[$i] }}--}}
{{--            @endfor--}}

{{--            @foreach($data_2 as $k => $v)--}}
{{--                {{ $k }} => {{ $v }}--}}
{{--            @endforeach--}}
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            @isset($posts)
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text">{{ $post->content }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                            </div>
                                            <small class="text-muted">
                                                {{-- $post->created_at --}}
{{--                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d.m.Y') }}--}}
                                                {{ $post->getPostDate() }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <div class="col-md-12">
                        {{
                            $posts
                                //->appends(['test' => request()->test])
                                //->fragment('foo')
                                ->onEachSide(2)
                                //->links()
                                //->links('vendor.pagination.bootstrap-5')
                                ->links('vendor.pagination.my-pagination')
                        }}
                    </div>
                </div>
            @endisset
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // alert(111);
    </script>
@endsection
