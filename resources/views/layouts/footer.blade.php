<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>&copy; {{ date('Y') }}</p>
        <p>New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/4.6/getting-started/introduction/">getting started guide</a>.</p>

        @isset($rubrics)
            <ul>
                @foreach($rubrics as $rubric)
                    <li><a href="#">{{ $rubric->title }}</a></li>
                @endforeach
            </ul>
        @endisset
    </div>
</footer>
