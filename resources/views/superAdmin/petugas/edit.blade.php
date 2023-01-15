@extends('layouts.dashboard_master')
@section('title')
    Halaman Edit Petugas
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Data Petugas</h5>
            <a href="{{ url()->previous() }}" class="btn btn-facebook">Kembali</a>
            <!-- General Form Elements -->
            <form>
                <fieldset disabled="">
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">ID Petugas</label>
                        <div class="col-sm-10">
                            <input type="disable" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Nama Petugas</label>
                        <div class="col-sm-10">
                            <input type="disable" class="form-control">
                        </div>
                    </div>
                </fieldset>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    {{-- <label class="col-sm-10 col-form-label"></label> --}}
                    <div class="col-sm-2 offset-2"><br>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>


            </form><!-- End General Form Elements -->

        </div>
    </div>
@endsection
