@extends('layout.adminheader')

@section('main_content')
<section class="section-6 pt-5">
  <div class="container">
    <div class="row">            
      <div class="col-md-3 sidebar">
        <div class="sub-title mt-5">
          <h2><strong>COURSES</strong></h2>
        </div>
                  
        <div class="card">
          <div class="card-body">
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" value="" id="btechCheck">
              <label class="form-check-label" for="btechCheck">
                BTECH
              </label>
            </div>                 
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" value="" id="bbaCheck">
              <label class="form-check-label" for="bbaCheck">
                BBA
              </label>
            </div>
          </div>
        </div>

        <div class="sub-title mt-5">
          <h2><strong>MARKSX</strong></h2>
        </div>
                        
        <div class="card">
          <div class="card-body">
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" value="" id="marks60Below">
              <label class="form-check-label" for="marks60Below">
                60 & below
              </label>
            </div>                 
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" value="" id="marks60to70">
              <label class="form-check-label" for="marks60to70">
                60-70
              </label>
            </div>                
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" value="" id="marks70to80">
              <label class="form-check-label" for="marks70to80">
                70-80
              </label>
            </div>    
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" value="" id="marks80to90">
              <label class="form-check-label" for="marks80to90">
                80-90
              </label>
            </div> 
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" value="" id="marks90to100">
              <label class="form-check-label" for="marks90to100">
                90-100
              </label>
            </div> 
          </div>
        </div>

        <div class="sub-title mt-5">
          <h2><strong>MARKSXII</strong></h2>
        </div>
                        
        <div class="card">
          <div class="card-body">
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" value="" id="marks60Below">
              <label class="form-check-label" for="marks60Below">
                60 & below
              </label>
            </div>                 
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" value="" id="marks60to70">
              <label class="form-check-label" for="marks60to70">
                60-70
              </label>
            </div>                
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" value="" id="marks70to80">
              <label class="form-check-label" for="marks70to80">
                70-80
              </label>
            </div>    
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" value="" id="marks80to90">
              <label class="form-check-label" for="marks80to90">
                80-90
              </label>
            </div> 
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" value="" id="marks90to100">
              <label class="form-check-label" for="marks90to100">
                90-100
              </label>
            </div> 
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection

@section('customJs')
<script src="{{ asset('front-assets/js/ion.rangeSlider.min.js')}}"></script>
<script>
$(document).ready(function() {
  var rangeSlider = $(".js-range-slider").ionRangeSlider({
    type: "double",
    min: 0,
    max: 100,
    from: 0,
    step: 10,
    to: 100,
    skin: "round",
    postfix: "%",
    onFinish: function(data) {
      apply_filters(data.from, data.to);
    }
  });

  function apply_filters(min, max) {
    // Your filter logic here
    console.log("Min: " + min + ", Max: " + max);
  }
});
</script>
@endsection
