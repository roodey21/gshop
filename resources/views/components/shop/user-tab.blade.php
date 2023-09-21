<style>
    .btn-tab-user {
        background-color: #fff;
        border: 1px solid #ebebeb;
        color: #000;
        font-size: var(--font-18);
        text-transform: capitalize;
        font-weight: 500;
        padding: 20px 44px;
        border-radius: 0;
        cursor: pointer;
        width: 100%;
        font-family: var(--font-family-Jost);
        /* background-color: var(--black-color) */
    }

    .btn-tab-user.active {
        background-color: var(--black-color);
        color: #fff;
    }

    .total-review {
        origin: center;
        position: absolute;
        right: -10px;
        top: -10px;
        width: 20px;
        height: 20px;
        font-weight: 600;
        line-height: 16px;
        border-radius: 50px;
        font-style: normal;
        font-size: var(--font-10);
        color: var(--white-color);
        background-color: var(--main-color);
        -webkit-animation: icon-bounce 0.8s ease-out infinite;
        animation: pulse-animation 1.2s infinite;
    }
    @keyframes pulse-animation {
        0% {
            box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.2);
        }
        100% {
            box-shadow: 0 0 0 14px rgba(0, 0, 0, 0);
        }
    }

</style>

<div class="row mb-5">
    <div class="col-md-3">
        <a href="{{ route('user.account') }}" class="btn-block btn btn-tab-user {{ (strpos(Route::currentRouteName(), 'user.account') === 0) || (strpos(Route::currentRouteName(), 'shop.payment') === 0)  ? 'active' : '' }}">Transaksi Saya</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('shop.cart.index') }}" class="btn-block btn btn-tab-user {{ (strpos(Route::currentRouteName(), 'shop.cart') === 0) ? 'active' : '' }}">Keranjang</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('user.review') }}"  class="btn-block btn btn-tab-user position-relative {{ (strpos(Route::currentRouteName(), 'user.review') === 0) ? 'active' : '' }}">Review <i class="total-review">!</i></a>
    </div>
    <div class="col-md-3">
        <button class="btn-block btn btn-tab-user">Data Akun Saya</button>
    </div>
</div>

{{-- <div class="py-2 w-100"></div> --}}
