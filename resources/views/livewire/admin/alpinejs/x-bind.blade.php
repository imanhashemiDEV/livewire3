<main class="main-content">
    <div class="card">
        <div class="card-body" x-data="{
        placeholder : 'enter your name',
        show:true
        }">

            <input type="text" x-bind:placeholder="placeholder">

{{--            <div  style="height: 100px; width: 100px;" x-bind:class=" show ? 'redBox' :'' "></div>--}}

            <div  style="height: 100px; width: 100px;" x-bind:style="{  backgroundColor: 'red'; }"></div>

        </div>
    </div>
</main>
