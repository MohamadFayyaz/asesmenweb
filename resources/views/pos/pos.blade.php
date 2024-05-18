@extends('pos.template_pos')
@section('content')
    <!-- Modal Charge-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Charge</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <h3 class="text-center">Total Charge : Rp <span id="pay_charge"></span></h3>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pay"> Uang Pembeli </label>
                        <input type="text" class="form-control" name="pay" id="pay"
                            placeholder="Masukan Uang Pembeli . . . " required autocomplete="off">
                    </div>
                    <div class="form-group mb-3">
                        <h5 class="text-danger">Kembalian: Rp <span id="kembali">0</span></h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="savebill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Notifikasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">saved</h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <div class="row g-0 text-center p-4">
        <div class="col-sm-6 col-md-8">
            <div class="row">
                @foreach ($menus as $menu)
                    <div class="card my-2 mx-3"
                        onclick='addToCart("{{ $menu->id }}", "{{ $menu->name }}", {{ $menu->price }})'
                        style="width: 17rem; padding: 0;cursor: pointer;">
                        <div class="overflow-hidden">
                            <img width="300px" height="200px" src='{{ url("public/menu-images/$menu->image") }}'
                                style="object-fit: cover;" alt="thumbnail for {{ $menu->name }}">
                        </div>
                        <h3 class="card-text">{{ $menu->name }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card">
                <div class="card-header" style="background-color: #e3e6f3">
                    <div class="float-start">
                        <i class="fa fa-user-circle" style="font-size: 35px"></i>
                        <br>
                        Customer
                    </div>
                    <div class="float-end">
                        <i class="fas fa-list" style="font-size: 35px"></i>
                        <br>
                        Billing List
                    </div>
                    <div class="mt-2">
                        <h1 style="font-weight: bold;">New Customer</h1>
                    </div>
                </div>
                <div class="card-body" id="section-to-print">
                    <table class="table table-hover">
                        <tr>
                            <td class="text-center">
                                <h3>Dine In <i class="text-primary fas fa-chevron-down" style="font-size: 20px;"></i></h3>
                            </td>
                        </tr>
                    </table>
                    <table class="table" style="border: 0px solid #fff;" id="bill">
                        <tr>
                            <td width="40%" align="left">1.</td>
                            <td width="20%"></td>
                            <td width="40%" align="right">View Table</td>
                        </tr>
                        <tbody id="list-menu">

                        </tbody>
                        <tr>
                            <td width="50%" align="left">Sub Total :</td>
                            <td width="20%" align="right"> </td>
                            <td width="30%" align="right" id="subtotal">0</td>
                        </tr>
                        <tr>
                            <td width="50%" align="left">Total :</td>
                            <td width="20%" align="right"> </td>
                            <td width="30%" align="right" id="total">0</td>
                        </tr>
                    </table>
                </div>
                <table class="table table-hover" style="border-top: 1px solid #e3e6f3;font-size: 20px">
                    <tr>
                        <td class="text-center">
                            <button class="btn bg-white btn-light text-danger border-0" onclick="location.reload()">Clear
                                Sale</button>
                        </td>
                    </tr>
                </table>
                <div class="card-footer m-0 p-0">
                    <div>
                        <button type="button" class="btn border-0 me-1 btn-secondary text-dark btn-lg float-start"
                            style="border-radius: 0; width: 49%; background-color: #e3e6f3;" data-bs-toggle="modal"
                            data-bs-target="#savebill">Save Bill</button>
                        <button type="button" class="btn border-0  btn-secondary text-dark btn-lg float-end"
                            style="border-radius: 0; width: 50%; background-color: #e3e6f3" id="print">Print
                            Bill</button>
                    </div>
                    <div style="height: 75px">
                        <button type="button" class="btn border-0 btn-primary text-white btn-lg float-start"
                            style="border-radius: 0;width: 13%;">
                            <i class="fas fa-money-bill-wave-alt float-start ms-1" style="font-size: 30px;"></i>
                            <br>
                            Sale
                        </button>
                        <button type="button" class="btn border-0 text-white btn-primary btn-lg float-end"
                            style="border-radius: 0;width: 86%; height: 100%;" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Charge Rp <span id="charge">0</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var subtotal_price = 0;
        var total_price = 0;

        function addToCart(id, name, price) {
            const element = document.getElementById("list-menu");
            const element_total = document.getElementById("total");
            const element_subtotal = document.getElementById("subtotal");
            const element_charge = document.getElementById("charge");
            const element_pay_charge = document.getElementById("pay_charge");

            const found = sessionStorage.getItem(`${id}`);

            if (found == null) {
                sessionStorage.setItem(`${id}`, '1');
                element.innerHTML += ` <tr>
                            <td width="50%" align="left">${name}</td>
                            <td width="20%" align="right"id="${id}"></td>
                            <td width="30%" align="right" id="price-${id}">Rp ${formatRupiah(String(price))}</td>
                        </tr>`;
                subtotal_price += price;
                total_price += price;
                element_subtotal.innerHTML = formatRupiah(String(subtotal_price));
                element_total.innerHTML = formatRupiah(String(total_price));
                element_charge.innerHTML = formatRupiah(String(total_price));
                element_pay_charge.innerHTML = formatRupiah(String(total_price));
            } else {
                const qty = document.getElementById(`${id}`);
                const element_price = document.getElementById(`price-${id}`);
                const found = sessionStorage.getItem(`${id}`);
                var new_qty = parseInt(found) + 1;
                var new_price = new_qty * price;
                sessionStorage.setItem(`${id}`, new_qty);
                qty.innerHTML = `x${new_qty}`;
                element_price.innerHTML = `Rp ${formatRupiah(String(new_price))}`;
                subtotal_price += price;
                total_price += price;
                element_subtotal.innerHTML = formatRupiah(String(subtotal_price));
                element_total.innerHTML = formatRupiah(String(total_price));;
                element_charge.innerHTML = formatRupiah(String(total_price));;
                element_pay_charge.innerHTML = formatRupiah(String(total_price));;
            }
            // console.log(found);
        }

        window.onload = function() {
            sessionStorage.clear();
        }

        var btnPrint = document.getElementById("print");
        btnPrint.onclick = function() {
            var prtContent = document.getElementById("bill");
            window.print()
        }

        let rupiah = document.getElementById('pay');
        let kembali = document.getElementById('kembali');
        rupiah.addEventListener('keyup', function(e) {
            // gunakan fungsi formatRupiah() untuk mengubah nominal angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value);
            let formatKembali = kembalian(rupiah.value, total_price);
            if (formatKembali > 0) {
                formatKembali = formatRupiah(String(formatKembali));
                kembali.innerHTML = formatKembali;
            } else {
                kembali.innerHTML = '0';
            }
        });

        function kembalian(angka, total) {
            let harga = angka.split(".");
            let bayar = '';
            for (let indeks = 0; indeks < harga.length; indeks++) {
                bayar += harga[indeks];
                // console.log(harga[indeks]);
            }
            totalKembali = bayar - total;
            return totalKembali;
        }

        /* Fungsi formatRupiah */
        function formatRupiah(angka) {
            let number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        }
    </script>
@endsection
