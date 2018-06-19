<!-- Modal form to add a post -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body row">
                  <form class="form needs-validation" novalidate role="form" id="create-form">
                    {!! csrf_field() !!}
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group col-sm-6">
                            <label class="control-label" for="id">Status:</label>
                            <select name="order_status" class="form-control show-order-data change-status" id="order_status">
                              <option value="0">Open</option>
                              <option value="1">Closed</option>
                            </select>
                            <small class="text-danger" name="order_status"></small>
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group col-sm-6">

                          <label class="control-label" for="id">Name:</label>
                          <input type="name" name="name" class="form-control show-order-data" id="name" autocomplete="off">
                          <small class="text-danger" name="name"></small>

                        </div>
                      </div>
                    </div> <!---End row---->

                    <div class="form-row">
                      <div class="col">
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="title">Apartment number:</label>
                          <select type="text" name="unit_number" class="form-control show-order-data" id="unit_number" autocomplete="off">

                          @foreach ($storeNumbers as $store)

                            <option value="{{$store}}">{{$store}}</option>

                          @endforeach

                          </select>
                          <small class="text-danger" name="unit_number"></small>
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="title">Category:</label>
                          <input type="text" name="category" class="form-control show-order-data" id="category" autocomplete="off">
                          <small class="text-danger" name="category"></small>
                        </div>
                      </div>
                    </div> <!---End row---->


                    <div class="form-row">
                      <div class="form-group col-sm-12">
                        <label class="control-label" for="content">Description:</label>
                        <textarea class="form-control show-order-data" name="description" id="description" cols="40" rows="6"></textarea>
                        <small class="text-danger" name="description"></small>
                      </div>
                    </div>

                    <div class="form-group col-sm-12">
                      <label class="control-label" for="content">Comments:</label>
                      <textarea class="form-control show-order-data" name="comments" id="comments" cols="40" rows="4"></textarea>
                      <small class="text-danger" name="comments"></small>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label" for="id">Permission to enter:</label>
                      <select class="form-control show-order-data change-status" name="permission_to_enter" id="permission_to_enter" autocomplete="off">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>
                      <small class="text-danger" name="permission_to_enter"></small>
                    </div>
                    {!! csrf_field() !!}
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success add" id="create-order-btn">
                    <span class='glyphicon glyphicon-check'></span> Add
                  </button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                  </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal form to show a post -->
    <div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body row">
                    <form class="form" role="form">
                      <div class="form-row">
                        <div class="col">
                          <div class="form-group col-sm-6">
                              <label class="control-label" for="id">Status:</label>
                              <input type="text" name="order_status" class="form-control show-order-data change-status" id="order_status" disabled>
                          </div>
                        </div>

                        <div class="col">
                          <div class="form-group col-sm-6">
                            <label class="control-label" for="id">Name:</label>
                            <input type="name" name="name" class="form-control show-order-data" id="name" disabled>
                          </div>
                        </div>
                      </div> <!---End row---->

                      <div class="form-row">
                        <div class="col">
                          <div class="form-group col-sm-6">
                            <label class="control-label" for="title">Apartment number:</label>
                            <input type="text" name="unit_number" class="form-control show-order-data" id="unit_number" disabled>
                          </div>
                        </div>

                        <div class="col">
                          <div class="form-group col-sm-6">
                            <label class="control-label" for="title">Category:</label>
                            <input type="text" name="category" class="form-control show-order-data" id="category" disabled>
                          </div>
                        </div>
                      </div> <!---End row---->


                      <div class="form-row">
                        <div class="form-group col-sm-12">
                          <label class="control-label" for="content">Description:</label>
                          <textarea class="form-control show-order-data" name="description" id="description" cols="40" rows="6" disabled></textarea>
                        </div>
                      </div>

                      <div class="form-group col-sm-12">
                        <label class="control-label" for="content">Comments:</label>
                        <textarea class="form-control show-order-data" name="comments" id="comments" cols="40" rows="4" disabled></textarea>
                      </div>

                      <div class="form-group col-sm-4">
                        <label class="control-label" for="id">Permission to enter:</label>
                        <input type="text" name="permission_to_enter" class="form-control show-order-data change-permission" id="permission_to_enter" disabled>
                      </div>
                    </form>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                      </button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Modal form to edit a form -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body row">
                  <form class="form" role="form" id="editForm">
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group col-sm-6">
                            <label class="control-label" for="id">Status:</label>
                            <select name="order_status" class="form-control show-order-data" id="order_status" autocomplete="off">
                              <option value="0">Open</option>
                              <option value="1">Closed</option>
                            </select>
                            <small class="text-danger" name="order_status"></small>
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="id">Name:</label>
                          <input type="name" name="name" class="form-control show-order-data" id="name" autocomplete="off">
                          <small class="text-danger" name="name"></small>
                        </div>
                      </div>
                    </div> <!---End row---->

                    <div class="form-row">
                      <div class="col">
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="title">Apartment number:</label>
                          <select type="text" name="unit_number" class="form-control show-order-data" id="unit_number" autocomplete="off">

                          @foreach ($storeNumbers as $store)

                            <option value="{{$store}}">{{$store}}</option>

                          @endforeach

                          </select>

                          <small class="text-danger" name="unit_number"></small>
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="title">Category:</label>
                          <input type="text" name="category" class="form-control show-order-data" id="category" autocomplete="off">
                          <small class="text-danger" name="category"></small>
                        </div>
                      </div>
                    </div> <!---End row---->


                    <div class="form-row">
                      <div class="form-group col-sm-12">
                        <label class="control-label" for="content">Description:</label>
                        <textarea class="form-control show-order-data" name="description" id="description" cols="40" rows="6"></textarea>
                        <small class="text-danger" name="description"></small>
                      </div>
                    </div>

                    <div class="form-group col-sm-12">
                      <label class="control-label" for="content">Comments:</label>
                      <textarea class="form-control show-order-data" name="comments" id="comments" cols="40" rows="4"></textarea>
                      <small class="text-danger" name="comments"></small>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label" for="id">Permission to enter:</label>
                      <select name="permission_to_enter" class="form-control show-order-data" id="permission_to_enter" autocomplete="off">
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                      </select>
                      <small class="text-danger" name="permission_to_enter"></small>
                    </div>
                  </form>
                </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                          <span class='glyphicon glyphicon-check'></span> Edit
                      </button>
                      <button type="button" class="btn btn-warning" data-dismiss="modal">
                          <span class='glyphicon glyphicon-remove'></span> Close
                      </button>
                  </div>
              </div>
          </div>
      </div>

    <!-- Modal form to delete a form -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body row">
                  <form class="form" role="form">
                    <div class="form-row">
                      <div class="col">
                        <div class="form-group col-sm-6">
                            <label class="control-label" for="id">Status:</label>
                            <input type="text" name="order_status" class="form-control show-order-data change-status" id="order_status" disabled>
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="id">Name:</label>
                          <input type="name" name="name" class="form-control show-order-data" id="name" disabled>
                        </div>
                      </div>
                    </div> <!---End row---->

                    <div class="form-row">
                      <div class="col">
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="title">Apartment number:</label>
                          <input type="text" name="unit_number" class="form-control show-order-data" id="unit_number" disabled>
                        </div>
                      </div>

                      <div class="col">
                        <div class="form-group col-sm-6">
                          <label class="control-label" for="title">Category:</label>
                          <input type="text" name="category" class="form-control show-order-data" id="category" disabled>
                        </div>
                      </div>
                    </div> <!---End row---->


                    <div class="form-row">
                      <div class="form-group col-sm-12">
                        <label class="control-label" for="content">Description:</label>
                        <textarea class="form-control show-order-data" name="description" id="description" cols="40" rows="6" disabled></textarea>
                      </div>
                    </div>

                    <div class="form-group col-sm-12">
                      <label class="control-label" for="content">Comments:</label>
                      <textarea class="form-control show-order-data" name="comments" id="comments" cols="40" rows="4" disabled></textarea>
                    </div>

                    <div class="form-group col-sm-4">
                      <label class="control-label" for="id">Permission to enter:</label>
                      <input type="text" name="permission_to_enter" class="form-control show-order-data change-permission" id="permission_to_enter" disabled>
                    </div>
                  </form>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                        <span id="" class='glyphicon glyphicon-trash'></span> Delete
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                  </div>
            </div>
        </div>
    </div>
