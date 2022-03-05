@extends('layouts.app')

@section('content')
@if(Auth::user())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">ADMINISTRAR TAREAS</div>

                <div class="card-body">
                  <tareas></tareas>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
