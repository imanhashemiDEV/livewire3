<main class="main-content">
    <div class="card">
        <div class="card-body" x-data="{
          name:'',
          'check':[],
          select:''
        }">

            <input type="text" x-model="name">
            <p x-text="name"></p>

            <input type="checkbox" x-model="check" value="foo">
            <p x-text="check"></p>

            <select name="" id="" x-model="select">
                <option value="">choose</option>
                <option value="item1">item1</option>
                <option value="item2">item2</option>
                <option value="item3">item3</option>
            </select>
            <p x-text="select"></p>
        </div>
    </div>
</main>
