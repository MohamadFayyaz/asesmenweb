@extends('menu.template_menu')
@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-title">
                        Data Menu
                        <a href="{{ url('menu/add') }}">
                            <button type="button" class="btn btn-primary float-end text-white btn-round">
                                <i class="fa fa-plus"></i>
                                Tambah Menu
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatables-default" class="display table table-striped table-hover" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $menu->name }}</td>
                                        <td>Rp. {{ number_format($menu->price, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <a href='<?= url("menu/edit/$menu->id") ?>' title="Edit"
                                                class="btn btn-success btn-sm text-white">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href='<?= url("menu/delete/$menu->id") ?>'
                                                onclick="return confirm('Apakah anda yakin hapus ?.')" title="Delete"
                                                class="btn btn-danger btn-sm text-white">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
