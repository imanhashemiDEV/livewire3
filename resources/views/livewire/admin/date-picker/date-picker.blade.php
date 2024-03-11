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
                        <form wire:submit="getDate">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"> تاریخ  </label>
                                <div class="col-sm-10">
                                    <input type="text" id="date" class="text-left form-control" dir="rtl"
                                           wire:model="date">
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
                        </form>
                </div>


            </div>

        </div>
    </div>
</main>

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#date").persianDatepicker({
                observer: true,
                initialValueType: 'persian',
                format: 'YYYY/MM/DD',
                initialValue: true,
                autoClose: true,
                onSelect: function(unix){
                    @this.set('date', new persianDate(unix).format('YYYY/MM/DD'), true);
                }
            });
        });
    </script>
@endpush


