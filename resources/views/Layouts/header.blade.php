@extends('Layouts.webapp')
<nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">WebSiteName</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      
      <form action="{{ route('currency.setCurrency') }}" method="post">
        @csrf
        
        <select name="currency" class="form-select" style="padding-top: 15px;padding-bottom: 15px;" onchange="this.form.submit()">
           @foreach (\App\Models\Currency::where('status','active')->get() as $currency)
           <option value="{{ $currency->code }}" {{ session('currency') == $currency->code ? 'selected' : '' }}>{{ $currency->code }}</option>
           @endforeach
            
        </select>
    </form>

      
    </div>
  </nav>
    