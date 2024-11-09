<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_{{$type}}_{{$user->id}}">
Delete
</button>

  <!-- Modal -->
  <div class="modal fade" id="delete_{{$type}}_{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete {{$type}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('users.destroy', $user->id) }}" method="get">
            @csrf
            <div class="modal-body">
                <span style="font-size:25px; color: #f8b806e5;">Warning!!<br></span>
                Will Delete all orders relation it this user!!<br><br>
                Are you sure from delete the {{$type}} <strong>{{$data->fname}} {{$data->lname}}</strong> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
        </div>
        </form>
      </div>
    </div>
  </div>
