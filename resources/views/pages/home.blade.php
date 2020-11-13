@extends('layouts/main')

@section('title')
  Grabblie - Inspiration for developers
@endsection

@section('content')
    
  <div id="site-section">
    <div class="container">
      <div id="home">
        <div class="search-area">
          <div class="search-container">
            <form action="/results" method="post">
              @csrf
            <h1>Grabblie</h1>
            <input class="search" type="text" value="" placeholder="Search" name="search">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection
