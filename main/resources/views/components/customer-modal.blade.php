    <!-- customer modal -->
    <div class="modal fade" id="customer" tabindex="-1" aria-labelledby="customer" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-md-12 modal-sm-12">
          <div class="modal-content">
    
            <div class="modal-header">
            <div class="modal-title">
                <h5>Customers</h5>
            </div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
      
            <div class="modal-body">
              <!-- List of customers -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date and Time</th>
                            <th scope="col">Phone Number</th>
                        </tr>
                        @foreach($customers as $key => $customer)
                        <tr>
                            <th>{{$customer->id}}</th>
                            <td>{{$customer->first_name}}</td>
                            <td>{{$customer->last_name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->date_time}}</td>
                            <td>{{$customer->phone_number}}</td>

                        </tr>
                        @endforeach
                        
                    </thead>
                    <tbody> 
                  
                    </tbody>
                </table>
            </div>

            </div>
       
          </div>
        </div>
      </div>
    <!-- end modal -->