<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#confirmationModal">
  Add Confirmation
</button>

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Confirmation Commission</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('project.commission', [$project, $member->id]) }}" autocomplete="off">

        @csrf
        <div class="modal-body">
          <div class="form-group{{ $errors->has('confirmation_commission') ? ' has-danger' : '' }}">
            <label class="form-control-label" for="input-name">{{ __('Confirmation commission') }}</label>
            <input type="number" name="confirmation_commission" id="input-name" class="form-control form-control-alternative{{ $errors->has('confirmation_commission') ? ' is-invalid' : '' }}" placeholder="{{ __('Confirmation commission') }}" value="{{ old('confirmation_commission') }}" autofocus>

            @if ($errors->has('confirmation_commission'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('confirmation_commission') }}</strong>
            </span>
            @endif
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>