<kd-lazy class="app-footer">
   <div class="app-kd-footer ng-star-inserted" style="">
      <div class="footer-wrapper">
         <section class="footer-stores-star-inserted">
            <div class="layout">
               <kd-apps-links>
                  <div class="apps-links-footer-stores">
                     <h3 class="footer-stores__heading">
                        Скачивайте наши приложения
                     </h3>
                     <ul class="footer-stores__buttons">
                        <?php
                           $_buttons = [
                              (object)["href" => "#",
                                 "aria" => "Приложение для Android",
                                 "src" => "https://xl-static.rozetka.com.ua/assets/img/design/button-google-play-ru.svg",
                                 "alt" => "Google Play"],
                              (object)["href" => "#",
                                 "aria" =>"Приложение для iOS",
                                 "src" => "https://xl-static.rozetka.com.ua/assets/img/design/button-appstore-ru.svg",
                                 "alt" => "AppStore"]
                           ];
                        ?>
                        @each('in_clude.components.buttonsHeaderFooter', $_buttons, 'butt',)
                     </ul>
                  </div>
               </kd-apps-links>
            </div>
         </section>
         <footer class="footer">
            <div class="layout">
               <div class="footer-top">
                  <div class="footer-top__social">
                     <a class="button button--small button--with-icon button--link footer-top__schedule" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                           <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                           <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                        </svg>
                        График работы Call-центра
                     </a>
                     <kd-social-icons>
                        <ul class="socials__list">
                           <li class="socials__list-item">
                              <a target="_blank" class="socials__link socials__link--facebook" href="#" title="Facebook" aria-label="Facebook">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="#506098" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                                    </svg>
                              </a>
                           </li>
                           <li class="socials__list-item">
                              <a target="_blank" class="socials__link socials__link--twitter" href="#" title="Twitter" aria-label="Twitter">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15"/>
                                 </svg>
                              </a>
                           </li>
                           <li class="socials__list-item">
                              <a class="socials__link socials__link--youtube" href="https://www.youtube.com/" target="_blank" title="YouTube">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                    <path d="M0 12V4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2m6.79-6.907A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z"/>
                                 </svg>
                              </a>
                           </li>
                           <li class="socials__list-item">
                              <a class="socials__link socials__link--GitHub" href="https://github.com/" target="_blank" title="GitHub">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
                                 </svg>
                              </a>
                           </li>
                           <li class="socials__list-item">
                              <a target="_blank" class="socials__link socials__link--Google" href="#" title="Google" aria-label="Google">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                    <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"/>
                                 </svg>
                              </a>
                           </li>
                           {{-- 
                              <li class="socials__list-item">
                                 <a target="_blank" class="socials__link socials__link--instagram" href="" title="Instagram" aria-label="Instagram">
                                    <svg aria-hidden="true">
                                       <use href="#icon-instagram">
                                       </use>
                                    </svg>
                                 </a>
                              </li>
                              <li class="socials__list-item">
                                 <a target="_blank" class="socials__link socials__link--viber" href="" title="Viber" aria-label="Viber">
                                    <svg aria-hidden="true">
                                       <use href="#icon-viber">
                                       </use>
                                    </svg>
                                 </a>
                              </li>
                           --}}
                           <li class="socials__list-item">
                              <a target="_blank" class="socials__link socials__link--telegram" href="#" title="Telegram" aria-label="Telegram">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.287 5.906q-1.168.486-4.666 2.01-.567.225-.595.442c-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294q.39.01.868-.32 3.269-2.206 3.374-2.23c.05-.012.12-.026.166.016s.042.12.037.141c-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8 8 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629q.14.092.27.187c.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.4 1.4 0 0 0-.013-.315.34.34 0 0 0-.114-.217.53.53 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09"/>
                                 </svg>
                              </a>
                           </li><!---->
                        </ul>
                     </kd-social-icons>
                  </div><!---->

                  <kd-service-links place="footer" class="footer-top__links ng-tns-c1400081795-0">
                     <ul class="layout">
                        <?php
                           $arraModules = [
                              (object)['title' => 'О компании'],
                              (object)['title' => 'Помощь'],
                              (object)['title' => 'Сервисы'],
                              (object)['title' => 'Партнёрам']
                           ];
                        ?>
                        @each('in_clude.partialsFooterModule', $arraModules, 'module',)
                     </ul>
                  </kd-service-links>
               </div>
               <div class="footer-bottom">
                  <kd-payments-btns class="footer-payments">
                     <ul class="payments-buttons">
                        <li class="payments-buttons__item">
                           <button type="button" class="payments-buttons__button" title="MasterCard Secure">
                              <img loading="lazy" rzimgui="" alt="MasterCard Secure" src="https://xl-static.rozetka.com.ua/assets/img/design/mastercard-logo.svg">
                           </button>
                        </li>
                        <li class="payments-buttons__item">
                           <button _ngcontent-rz-client-c4092362835="" type="button" class="payments-buttons__button" title="Visa Verified">
                              <img _ngcontent-rz-client-c4092362835="" loading="lazy" rzimgui="" alt="Visa Verified" src="https://xl-static.rozetka.com.ua/assets/img/design/visa-logo.svg">
                           </button>
                        </li><!---->
                     </ul>
                  </kd-payments-btns>
                  <p class="footer-copyright">
                     © 2024 <b>Порфолио.</b> За основу взят интернет-магазина «Розетка».
                     <span style="color: #f2571d;">
                        <b>Ищу команду для сотрудничества.</b>
                     </span>
                  </p>
               </div>
            </div>
         </footer>
      </div>
   </div>
</kd-lazy>
