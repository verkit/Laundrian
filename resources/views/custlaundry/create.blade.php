@extends('layouts.master')
@section('content')
<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid mt-3" id="app">
            <div class="col-lg-10 col-xl-10 col-md-10">
                <h3 class="text-dark mb-4">Ngelaundry</h3>
                <form method="POST" action="{{route('laundriin.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="member_id">Id member</label>
                        <input type="text" class="form-control @error('member_id') is-invalid @enderror" id="member_id"
                            name="member_id" value="{{old('member_id')}}">
                        @error('member_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="package_id">Laundry</label>
                        <select name="package_id" id="package_id" 
                            class="form-control @error('package_id') is-invalid @enderror">
                            <option selected value="">Pilih</option>
                            @foreach ($packages as $package)
                            <option id="package_id" value="{{$package->id}}">
                                {{$package->nama_paket}} ({{$package->types->type}})
                            </option>
                            @endforeach
                        </select>
                        @error('package_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pcs">Pcs / Kilo</label>
                        <input type="number" class="form-control @error('pcs') is-invalid @enderror" id="pcs" name="pcs"
                            value="{{old('pcs')}}" v-model="pcs">
                        @error('pcs')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection