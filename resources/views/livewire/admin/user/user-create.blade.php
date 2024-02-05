<div class="my-5">
    @if(session()->has('message'))
        <div class="alert alert-info">
               {{session('message')}}
        </div>
    @endif
    <h5 class="mb-3">ایجاد کاربر</h5>
    <form>
        <div class="row">
            <div class="col-4 mt-1">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">نام و نام خانوادگی</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model="name" class="form-control text-left" dir="rtl">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-4 mt-1">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">ایمیل</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model="email" class="form-control text-left" dir="rtl" value="{{$name}}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-4 mt-1">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">موبایل</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model="mobile" class="form-control text-left" dir="rtl">
                        @error('mobile')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-4 mt-1">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">پسورد</label>
                    <div class="col-sm-9">
                        <input type="text" wire:model="password" class="form-control text-left" dir="rtl">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-4 mt-1">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="file"> آپلود عکس </label>
                    <input class="col-sm-7 form-control-file" type="file" id="file" wire:model="image">
                    @if($image)
                        <figure class="avatar avatar col-2">
                            <img src="{{$image->temporaryUrl()}}" class="rounded-circle" alt="image">
                        </figure>
                    @endif
                    <div wire:loading wire:target="image" class="spinner-border text-primary" role="status">
                        <span class="sr-only">در حال بارگذاری ...</span>
                    </div>
                </div>
            </div>
            <div class="col-4 mt-1">
                @if($editUserIndex===null)
                <div class="col-3 d-flex align-center">
                    <a class="btn btn-success text-white" wire:click="createUser">
                        ایجاد کاربر
                    </a>
                </div>
                @endif
            </div>
        </div>
    </form>
</div>
