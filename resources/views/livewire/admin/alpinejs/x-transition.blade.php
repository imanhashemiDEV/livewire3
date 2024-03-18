<main class="main-content">
    <div class="card">
        <div class="card-body" x-data="{
        show:true
        }">


            <div x-show="show" style="height: 100px; width: 100px; background-color: red" x-transition.scale.80>
            </div>

            <button @click="show = !show ">show/hide</button>

        </div>
    </div>
</main>
