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
                            <h6 class="card-title">ایجاد آگهی</h6>
                            <form wire:submit="createAdv1" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">عنوان آگهی</label>
                                    <div class="col-sm-10">
                                        <input type="text" wire:model="title" class="form-control text-left" dir="rtl">
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-2 col-form-label" for="file"> آپلود عکس</label>--}}
{{--                                    <div class="col-sm-10">--}}
{{--                                        @for($i=0; $i<$loop;$i++)--}}
{{--                                            <input wire:model="images" class="col-sm-10 form-control-file" type="file"--}}
{{--                                                   id="file">--}}
{{--                                        @endfor--}}
{{--                                            <i class="fa fa-2x fa-plus" wire:click="addLoop"></i>--}}
{{--                                        @error('images')--}}
{{--                                        <span class="text-danger">{{ $message }}</span>--}}
{{--                                        @enderror--}}
{{--                                            @if($images)--}}
{{--                                                @foreach($images as $key=>$image)--}}
{{--                                                    <div wire:key="{{$key}}" style="height: 50px; width: 50px;">--}}
{{--                                                        <img style="height: 50px; width: 50px;" src="{{$image->temporaryUrl()}}" alt="">--}}
{{--                                                    </div>--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="file"> آپلود عکس</label>
                                    <div class="col-sm-10">
                                            <input multiple wire:model="images" class="col-sm-10 form-control-file" type="file" id="file">
                                        @error('images')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
        </div>
    </div>
</main>


