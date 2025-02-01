<!-------------------------- Cart dialog ------------------------------------>
<div class="card">
    <div class="card-header">
        <h4 id="token" name="csrf-token" content="<?php echo csrf_token();?>">Cart.</h4>
        <button type="button" class="btn-close modal__close" id="cartClose">
            <svg xmlns='http://www.w3.org/2000/svg' width="22" height="22" viewBox='0 0 16 16' fill='currentColor'>
                <path d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/>
            </svg>
        </button>
    </div>
    <div class="card-body">
        <ul class="cart-list" id="cart_product_list">
        </ul>
    </div>
</div>