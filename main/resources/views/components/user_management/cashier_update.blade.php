@foreach ($cashiers as $cashier)  
<div class="modal fade" id="edit-cashier{{ $cashier->id }}" tabindex="-1" aria-labelledby="editCashierLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCashierLabel">Edit Cashier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Form or content for editing cashier goes here -->
                <form action="{{ route('cashier.update', $cashier->id)}}" method="post">
                    @csrf
                    @method('POST')
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $cashier->name}}" required>
                  </div>
                  <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ $cashier->username}}" required>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ $cashier->password}}" required>
                  </div>
                  <div class="mb-3">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" class="form-control" id="position" name="position" value="{{ $cashier->position}}" required>
                  </div>
    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>

        </div>
    </div>
</div>


@endforeach
