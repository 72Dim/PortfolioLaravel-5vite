<div class="row mb-3">
   @if ( 'Remember me' == $_input->label )
      <div class="col-md-6 offset-md-4">
         <div class="form-check">
            <input class="form-check-input"
               type="{{ $_input->type }}"
               name="{{ $_input->name }}"
               id="remember">
            <label class="form-check-label">
               {{-- Remember me --}}
               {{ $_input->label }}
            </label>
               {{-- <span class="invalid-feedback" role="
                  <strong>test</strong>
               </span> --}}
         </div>
      </div>
   @elseif ( 'E-mail Address' == $_input->label || 'Password' == $_input->label )
      <label class="col-md-4 col-form-label text-md-end">
         {{ $_input->label }}
      </label>
      <div class="col-md-6 ml-6">
         @if( $errors->any() )
         {{-- @if( $errors->regi->any() ) --}}
            <input class="form-control is-invalid"
               {{-- <input class="form-control @error('{{ $_input->name }}') is-invalid @enderror" data-test_di="{{ $test_di ?? '' }}"  is-invalid } @endif" data-test_di="{{ $test_di ?? '' }}"--}}
               type="{{ $_input->type }}"
               name="{{ $_input->name }}"
               value="{{ $_input->value }}"
               autocomplete="on"
               autofocus
               required>
            <span class="invalid-feedback" role="alert"> {{-- <strong>{{ $message }}</strong> --}} {{-- <strong>{{ $errors->count().', '. }}</strong> --}}
               <pre data-for-test="для изучения Objecta errors">
                  <?php
                     // var_dump($errors) 
                     // var_dump( $errors->keys() );
                     // print_r($errors->get('email'));
                     // print_r($errors->get( $_input->name ));
                     // print_r($errors->email); // так не работает
                  ?>
               </pre>
               <ul id="errors" data-field-validation="{{ $_input->name }}">
                  {{-- <ul id="errors" data-count="{{ $errors->count() }}"> --}}
                  {{-- @foreach ($errors->regi->get( $_input->name ) as $error) --}}
                     @foreach ($errors->get( $_input->name ) as $key => $error)
                        {{-- <li>{{ $error }}</li> --}}
                        <li>{{ $key.' - '.$error }}</li>
                  @endforeach
               </ul>
                  
            </span>
         @else
         <input class="form-control"
            type="{{ $_input->type }}"
            name="{{ $_input->name }}"
            value="{{ $_input->value }}"
            autocomplete="on"
            autofocus
            required>
         @endif
      </div>
   @else
      <label class="col-md-4 col-form-label text-md-end">
         {{ $_input->label }}
      </label>
      <div class="col-md-6 ml-6">
         <input class="form-control"
            type="{{ $_input->type }}"
            name="{{ $_input->name }}"
            value="{{ $_input->value }}"
            autocomplete="on"
            autofocus
            required>
      </div>
      {{-- @if ( 'Remember me' != $_input->label ) --}}
      {{-- @if (isset($_input['label'])) --}}
      {{-- @isset($_input->label) --}}
      {{-- <label class="col-md-4 col-form-label text-md-end">
         {{ $_input->label }}
      </label>
      <div class="col-md-6 ml-6">
         @if ( 'E-mail Address' == $_input->label || 'Password' == $_input->label )
            <input class="form-control @error('{{ $_input->name }}') is-invalid @enderror"
            type="{{ $_input->type }}"
            name="{{ $_input->name }}"
            value="{{ $_input->value }}"
            autocomplete="on"
            autofocus
            required>
            @error('{{ $_input->name }}')
               <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
               </span>
            @enderror
         @else
            <input class="form-control"
         @endif
            type="{{ $_input->type }}"
            name="{{ $_input->name }}"
            value="{{ $_input->value }}"
            autocomplete="on"
            autofocus
            required> --}}
            {{-- </div> --}}
      {{-- </div> --}}
      {{-- <label class="col-md-4 col-form-label text-md-end">
         Name
      </label>
      <div class="col-md-6 ml-6">
         <input class="form-control"
            id="name"
            type="text"
            name="name"
            value=""
            required
            autofocus> --}}

      {{-- @elseif ( 'Remember me' == $_input->label )
      <div class="col-md-6 offset-md-4">
         <div class="form-check">
            <input class="form-check-input"
               type="{{ $_input->type }}"
               name="{{ $_input->name }}"
               id="remember">
            <label class="form-check-label">
               {{-- Remember me --}
               {{ $_input->label }}
            </label> --}}
               {{-- <span class="invalid-feedback" role="
                  <strong>test</strong>
               </span> --}}
         {{-- </div>
      </div> --}}
   @endif
</div>

<?php

                          
      //       Атрибут required указывает, что поле ввода должно быть заполнено перед отправкой формы.
      // TODO: Атрибут autofocus указывает, что поле ввода должно автоматически получать фокус при загрузке страницы.
      // TODO: Атрибут autocomplete="on | off" указывает, должно ли автозаполнение формы или поля ввода быть включено или выключено.
   /*
      Атрибут input value указывает начальное значение для поля ввода.
      Атрибут input readonly указывает, что поле ввода доступно только для чтения.
      Атрибут input disabled указывает, что поле ввода должно быть отключено.
      Атрибут input size определяет видимую ширину поля ввода в символах.
      Атрибут input maxlength указывает максимальное количество символов, разрешенных в поле ввода.
      Ввод minи max атрибуты определяют минимальное и максимальное значения для поля ввода.
      Атрибут ввода multiple указывает, что пользователю разрешено вводить более одного значения в поле ввода.
      Атрибут input pattern указывает регулярное выражение, по которому проверяется значение поля ввода при отправке формы.
      Атрибут input placeholder задает краткую подсказку, описывающую ожидаемое значение поля ввода (примерное значение или краткое описание ожидаемого формата).
      TODO: Атрибут input required указывает, что поле ввода должно быть заполнено перед отправкой формы.
      Атрибут input stepопределяет допустимые интервалы чисел для поля ввода.
      TODO: Атрибут input autofocus указывает, что поле ввода должно автоматически получать фокус при загрузке страницы.
      Входные данные heightи width атрибуты определяют высоту и ширину <input type="image">элемента.
      TODO: Атрибут input autocomplete="on | off" указывает, должно ли автозаполнение формы или поля ввода быть включено или выключено.
      Атрибут input list относится к <datalist> элементу, который содержит предопределенные параметры для элемента <input>.

      required autocomplete="name" autofocus
      требуется autocomplete="name" Автофокус
      * Commentar
      ! Commentar
      ? Commentar
      TODO: Commentar
   */
?>