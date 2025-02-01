<!-------------------------- Register dialog ------------------------------------>
<div class="card">
    <div class="card-header">
        <h4>{{ $modalDialog }}</h4>
        <button type="button" class="btn-close modal__close" id="registerClose">
            <svg xmlns='http://www.w3.org/2000/svg' width="22" height="22" viewBox='0 0 16 16' fill='currentColor'>
               <path d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/>
            </svg>
         </button>
    </div>
    @includeWhen($validation, 'in_clude.validation', ['text' => 'Testing the connection of the verification file.'])
    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <?php
                $_inputRegistr = [
                    (object)["label"=>'Name',             "type"=>'Name',             "name"=>'name',                  "value"=>old('name')],
                    // (object)["label"=>'Role',             "type"=>'Role',             "name"=>'role',                  "value"=>''],
                    (object)["label"=>'E-mail Address',   "type"=>'E-mail Address',   "name"=>'email',                 "value"=>old('email')],
                    (object)["label"=>'Password',         "type"=>'Password',         "name"=>'password',              "value"=>''],
                    (object)["label"=>'Confirm password', "type"=>'Confirm password', "name"=>'password_confirmation', "value"=>''],
                ];
            ?>
            @each('in_clude.components.input', $_inputRegistr, '_input')

            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button class="btn btn-primary"
                        type="submit"
                        name="operator"
                        value="manual_installation">
                        {{ $nameButton }}
                    </button>
                </div>
            </div>
        </form>
    </div><!-- class="card-body" -->
</div><!-- div class="card" -->
<!----------------------- The end register dialog ------------------------------->
