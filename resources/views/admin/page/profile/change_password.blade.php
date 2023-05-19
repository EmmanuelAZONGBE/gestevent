@extends('admin.layouts.app')

@section ('content')

<div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
              <form>

              <div class="row mb-3">
                  <label for="old_password" class="col-md-4 col-lg-3 col-form-label">Current Password </label>
                  <div class="col-md-8 col-lg-9">
                    <input name="old_password" type="text" class="form-control @error('old_password') is-invalide @enderror" id="old_password" value="{{old('old_password',$user->old_password}}" required autocomplete="current_password" autofocus>
                        @error('old_password')
                            <span class="invalide-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="password" class="col-md-4 col-lg-3 col-form-label">New Password </label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control @error('password') is-invalide @enderror" id="password" value="{{old('password',$user->password}}" required autocomplete="new_password" autofocus>
                        @error('password')
                            <span class="invalide-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                  </div>
                </div>

                <<div class="row mb-3">
                  <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">New Password confirmed</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password_confirmation" type="password_confirmation" class="form-control @error('password_confirmation') is-invalide @enderror" id="password_confirmation" value="{{old('password_confirmation',$user->password_confirmation}}" required autocomplete="new_password" autofocus>
                        @error('password_confirmation')
                            <span class="invalide-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form>
              <!-- End Change Password Form -->

            </div>
@endsection