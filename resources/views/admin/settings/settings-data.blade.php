<div>
    <form action="">
        <div class="card-body">
            <div class="mb-3 row">
                <label for="html5-text-input" class="col-md-2 col-form-label">Name</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" disabled value="{{ config('app.name') }}"
                        id="html5-text-input" />
                </div>

            </div>
            <div class="mb-3 row">
                <label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
                <div class="col-md-10">
                    <input class="form-control" type="email" disabled value="john@example.com"
                        id="html5-email-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-text-input" class="col-md-2 col-form-label">Address</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" value="{{ config('app.name') }}" id="html5-text-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-url-input" class="col-md-2 col-form-label">Facebook</label>
                <div class="col-md-10">
                    <input class="form-control" type="url" value="https://themeselection.com"
                        id="html5-url-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-url-input" class="col-md-2 col-form-label">Twitter</label>
                <div class="col-md-10">
                    <input class="form-control" type="url" value="https://themeselection.com"
                        id="html5-url-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-url-input" class="col-md-2 col-form-label">Instgram</label>
                <div class="col-md-10">
                    <input class="form-control" type="url" value="https://themeselection.com"
                        id="html5-url-input" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="html5-url-input" class="col-md-2 col-form-label">Linkedin</label>
                <div class="col-md-10">
                    <input class="form-control" type="url" value="https://themeselection.com"
                        id="html5-url-input" />
                </div>
            </div>
            <hr class="border border-primary border-2 opacity-75">
            <button type="submit" class="btn btn-primary mt-3 ">Save</button>
        </div>
    </form>
</div>
