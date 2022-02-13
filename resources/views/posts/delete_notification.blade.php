<!-- Modal delete notofication -->
<div class="modal fade" id="post{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="icon fas fa-info-circle" style="color:#DC1650"></i> Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure to delete <b>{{$post->title}}</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <a class="btn btn-danger" href="{{URL::to('delete_post',['encrypted_id'=>\base64_encode($post->id)])}}">Delete</a>
      </div>
    </div>
  </div>
</div>