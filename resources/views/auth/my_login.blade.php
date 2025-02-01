<!-------------------------- Login dialog ------------------------------------>
<div class="card">
   <div class="card-header">
      <h4>{{ $modalDialog }}</h4>
      <button type="button" class="btn-close modal__close" id="loginClose">
         <svg xmlns='http://www.w3.org/2000/svg' width="22" height="22" viewBox='0 0 16 16' fill='currentColor'>
            <path d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/>
         </svg>
      </button>
   </div>
   <div class="card-body">
      <form method="POST" action="{{ route('login') }}">
         @csrf
         <?php      
            $inputLogin = [
               (object)["label"=>'Name',            "type"=>'Name',            "name"=>'name',      "value"=>''],
               (object)["label"=>'E-mail Address',  "type"=>'E-mail Address',  "name"=>'email',     "value"=>old('email')],
               (object)["label"=>'Password',        "type"=>'Password',        "name"=>'password',  "value"=>''],
               (object)["label"=>'Remember me',     "type"=>'checkbox',        "name"=>'remember',  "value"=>''],
            ];
         ?>         
         @each('in_clude.components.input', $inputLogin, '_input')
         <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
            <button
               class="btn btn-primary"
               type="submit"
               name="login"
               value="Из формы логина" >
               {{ $nameButton }}
            </button>
            <a class="btn btn-link" href="">Forgot Your Password?</a>
            </div>
         </div>
      </form>
   </div>
</div><!-- the end div class="card" -->
<!----------------------- The end login dialog ------------------------------->
