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
                            <h6 class="card-title">ویرایش مقاله</h6>
                            <h6 class="card-title">آیدی مقاله {{$id}}  </h6>
                            <input type="text" wire:model.live="id">
                            <div class="col-8 offset-4 mb-4">
                                <img src="{{url('photos/articles',$article->image)}}" alt="">
                            </div>
                            <form wire:submit="updateArticle" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">عنوان مقاله</label>
                                    <div class="col-sm-10">
                                        <input type="text" wire:model="title" class="form-control text-left" dir="rtl">
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">دسته بندی</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" wire:model="category_id">
                                            <option>دسته بندی را انتخاب کنید</option>
                                            @foreach($categories as $key => $value)
                                                <option value="{{$key}}"> {{$value}} </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">متن مقاله</label>
                                    <div class="col-sm-10" wire:ignore>
                                        <textarea type="text" class="form-control text-left" id="editorArticle" dir="rtl"
                                                  wire:model="body" cols="30" rows="10"></textarea>

                                    </div>
                                    <div class="col-sm-10 offset-2" >
                                        @error('body')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="file"> آپلود عکس</label>
                                    <div class="col-sm-10">
                                        <input wire:model="image" class="col-sm-10 form-control-file" type="file"
                                               id="file">
                                        @error('image')
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
@push('scripts')
    <script>
        $(document).ready(function () {

            //Define an adapter to upload the files
            class MyUploadAdapter {
                constructor(loader) {
                    // The file loader instance to use during the upload. It sounds scary but do not
                    // worry — the loader will be passed into the adapter later on in this guide.
                    this.loader = loader;

                    // URL where to send files.
                    this.url = '{{ route('ckeditor.upload') }}';
                }

                // Starts the upload process.
                upload() {
                    return this.loader.file.then(
                        (file) =>
                            new Promise((resolve, reject) => {
                                this._initRequest();
                                this._initListeners(resolve, reject, file);
                                this._sendRequest(file);
                            })
                    );
                }

                // Aborts the upload process.
                abort() {
                    if (this.xhr) {
                        this.xhr.abort();
                    }
                }

                // Initializes the XMLHttpRequest object using the URL passed to the constructor.
                _initRequest() {
                    const xhr = (this.xhr = new XMLHttpRequest());
                    // Note that your request may look different. It is up to you and your editor
                    // integration to choose the right communication channel. This example uses
                    // a POST request with JSON as a data structure but your configuration
                    // could be different.
                    // xhr.open('POST', this.url, true);
                    xhr.open("POST", this.url, true);
                    xhr.setRequestHeader("x-csrf-token", "{{ csrf_token() }}");
                    xhr.responseType = "json";
                }

                // Initializes XMLHttpRequest listeners.
                _initListeners(resolve, reject, file) {
                    const xhr = this.xhr;
                    const loader = this.loader;
                    const genericErrorText = `Couldn't upload file: ${file.name}.`;
                    xhr.addEventListener("error", () => reject(genericErrorText));
                    xhr.addEventListener("abort", () => reject());
                    xhr.addEventListener("load", () => {
                        const response = xhr.response;
                        // This example assumes the XHR server's "response" object will come with
                        // an "error" which has its own "message" that can be passed to reject()
                        // in the upload promise.
                        //
                        // Your integration may handle upload errors in a different way so make sure
                        // it is done properly. The reject() function must be called when the upload fails.
                        if (!response || response.error) {
                            return reject(response && response.error ? response.error.message : genericErrorText);
                        }
                        // If the upload is successful, resolve the upload promise with an object containing
                        // at least the "default" URL, pointing to the image on the server.
                        // This URL will be used to display the image in the content. Learn more in the
                        // UploadAdapter#upload documentation.
                        resolve({
                            default: response.url,
                        });
                    });
                    // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                    // properties which are used e.g. to display the upload progress bar in the editor
                    // user interface.
                    if (xhr.upload) {
                        xhr.upload.addEventListener("progress", (evt) => {
                            if (evt.lengthComputable) {
                                loader.uploadTotal = evt.total;
                                loader.uploaded = evt.loaded;
                            }
                        });
                    }
                }

                // Prepares the data and sends the request.
                _sendRequest(file) {
                    // Prepare the form data.
                    const data = new FormData();
                    data.append("upload", file);
                    // Important note: This is the right place to implement security mechanisms
                    // like authentication and CSRF protection. For instance, you can use
                    // XMLHttpRequest.setRequestHeader() to set the request headers containing
                    // the CSRF token generated earlier by your application.
                    // Send the request.
                    this.xhr.send(data);
                }

            }

            function SimpleUploadAdapterPlugin(editor) {
                editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
                    // Configure the URL to the upload script in your back-end here!
                    return new MyUploadAdapter(loader);
                };
            }

            ClassicEditor
                .create(document.querySelector('#editorArticle'), {
                    extraPlugins: [SimpleUploadAdapterPlugin],
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            '|',
                            'fontSize',
                            'fontColor',
                            '|',
                            'imageUpload',
                            'blockQuote',
                            'insertTable',
                            'undo',
                            'redo',
                            'codeBlock'
                        ]
                    },
                    language: {
                        ui: 'fa',
                        content: 'fa'
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells'
                        ]
                    },

                })
                .then(editor => {
                    editor.model.document.on('change:data',()=>{
                        Livewire.dispatch('setBody', { body: editor.getData() })
                    })
                })
                .catch(error => {
                    console.error(error.stack);
                });

        });
    </script>
@endpush



