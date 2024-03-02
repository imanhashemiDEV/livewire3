<main class="main-content">
    <div class="card">
        <div class="card-body">
            <div class="table overflow-auto" tabindex="8">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control text-left" dir="rtl" wire:model.live="search">
                    </div>
                </div>
                <div>
                    @if(session()->has('message'))
                        <div class="alert alert-info">
                            {{session('message')}}
                        </div>
                    @endif
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center align-middle text-primary">ردیف</th>
                            <th class="text-center align-middle text-primary">عنوان مقاله</th>
                            <th class="text-center align-middle text-primary">دسته بندی</th>
                            <th class="text-center align-middle text-primary">ویرایش</th>
                            <th class="text-center align-middle text-primary">حذف</th>
                            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $index=>$article)
                            <tr>
                                <td class="text-center align-middle">{{$articles->firstItem()+$index}}</td>
                                <td class="text-center align-middle">{{$article->title}}</td>
                                <td class="text-center align-middle">{{$article->category->title}}</td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-outline-info" href="#">
                                        ویرایش
                                    </a>
                                </td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-outline-danger">
                                        حذف
                                    </a>
                                </td>
                                <td class="text-center align-middle">{{$article->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="margin: 40px !important;"
                         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                        {{$articles->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@push('scripts')

@endpush


