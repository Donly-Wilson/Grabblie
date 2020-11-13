@extends('layouts/main')

@section('title')
Grabblie - Inspiration for developers
@endsection

@section('content')

<div id="site-section">
  <div class="container">
    <div id="results">
      <div>
        <div class="search-container">
          <form action="/results" method="post">
            @csrf
            <input class="search" type="text" value="{{$search}}" placeholder="Search" name="search" >
          </form>
        </div>
        <div class="boxes">
          <div class="row">
            {{-- Loop through filteredData array from result route in PageController --}}
            @if (count($filteredData) >= 1)
                
            
            @foreach ($filteredData as $inspiration)
            <div class="col-md-3">
              <div class="box">
                <div style="position: relative; background: url({{ $inspiration->urls->small }}) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;">
                  @php
                  //Removes url special characters by encoding it
                    $encodedUrl = urlencode($inspiration->urls->small)
                  @endphp
                  <a href="/projects/inspiration/{{$inspiration->id}}/add?image_url={{ $encodedUrl }}">
                    <div class="add-btn 
                    @if(in_array($inspiration->id, $imageArrayId))
                      {
                        active
                      }@endif
                      "><i class="fa fa-check" aria-hidden="true"></i></div>
                  </a>
                </div>
              </div>
            </div>
            @endforeach
            
            @else 
            <h1>Sorry No Results</h1>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
