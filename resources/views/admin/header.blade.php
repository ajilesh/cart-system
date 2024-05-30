@extends('admin.adminapp')
<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">WebSiteName</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Products</a></li>
        <li><a href="{{ route('admin.cart.index') }}">Cart</a></li>
        <li><a href="{{ route('admin.currency.index') }}">Curreny</a></li>
      </ul>
      

      
    </div>
  </nav>