@extends('laravel-usp-theme::master')

{{-- Blocos do laravel-usp-theme --}}
{{-- Ative ou desative cada bloco --}}

{{-- Target:card-header; class:card-header-sticky --}}
@include('laravel-usp-theme::blocos.sticky')

{{-- Target: button, a; class: btn-spinner, spinner --}}
@include('laravel-usp-theme::blocos.spinner')

{{-- Target: table; class: datatable-simples --}}
@include('laravel-usp-theme::blocos.datatable-simples')

{{-- Fim de blocos do laravel-usp-theme --}}

@section('title')
  @parent
@endsection

@section('styles')
  @parent
  <style>
    .tdbotao{
        text-align: center;
    }
  </style>
@endsection

@section('javascripts_bottom')
  @parent
  <script>
    // Seu código .js
    function load(){
        var mask = new FieldMask("####-####");
        mask2.backwards = false;
        mask2.setMaskFor(document.formao.ramaln);
    }
  </script>
@endsection
