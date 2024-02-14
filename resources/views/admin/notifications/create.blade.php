<div class="offcanvas offcanvas-end customeoff addtask" tabindex="-1" id="offcanvasExample1">
    <div class="offcanvas-header">
        <h5 class="modal-title" id="#gridSystemModal1">Add New Notification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa fa-close"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="container-fluid">

            <form id="addnotification" class="row g-3 needs-validation" method="post"
                action="{{ route('notification.store') }}">
                @csrf



                <div class="col-md-12">
                    <div class="custom__form__inputs">
                        <label for="select" class="form-label">Recipient Type<span>*</span></label>
                        <div class="normal__select">
                            <select class="form-select" id="recipient_type" name="recipient_type">
                                <option value="">Select</option>
                                <option value="all" selected>All</option>
                                <option value="users">Users</option>
                                <option value="roles">Role</option>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="custom__form__inputs" id="recipient_outer">
                        {{-- <label for="select" class="form-label">Recipient<span>*</span></label>
                        <div class="normal__select">
                            <select id="recipient-select" name="recipient" multiple="multiple" class="form-select">
                                @foreach ($users as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                </div>


                <div class="col-md-12">
                    <label for="bsValidation2" class="form-label">Title<span>*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                        value="{{ old('title') }}" name="title">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="bsValidation2" class="form-label">Description<span>*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Description" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>




                <hr style="opacity: .15;">

            </form>

        </div>
    </div>

    <div class="button-footer">
        <div class="d-md-flex d-flex d-grid align-items-center gap-3 justify-content-end">
            <button type="submit" form="addnotification" class="btn  px-4  template-btn ">Add</button>
            <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="offcanvas"
                aria-label="Close">Cancel</button>
        </div>
    </div>
</div>
