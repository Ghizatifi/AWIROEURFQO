
<div class="modal fade" id="group-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h5 class="modal-title" >Add A New Time</h5>
      </div>
      <form action="{{ route('postInsertgroup') }}" method="POST" id="form-group-create" >
<div class="modal-body">
<div class="row">
         <div class="col-sm-12">
            <select  class="form-control" name="id_niveau" id="id_niveau" ></select>
            </div>
      </div>

        <div class="row">
         <div class="col-sm-12">
            <input type="text" class="form-control" name="groupe" id="new_group" placeholder="group">

            </div>
      </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-save-group">Save </button>
      </div>
      </form>
    </div>
  </div>
</div>
