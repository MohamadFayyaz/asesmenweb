@extends('menu.template_menu')
@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height" style="padding-bottom: 15px;">
                <div class="card-header">
                    <h3 class="card-title">Tambah Menu</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('menu/add/process') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="name"> Nama Menu </label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Masukan Nama . . . " value="{{ old('name') }}" required
                                    autocomplete="off">
                            </div>
                            <div class="form-group mb-3">
                                <label for="price"> Harga Menu </label>
                                <input type="number" class="form-control" name="price" id="price"
                                    placeholder="Masukan Harga Menu . . . " value="{{ old('price') }}" required
                                    autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label">Gambar</label>
                                <img id="addImage" class="img-preview mb-3 img-fluid">
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    name="image" id="image" onchange="previewImage()" accept=".jpg, .jpeg, .png"
                                    required>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="<?= url('menu') ?>">
                        <button type="button" class="btn btn-danger float-start">Kembali</button>
                    </a>
                    <button type="submit" class="btn btn-primary float-end">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('#addImage');

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
