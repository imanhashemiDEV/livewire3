<main class="main-content">
    <div class="card">
{{--        <div class="card-body"--}}
{{--             x-data="{ post: {} }"--}}
{{--             x-init="post = await (await fetch('https://jsonplaceholder.typicode.com/posts/1')).json()"--}}
{{--        >--}}
{{--                <p x-text="post.title"></p>--}}
{{--        </div>--}}

{{--        <div class="card-body"--}}
{{--             x-data="firstData"--}}
{{--             x-init="$nextTick(() => {console.log('init')})"--}}
{{--        >--}}

{{--        </div>--}}

        <div class="card-body"
             x-data="console.log('x-data')"
             x-init="console.log('x-init')"
        >

        </div>
    </div>
</main>
@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('firstData', () => ({
                    init(){
                        console.log('init2')
                    }
            }))
        })
    </script>
@endpush
