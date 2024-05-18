@extends('menu.template_menu')
@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height" style="padding-bottom: 15px;">
                <div class="card-header">
                    <h3 class="card-title">Edit Menu</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('menu/edit/process') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $menu->id }}">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="name"> Nama Menu </label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Masukan Nama . . . " value="{{ old('name') ?? $menu->name }}" required
                                    autocomplete="off">
                            </div>
                            <div class="form-group mb-3">
                                <label for="price"> Harga Menu </label>
                                <input type="number" class="form-control" name="price" id="price"
                                    placeholder="Masukan Harga Menu . . . " value="{{ old('price') ?? $menu->price }}"
                                    required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label">Gambar</label>
                                <br>
                                <img id="addImage"
                                    src='{{ url("/menu-images/$menu->image") }}'class="img-preview mb-3 img-fluid">
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    name="image" id="image" onchange="previewImage()" accept=".jpg, .jpeg, .png">
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
                    <button type="submit" class="btn btn-success float-end">Simpan</button>
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
