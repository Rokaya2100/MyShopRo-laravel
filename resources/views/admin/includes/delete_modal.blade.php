<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_{{$type}}_{{$category->id}}">
Delete
</button>

  <!-- Modal -->
  <div class="modal fade" id="delete_{{$type}}_{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete {{$type}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                Are you sure from delete the {{$type}} <strong>{{$data->name}}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
        </div>
        </form>
      </div>
    </div>
  </div>
