
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{route('portfolios.store')}}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('backend/portfolio.name_ER')}}</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name_er">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('backend/portfolio.name_AR')}}</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('backend/portfolio.description')}}({{trans('backend/portfolio.optional')}})</label>
                    <textarea class="form-control" id="exampleInputEmail1" name="description" ></textarea>
                  </div>
               
                </div>
                <!-- /.card-body -->

               <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('backend/portfolio.Close')}}</button>
                <button type="submit" class="btn btn-primary">{{trans('backend/portfolio.Save changes')}}</button>
               </div>
              </form>
            </div>
      </div>
     
    </div>
  </div>
</div>