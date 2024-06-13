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
                            <h6 class="card-title">ایجاد ویدئو</h6>
                            <form wire:submit="createRow" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">عنوان ویدئو</label>
                                    <div class="col-sm-10">
                                        <input type="text" wire:model="title" class="form-control text-left" dir="rtl">
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="file"> آپلود ویدئو</label>
                                    <div class="col-sm-10"
                                         x-data="{ uploading: false, progress: 0 }"
                                         x-on:livewire-upload-start="uploading = true"
                                         x-on:livewire-upload-finish="uploading = false"
                                         x-on:livewire-upload-cancel="uploading = false"
                                         x-on:livewire-upload-error="uploading = false"
                                         x-on:livewire-upload-progress="progress = $event.detail.progress"
                                    >
                                        <input wire:model="video" class="col-sm-10 form-control-file" type="file"
                                               id="file">
                                        @error('video')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div x-show="uploading">

                                            <div class="progress m-b-10">
                                                <div class="progress-bar" x-text="`${progress}%`" role="progressbar" x-bind:style="`width: ${progress}%`" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
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

