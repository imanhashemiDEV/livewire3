<main class="main-content">
    <div class="card">
        <div class="card-body"  x-data="{ name: 'ali' }" x-effect="console.log(name)">

             <p x-text="name"></p>
            <button @click="name='iman'"> change name</button>
            <button @click="console.log('no change')"> no change name</button>

        </div>
    </div>
</main>
