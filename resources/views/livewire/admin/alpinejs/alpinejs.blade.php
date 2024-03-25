<main class="main-content">
    <div class="card">
        <div class="card-body">

            {{now()}}

            <h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message"></h1>

            <p x-text="$wire.name"></p>

            <button x-on:click="$wire.name='ali'">change name to ali</button>
            <button x-on:click="$wire.changeName()">change name by method</button>
            <button x-on:click="$wire.$refresh()">refresh</button>

        </div>
    </div>
</main>


