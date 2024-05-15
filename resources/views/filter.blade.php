<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootsrap.min.css" rel="stylesheet" id="">
<script src= "//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://fontawesome.com/v4.7.0/assets/font-awesome/css/font-awesome">

<div class="container mt-5">
  <div class="row">
    <aside class="col-md-3">

<form action="{{url('/')}}" method="GET">
  <div class="card">
    <article class="filter-group">
      <header class="card-header">
        <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
          <i class="icon-control fa fa-chevron-down"></i>
          <h6 class="title">Product Title</h6>
        </a>
      </header>
      <div class="filter-content collapse show" id="collapse_1" style="">
        <div class="card-body">
          <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" name="title">
          </div><!--card body-->
        </div>
      </aritcle><!--filter-group-->
      <article class="filter-group">
        <header class="card-header">
          <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
            <i class="icon-control fa fa-chevron-down"></i>
            <h6 class="title">Category</h6>
          </a>
        </header>
        <div class="filter-content collapse show" data-target="collapse_2" style="">
          <div class="card-body">
            @foreach($categories as $category)
              <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" name="category[]" value="{{$category->id}}">
              <div class="custom-control-label">{{$category->name}}
              </div>
              </label>
            @endforeach
            </div> <!--card body-->
          </div>
        </article><!--filter group-->
        <article class="filter group">
          <div class="filter-content collapse show" id="collapse_3" style="">
            <div class="card-body">
              <div class="form-row">
                <div class= "form-group col-md-6">
                  <label>Min</label>
                  <input class="form-control" placeholder="$0" type="number">
                </div>
                <div class= "form-group text-right col-md-6">
                  <label>Max</label>
                  <input class="form-control" placeholder="$1,0000" type="number">
                </div>
              </div> <!--form-row-->
              <button class="btn btn-block btn-primary">Apply</button>
            </div><!--card body-->
          </div>
        </article><!--filter group-->

      </div><!--card-->

    </aside>

    <!--<main class="col-md-9">
    <header class="border-bottom mb-4 pb-3">
      <div class="form-inline">
        <span class="mr-md-auto">{{count($products)}}ITEM FOUND</span>
      </div>-->

          


      