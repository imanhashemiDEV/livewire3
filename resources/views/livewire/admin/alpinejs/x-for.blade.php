<main class="main-content">
    <div class="card">
{{--        <div class="card-body" x-data="{ users : [--}}
{{--           {id:1, name:'iman'},--}}
{{--           {id:2, name:'ali'},--}}
{{--           {id:3, name:'reza'},--}}
{{--        ]}">--}}

{{--              <ul>--}}
{{--                  <template x-for="user in users">--}}
{{--                      <li x-text="user.name"></li>--}}
{{--                  </template>--}}

{{--              </ul>--}}

{{--        </div>--}}

        <div class="card-body" x-data="{ users : {{$users}}  }">

            <ul>
                <template x-for="user in users">
                    <li x-text="user.name"></li>
                </template>

            </ul>

        </div>
    </div>
</main>
