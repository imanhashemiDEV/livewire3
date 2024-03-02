<main class="main-content">
    <div class="card">
        <div class="card-body">
            <div class="table overflow-auto" tabindex="8">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-info">
                                {{session('message')}}
                            </div>
                        @endif
                        <div class="container">
                            <h6 class="card-title">ایجاد مقاله</h6>
                            <form enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">عنوان مقاله</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control text-left" dir="rtl">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">دسته بندی</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" class="form-control">
                                            @foreach($categories as $key => $value)
                                                <option value="{{$key}}"> {{$value}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">متن مقاله</label>
                                    <div class="col-sm-10">
                                <textarea type="text" class="form-control text-left" id="editor" dir="rtl"
                                           cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="file"> آپلود عکس</label>
                                    <input class="col-sm-10 form-control-file" type="file" id="file">
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
        </div>
    </div>
</main>
@push('scripts')
    @include('admin.layouts.ckeditorConfig')
@endpush


