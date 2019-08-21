@extends('layouts.app')

@section('header')
    @include('layouts.header')
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('content')
    <div id="ui-view">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            <strong>Normal</strong> Form
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nf-key">Key</label>
                                <input class="form-control" id="nf-key" type="text" name="nf-key"
                                       placeholder="Masukkan key anda">
                            </div>
                            <div class="form-group">
                                <label for="nf-password">Value</label>
                                <input class="form-control" id="nf-value" type="text" name="nf-value"
                                       placeholder="Masukkan value anda">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-pill btn-primary" type="submit">
                                Simpan
                            </button>
                            <button class="btn btn-pill btn-danger" type="reset">
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
      $(function() {
        console.log( "ready!" );
      });
    </script>
@endsection
