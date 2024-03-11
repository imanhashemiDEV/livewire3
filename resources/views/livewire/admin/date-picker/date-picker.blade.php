<main class="main-content">
    <div class="card">
        <div class="card-body">
            <div class="table overflow-auto" tabindex="8">


                <div class="my-5">
                    @if(session()->has('message'))
                        <div class="alert alert-info">
                            {{session('message')}}
                        </div>
                    @endif
                    <h5 class="mb-3">انتخاب تاریخ</h5>
                    <form>
                        <div class="row">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> تاریخ انقضای کد تخفیف </label>
                                <div class="col-sm-10">
                                    <input type="text" id="expiration_date" class="text-left form-control" dir="rtl"
                                           wire:model.defer="expiration_date">
                                </div>
                                <div>
                                    @error('expiration_date') <p class="alert alert-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <button type="submit" class="btn btn-success btn-uppercase">
                                    <i class="ti-check-box m-r-5"></i> ذخیره
                                </button>
                            </div>
                        </div>
                    </form>
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


