@extends('layouts/account')

@section('title')
    Account - Dashboard
@endsection

@section('content')
    
  <div>
    <div class="row">
      <div class="col-md-10">
        <h1>{{$project[0]->title}}</h1>
        <h6>This is Where all your projects are located</h6>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="row">
            <div class="col-md-10">
                    <div class="img-section">
                      <div class="row">
                        {{-- <div class="col-md-3">
                          <div class="box">
                            <div style="position: relative; background: url(https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=400&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3ODI0N30) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover; height: 200px;">
                            </div>
                          </div>
                        </div> --}}
                      </div>
                    </div>
            </div>
            <div class="col-md-2">
              <center>
                <a href="/account/projects/{{$project[0]->id}}/edit" class="edit-btn">Edit</a>
                <a href="/account/projects/{{$project[0]->id}}/delete" onclick="confirm()" class="delete-btn">Delete</a>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
  <script>
    
  </script>

@endsection