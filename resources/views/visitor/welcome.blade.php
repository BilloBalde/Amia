@extends('layouts.visitor.visitor')
@section('content')
    <main class="main">
        <!-- Hero Section -->
        @include('visitor.caroussel')
        <!-- /category Section -->
        @include('visitor.products')
        <!-- Projects Section -->
        {{-- @include('visitor.productsCategory') --}}
        <!-- Features Section -->
        @include('visitor.paysVente')
        <!-- Testimonials Section -->
        {{-- @include('visitor.testimonials') --}}
    </main>
@endsection

