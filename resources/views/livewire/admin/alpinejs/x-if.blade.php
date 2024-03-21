<main class="main-content">
    <div class="card">
        <div class="card-body" x-data="{ show:true }">

             <template x-if="show">
                 <div  style="height: 100px; width: 100px; background-color: red">
                 </div>
             </template>


            <button @click="show = !show ">show/hide</button>

        </div>
    </div>
</main>
