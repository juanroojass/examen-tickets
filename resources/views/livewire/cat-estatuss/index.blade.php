@extends('layouts.app')
@section('content')
<!-- <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script> -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('cat-estatuss')
        </div>     
    </div>   
</div>
@endsection