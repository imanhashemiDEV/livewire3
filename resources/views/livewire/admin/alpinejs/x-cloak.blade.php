<main class="main-content">
    <div class="card">
        <div class="card-body" x-data="{
        show:false
        }">


            <div x-show="show" x-cloak style="height: 100px; width: 100px; background-color: red" >
            </div>

            <button @click="show = !show ">show/hide</button>

        </div>
    </div>
</main>
