 
@section('css')
<style>
 
 
    .loading {
    width: 50px;
    height: 50px;
    background-color: #fff;
    position: absolute;
    left: 50%;
    top: 20%;
    z-index: 99999;
    display: none;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border: 5px solid darkblue;
    border-left-color: transparent;
 
    animation-name: spin;
    animation-duration: 3s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
}
 
@keyframes spin {
    0% {
        transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
    }
 
    100% {
        transform: rotate(360deg);
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
    }
}
 
/* by esraa eid 31-12-2021 */
</style>
 
 
@endsection
<!-- Modal -->
<div class="modal fade" id="editPortfolio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card card-primary">
            
             

              <!-- الطريقة الثانية باستخدام ajax -->
              <form id="addForm">
                  @csrf
                  <div class="loading"></div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('backend/portfolio.name_EN')}}</label>
                    <input id="name_en" type="text" class="form-control"  name="name_en">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('backend/portfolio.name_AR')}}</label>
                    <input id="name_ar" type="text" class="form-control" name="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('backend/portfolio.description')}}({{trans('backend/portfolio.optional')}})</label>
                    <textarea id="description" class="form-control" name="description" ></textarea>
                  </div>
               
                </div>
                <!-- /.card-body -->

               <div class="modal-footer">
                <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">{{trans('backend/public.Close')}}</button>
                <button type="submit" id="add_portfolio" class="btn btn-primary">{{trans('backend/public.Save changes')}}</button>
               </div>
              </form>
            </div>
      </div>
     
    </div>
  </div>
</div>