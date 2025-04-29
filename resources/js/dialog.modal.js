      $(document).ready(function(){

         class ModalBlock {
            constructor() {}

            show_modal() {
               if ( $('body').attr('class') != '' ) {
                  $('#modal_backdrop, #modal_wrap').addClass('show');
               }
            }

            close_modal() {
               var self = this;
               $('#modal_wrap').click(function(e) {
                  if ( 'modal_wrap' == e.target.id ) {
                     self.closeModalAndDialog();
                     e.stopPropagation();
                  }
               });

               $('button').click(function(e) {
                  if (  'loginClose' == this.id
                     || 'registerClose' == this.id
                     || 'cartClose' == this.id )
                  {
                     self.closeModalAndDialog();
                  }
                  e.stopPropagation();
               });
            }
         }

         var modal = new ModalBlock();

         modal.show_modal();
         modal.close_modal();

         var admixture = {
            // Объект примесь
            closeModalAndDialog() {
               $('body').removeClass($('body').attr('class'));
               $('#modal_backdrop, #modal_wrap').removeClass('show');
            }
         }

         // копируем методы
         Object.assign(ModalBlock.prototype, admixture);

      });