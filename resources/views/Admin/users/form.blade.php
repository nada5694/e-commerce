<div class="tab-pane mt-4" role="tabpanel">
    <div class="form-group row">
        <label class="admin-form col-lg-2">Name <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control @error('name') is-invalid @enderror" value="{{Request::old('name') ? Request::old('name') : $model->name}}" type="text" name="name" placeholder="Enter name" autocomplete="off">
            @error('name')
            <span class="invalid-feedback" role="alert"></span>
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="admin-form col-lg-2">User Name <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control @error('username') is-invalid @enderror" value="{{Request::old('username') ? Request::old('username') : $model->username}}" type="text" name="username" placeholder="Enter user name" autocomplete="off">
            @error('username')
            <span class="invalid-feedback" role="alert"></span>
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @if ( Route::is('users.create') )
        <div class="form-group row">
            <label class="admin-form col-lg-2">Email <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <input class="form-control @error('email') is-invalid @enderror" value="{{Request::old('email') ? Request::old('email') : $model->email}}" type="text" name="email" placeholder="Enter User Email" autocomplete="off">
                @error('email')
                <span class="invalid-feedback" role="alert"></span>
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="block admin-form col-lg-2{{$errors->has('password') ? ' text-red-400' : ''}}">{{ __('Password') }}</label>
            <div class="col-lg-9">
                <input id="password" class="form-control @error('email') is-invalid @enderror" type="password" name="password"/>
                @error('password')
                <span class="invalid-feedback" role="alert"></span>
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="block admin-form col-lg-2">{{ __('Confirm Password') }}</label>
            <div class="col-lg-9">
                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert"></span>
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    @endif


    <div class="form-group row">
        <label class="admin-form col-lg-2">User type <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <select name="user_type" class="form-control select @error('user_type') is-invalid @enderror" value="{{Request::old('user_type') ? Request::old('user_type') : $model->user_type}}">
                <option value="" disabled selected> ---------- Please select a user type ---------- </option>
                <option value="customer" {{ isset($model) && $model->user_type == 'customer' ? 'selected'  : '' }}>customer</option>
                <option value="vendor" {{ isset($model) && $model->user_type == 'vendor' ? 'selected'  : '' }}>vendor</option>
                <option value="moderator" {{ isset($model) && $model->user_type == 'moderator' ? 'selected'  : '' }}>moderator</option>
                <option value="admin" {{ isset($model) && $model->user_type == 'admin' ? 'selected'  : '' }}>admin</option>
            </select>
            @error('user_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    @if ( Route::is('users.create') )
        <div class="form-group row">
            <label class="admin-form col-lg-2">Gender <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <select name="gender" class="form-control select @error('gender') is-invalid @enderror" value="{{Request::old('gender') ? Request::old('gender') : $model->gender}}">
                    <option value="" disabled selected> ---------- Please select a gender ---------- </option>
                    <option value="male" {{ isset($model) && $model->gender == 'male' ? 'selected'  : '' }}>male</option>
                    <option value="female" {{ isset($model) && $model->gender == 'female' ? 'selected'  : '' }}>female</option>
                    <option value="undetermined" {{ isset($model) && $model->gender == 'undetermined' ? 'selected'  : '' }}>undetermined</option>
                </select>
                @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="admin-form col-lg-2">Phone <span class="text-danger">*</span></label>
            <div class="col-lg-9">
                <input class="form-control @error('phone') is-invalid @enderror" value="{{Request::old('phone') ? Request::old('phone') : $model->phone}}" type="text" name="phone" placeholder="Enter User Phone" autocomplete="off">
                @error('phone')
                <span class="invalid-feedback" role="alert"></span>
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    @endif

</div>
