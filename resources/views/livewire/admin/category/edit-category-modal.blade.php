<div class="modal fade" id="modal-category-edit2" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
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
@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('closeCategoryModal2', (event) => {
                $('#modal-category-edit2').modal('toggle')
            });
        });
    </script>
@endpush
