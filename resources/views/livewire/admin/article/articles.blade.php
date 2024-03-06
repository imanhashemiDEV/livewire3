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
                                    <a class="btn btn-outline-info" href="{{route('edit.article',$article->id)}}">
                                        ویرایش
                                    </a>
                                </td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-outline-danger" wire:click="deleteArticle({{$article->id}})">
                                        حذف1
                                    </a>
                                    <a class="btn btn-outline-danger" wire:click="$dispatch('article-delete', { article_id: {{$article->id}} })">
                                        حذف2
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
    <script>

        document.addEventListener('livewire:init', () => {
            Livewire.on('article-delete', (event) => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('article-destroy',{article_id:event.article_id})
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });

            });


        });


    </script>
@endpush


