<!--Modal Registration-->
<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content registration-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title">{{ __('Register') }}</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="register-box-body">
            
            <div class="form-group">
              <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
              @csrf

              <div class="form-group has-feedback">
                    <!----- username-------------->
                    <label for="username" class="col-md col-form-label text-md-right">{{ __('Username') }}</label>
                  <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                  @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                </div>

                <div class="form-group has-feedback">
                  <!----- Email -------------->
                  <label for="email" class="col-md col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                   <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                      @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif   
                  </div>

                    <div class="form-group has-feedback">
                        <!----- password -------------->
                      <label for="password" class="col-md col-form-label text-md-right">{{ __('Password') }}</label>
                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                          @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                    </div>

                     <div class="form-group has-feedback">
                        <!----- password -------------->
                      <label for="password-confirm" class="col-md col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                      <input id="password-confirm" type="password" class="form-control" name="password" required>
                    </div>


                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-green btn-block btn-flat" > {{ __('Register') }}</button>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
  <!--/ Modal registration-->
