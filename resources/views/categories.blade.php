@extends('layouts.app')

@section('content')

<div class="container bg-container">
    <div class="p-15">
        <h3 class="bread_crumbs"><a href="#">Home</a>/<a href="#">All Brands</a>/<a href="#">Apple</a>/<a href="#">iPhones</a></h3>
    </div>
</div>

<div class="container products_phones float-left">
    <div class="category-card">
        <a href="#">
            <h1>Product Name</h1>
            <img class="category-image" src="img/4p.png" alt="">
        </a>
    </div>
    <div class="category-card">
        <a href="#">
            <h1>Product Name</h1>
            <img class="category-image" src="img/4p.png" alt="">
        </a>
    </div>
    <div class="category-card">
        <a href="#">
            <h1>Product Name</h1>
            <img class="category-image" src="img/4p.png" alt="">
        </a>
    </div>
    <div class="category-card">
        <a href="#">
            <h1>Product Name</h1>
            <img class="category-image" src="img/4p.png" alt="">
        </a>
    </div>

</div>

<?php 
    require_once('footer.php');
?>

@endsection