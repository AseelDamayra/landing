 
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
            
              <!-- /.card-header -->
              <!-- form start -->
              <!-- الطريقة الاولى -->
              <!-- <form method="post" action="{{route('portfolios.store')}}">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('backend/portfolio.name_EN')}}</label>
                    <input type="text" class="form-control"  name="name_en">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('backend/portfolio.name_AR')}}</label>
                    <input type="text" class="form-control" name="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('backend/portfolio.description')}}({{trans('backend/portfolio.optional')}})</label>
                    <textarea class="form-control" name="description" ></textarea>
                  </div>
               
                </div>
               <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('backend/public.Close')}}</button>
                <button type="submit" class="btn btn-primary">{{trans('backend/public.Save changes')}}</button>
               </div>
              </form> -->


              <!-- الطريقة الثانية باستخدام ajax -->
              <form id="addForm">
                  @csrf
                  <div class="loading"></div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('backend/portfolio.name_EN')}}</label>
                    <input type="text" class="form-control"  name="name_en">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('backend/portfolio.name_AR')}}</label>
                    <input type="text" class="form-control" name="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{trans('backend/portfolio.description')}}({{trans('backend/portfolio.optional')}})</label>
                    <textarea class="form-control" name="description" ></textarea>
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

@section('script')
<script>

  
getData();
        function getData(){
            let tbody=$('#tbody');
            $.ajax({
                type:'get',
                url:'{{route('portfolios.get')}}',
                success:function(data){
                   // console.log(data.portfolios);
                   tbody.html('');
                   //each بدل من foreach or forelse
                   $.each(data.portfolios,function(key,item){
                      tbody.append(
                        `<tr class="rowPort${item.id}">
                        <td>${key+1}</td>
                        <td>${item.name.{{App::getlocale()}}}</td>
                        <td>${item.description}</td>
                        <td>
                        <button port-id="${item.id}" class="bg-info border-0 editPortfolio" data-toggle="modal" data-target="">
                         <i class="fas fa-edit"></i>
                        </button>
                        <button port-id="${item.id}" class="bg-danger border-0 deletePortfolio">
                        <i class="far fa-trash-alt"></i>
                        </button>
                        </td>
                        </tr>
                        `

                      );
                   });
                }
            });
        }
          


        $(document).on('click','#add_portfolio',function(e){
            e.preventDefault();
            let form = $("#addForm")[0];
            let formData = new FormData(form);

            $.ajax({
                type:'post',
                url:'{{route('portfolios.store')}}',
               data:formData,
               contentType:false,
               processData:false,
               beforeSend:function(){
                    $('.loading').css('display','block');
                    $("#addForm input").attr('readonly','readonly');
                    $("textarea").attr('readonly','readonly');
                    $("#close").attr('disabled','disabled');
                    $("#add_portfolio").attr('disabled','disabled');

                },
                complete:function(){
                    setTimeout(() => {
                        $('.loading').css('display','none');
                        $("#exampleModal").modal('hide');
                        $("#addForm input").removeAttr('readonly');
                    $("textarea").removeAttr('readonly');
                    $("#close").removeAttr('disabled');
                    $("#add_portfolio").removeAttr('disabled');
                    }, 2000);
                },
               success:function(){

                $("#addForm").trigger('reset');
                getData();
               }
            });
        });


        $(document).on('click','.editPortfolio',function(){

           let id = $(this).attr('port-id');
           $("#editPortfolio").modal('show');
           $.ajax({
              type:'get',
              url:'{{route('portfolios.get_edit')}}',
              data:{'id':id},
              success:function(responce){

                  $("#name_ar").val(responce.name_ar);
                  $("#name_en").val(responce.name_en);
                  $("#description").val(responce.description);
                  $("#port_id").val(responce.port_id);
                  
                 }
           });
        });

        $(document).on('click','#update_portfolio',function(e){
              e.preventDefault();
           let form=$('#updateForm')[0];
           let formData=new FormData(form);

           $.ajax({
             type:'post',
             url:'{{route('portfolios.myupdate')}}',
             data:formData,
             contentType:false,
            processData:false,
            success:function(){
                getData();
                $('#editPortfolio').modal('hide');
            }
           });

        });

       $(document).on('click','.deletePortfolio',function(){
        let id= $(this).attr('port-id'); // من item.id
        
        $.ajax({
           type:'post',
           url:'{{route('portfolio.delete')}}',
           data:
              {
              'id':id,
              '_token':"{{csrf_token()}}",//في اللاضافة والتعديل كان يجيب التوكين من formdata
              },
            success:function(res){
                $(`.rowPort${res.id}`).remove();
               // getData();
            }
        });
       });
</script>

@endsection