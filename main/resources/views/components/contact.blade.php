<!-- modal contact -->
<div class="modal fade" id="contact" tabindex="-1" aria-labelledby="contact" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  
                  <h5 class="modal-title" id="exampleModalLabel">Schedule an Appointment</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/contact" method="post" id="formSched">
                        {{csrf_field()}}
                        <div class="form-row">
                          <div class="col-md-12 mb-3">
                            <label for="fname">First name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" required>
                          </div>
                          <div class="col-md-12 mb-3">
                            <label for="lname">Last name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" required>
                          </div>
                          <div class="col-md-12 mb-3">
                            <label for="phone_number">Phone number</label>
                            <input type="tel" class="form-control" onkeypress="allowNumbersOnly(event)" id="phone_number" name="phone_number" placeholder="+63..." required>
                          </div>
                          <div class="col-md-8 mb-3">
                            <label for="email">Email</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                              </div>
                              <input type="email" class="form-control" id="email" name="email" placeholder="email" aria-describedby="inputGroupPrepend2" required>
                            </div>
                          </div>
                        </div>
                        <div class="form-row">
                            <label for="date_time" class="form-label">Set a Date and Time</label>
                            <input type="datetime-local" id="date_time" class="form-control" name="date_time" "required>
                        </div>
                        <div class="row justify-content-end">
                            <button class="btn btn-outline-primary col-4 m-3" type="submit" id="submit" name="submit" onclick="submitForm()">Submit</button>
                        </div>
                      </form>
                </div>
                
          </div>
          </div>
        </div>
        <!-- end modal -->  