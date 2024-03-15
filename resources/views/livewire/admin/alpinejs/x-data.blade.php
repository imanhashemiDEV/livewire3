<main class="main-content">
    <div class="card">
        {{--        <div class="card-body"--}}
        {{--             x-data="{--}}
        {{--                   name:'my name is <b> ali </b>',--}}
        {{--                   age:35,--}}
        {{--                   setName(){--}}
        {{--                      this.age = 45--}}
        {{--                   }--}}
        {{--        }">--}}
        <div class="card-body" x-data="firstData">

            <h1 x-text="name"></h1>
            <br>
            <h3 x-text="age"></h3>



        </div>
    </div>
</main>
@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('firstData', () => ({
                name:'ahmad',
                age:40
            }))
        })
    </script>
@endpush

