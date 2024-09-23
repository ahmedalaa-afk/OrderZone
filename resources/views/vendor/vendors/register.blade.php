<div>
    <form id="formAuthentication" class="mb-3" wire:submit.prevent='submit' enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" value="{{ old('name') }}" class="form-control" wire:model='name' id="name"
                name="name" placeholder="Enter your Name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" value="{{ old('email') }}" class="form-control" wire:model='email' id="email"
                name="email" placeholder="Enter your email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-3">
            <label for="html5-tel-input" class="col-md-4 col-form-label">Phone</label>
            <div class="col-md-12">
                <input class="form-control" type="tel" name="phone" wire:model='phone'
                    placeholder="Enter your phone number" value="{{ old('phone') }}" id="html5-tel-input" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <small class="text-primary">Optional *</small>
        </div>
        <div class="mb-3">
            <label for="exampleDataList" class="form-label">Country</label>
            <input class="form-control" list="datalistOptions" name="country" wire:model='country' id="exampleDataList"
                placeholder="Type to search..." />
            <datalist id="datalistOptions">
                @foreach ($countries as $country)
                    <option value="{{ $country->name }}" @selected(old('country') == $country->name)> {{ $country->name }} </option>
                @endforeach
            </datalist>
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" value="{{ old('address') }}" class="form-control" wire:model='address' id="address"
                address="address" placeholder="Enter your address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        <div class="mb-3">
            <label for="html5-date-input" class="col-md-4 col-form-label">Birth of Date</label>
            <div class="col-md-12">
                <input class="form-control" name="birth_date" value="{{ old('birth_date') }}" wire:model='birth_date'
                    type="date" id="html5-date-input" />
                <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
            </div>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Identity Front Photo</label>
            <input class="form-control" type="file" wire:model='identity_front' value="{{ old('identity_front') }}"
                name="identity_front" id="formFile" />
            <x-input-error :messages="$errors->get('identity_front')" class="mt-2" />
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Identity Back Photo</label>
            <input class="form-control" type="file" wire:model='identity_back' value="{{ old('identity_back') }}"
                name="identity_back" id="formFile" />
            <x-input-error :messages="$errors->get('identity_back')" class="mt-2" />
        </div>
        <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">Password</label>
            <div class="input-group input-group-merge">
                <input type="password" id="password" wire:model='password' class="form-control" name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">Confirm Password</label>
            <div class="input-group input-group-merge">
                <input type="password" id="password" wire:model='password_confirmation' class="form-control"
                    name="password_confirmation"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                <label class="form-check-label" for="terms-conditions">
                    I agree to
                    <a href="javascript:void(0);">privacy policy & terms</a>
                </label>
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
        </div>
    </form>
</div>
