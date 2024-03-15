<main class="main-content">
    <div class="card">
        <div class="card-body" x-data="{
            name:'ali',
            changeName(){
              this.name= 'iman'
            }
        }">
            <h1 x-text="name"></h1>
            <button @dblclick="changeName">click</button>

        </div>
    </div>
</main>
