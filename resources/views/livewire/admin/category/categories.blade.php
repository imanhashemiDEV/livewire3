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

                <div class="my-5">
                    @if(session()->has('message'))
                        <div class="alert alert-info">
                            {{session('message')}}
                        </div>
                    @endif
                    <h5 class="mb-3">ایجاد دسته بندی</h5>
                    <form>
                        <div class="row">
                            <div class="col-4 mt-1">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">عنوان دسته بندی</label>
                                    <div class="col-sm-9">
                                        <input type="text" wire:model="title" class="form-control text-left" dir="rtl">
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 mt-1">
                                    <div class="col-3 d-flex align-center">
                                        <a class="btn btn-success text-white" wire:click="createCategory">
                                            ایجاد دسته بندی
                                        </a>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center align-middle text-primary">ردیف</th>
                            <th class="text-center align-middle text-primary"> عنوان</th>
                            <th class="text-center align-middle text-primary">ویرایش در کامپوننت</th>
                            <th class="text-center align-middle text-primary">ویرایش</th>
                            <th class="text-center align-middle text-primary">حذف</th>
                            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $index=>$category)
                            <tr>
                                <td class="text-center align-middle">{{$categories->firstItem()+$index}}</td>
                                <td class="text-center align-middle">
                                        {{$category->title}}
                                </td>
                                <td class="text-center align-middle">
                                        <a class="btn btn-outline-info" href="#" data-toggle="modal" data-target="#modal-category-edit2" wire:click="$dispatch('editCategory',{id: {{$category->id}} })">
                                            ویرایش در کامپوننت دیگر
                                        </a>
                                </td>
                                <td class="text-center align-middle">

                                    <a class="btn btn-outline-info" href="#" data-toggle="modal" data-target="#modal-category-edit" wire:click="editCategory({{$category->id}})">
                                        ویرایش
                                    </a>
                                </td>
                                <td class="text-center align-middle">
                                    @if($selectedCategoryIndex==$category->id)
                                        <a class="btn btn-outline-info" href="#" wire:click="updateRow({{$category->id}})">
                                            ذخیره خطی
                                        </a>
                                    @else
                                        <a class="btn btn-outline-info" href="#" wire:click="editRow({{$category->id}})">
                                            ویرایش خطی
                                        </a>
                                    @endif


                                </td>
                                <td class="text-center align-middle">
                                        <a class="btn btn-outline-danger">
                                            حذف
                                        </a>
                                </td>
                                <td class="text-center align-middle">{{$category->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="margin: 40px !important;"
                         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                        {{$categories->links()}}
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="modal fade" id="modal-category-edit" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">عنوان مودال</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="بستن">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" wire:model="category_title"  class="form-control text-left" dir="rtl">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    <button type="button" class="btn btn-primary" wire:click="updateCategory">ذخیره تغییرات</button>
                </div>
            </div>
        </div>
    </div>

    <livewire:admin.category.edit-category-modal/>

</main>

@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('closeCategoryModal', (event) => {
                $('#modal-category-edit').modal('toggle')
            });
        });
    </script>
@endpush

