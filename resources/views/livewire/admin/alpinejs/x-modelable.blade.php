<main class="main-content">
    <div class="card">
        <div class="card-body" x-data="{ number: 5 }">
            <div x-data="{count:0}" x-modelable="count" x-model="number">
                <button @click="count++">Increment</button>
            </div>

            Number: <span x-text="number"></span>
        </div>
    </div>
</main>
