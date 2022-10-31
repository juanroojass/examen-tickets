@extends('layouts.app')
@section('content')
<div>
    @livewire('calculator')
</div>
<hr>
<div>
    @livewire('cascading-dropdown')
</div>
<hr>
<div>
    @livewire('image-upload')
</div>

@endsection
@push('scripts')
<script>
    // console.log('test1X');
</script>
@endpush


