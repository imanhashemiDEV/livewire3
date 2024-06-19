<main class="main-content">
    <div class="card">
        <div class="card-body">
            <div class="mb-5">
                single checkbox
                <input type="checkbox" value="foo" wire:model.live="checkbox">
                @foreach($checkbox as $c)
                       {{$c}}
                @endforeach
{{--                <p>{{ var_export($checkbox) }}</p>--}}
{{--                <p>{{$checkText}}</p>--}}
            </div>
            <div class="mb-5">
                multicheckbox
                <input type="checkbox" value="item1" wire:model.live="multicheckbox">
                <input type="checkbox" value="item2" wire:model.live="multicheckbox">
                <input type="checkbox" value="item3" wire:model.live="multicheckbox">
                @foreach($multicheckbox as $multi)
                        {{$multi}}
                @endforeach
            </div>
            <div>
                <button class="btn btn-success" wire:click="CheckAll">checkAll in page {{$pageNumber}}</button>
            </div>
            <div class="table overflow-auto" tabindex="8">
                 @foreach($selectedUsers as $selected)
                        {{$selected}}
                 @endforeach
                <div>
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center align-middle text-primary">Box</th>
                            <th class="text-center align-middle text-primary">ردیف</th>
                            <th class="text-center align-middle text-primary">عکس</th>
                            <th class="text-center align-middle text-primary">نام و نام خانوادگی</th>
                            <th class="text-center align-middle text-primary">ایمیل</th>
                            <th class="text-center align-middle text-primary">موبایل</th>
                            <th class="text-center align-middle text-primary"> وضعیت</th>
                            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($this->users as $index=>$user)
                            <tr>
                                <td class="text-center align-middle" >
                                    <input type="checkbox" value="{{$user->id}}"
                                           wire:model.live="selectedUsers">
                                </td>
                                <td class="text-center align-middle">{{$this->users->firstItem()+$index}}</td>
                                <td class="text-center align-middle">
                                    <figure class="avatar avatar">
                                        <img src="{{url('photos/users/'.$user->image)}}" class="rounded-circle" alt="image">
                                    </figure>
                                </td>
                                <td class="text-center align-middle">{{$user->name}}</td>
                                <td class="text-center align-middle">{{$user->email}}</td>
                                <td class="text-center align-middle">{{$user->mobile}}</td>
                                <td class="text-center align-middle">
                                    <span class="cursor-pointer badge badge-success">فعال</span>
                                </td>
                                <td class="text-center align-middle">{{$user->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="margin: 40px !important;"
                         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                        {{$this->users->links()}}
                    </div>
                </div>

            </div>

        </div>
    </div>
</main>


