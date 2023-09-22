<x-shop-layout>
    <!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
            <h2>Review</h2>
            <ul class="clearfix bread-crumb">
                <li><a href="{{ route('shop.index') }}">Home</a></li>
                <li>User</li>
                <li>Review</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    @push('css')
    <style>
        /* .btn-tab-user {
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
            }
            .btn-tab-user.active {
                background-color: var(--black-color);
                color: #fff;
            } */
        th,
        td {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
            font-size: 15px;
        }

        .border-thinner {
            border: 1px solid rgba(0, 0, 0, 0.10)
        }

        /* .btn-tab-user:hover {
                background-color: var(--black-color);
                color: #fff;
            } */
    </style>
    @endpush
    <!-- Shoping Cart Section -->
    <section class="shoping-cart-section">
        <div class="auto-container">
            <x-shop.user-tab />

            <div class="row">
                <div class="col-md-8">
                    <div class="card border-thinner rounded-0">
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    @if($reviews->count() > 0)
                                    <button class="nav-link active fs-6" id="nav-review-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review"
                                        aria-selected="true">
                                        Menunggu Direview
                                    </button>
                                    @endif
                                    <button class="nav-link {{ $reviews->count() > 0 ? '':'active' }} fs-6" id="nav-last-review-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-last-review" type="button" role="tab"
                                        aria-controls="nav-last-review" aria-selected="false">
                                        Riwayat Review Saya
                                    </button>
                                </div>
                            </nav>
                            @push('css')
                            <style>
                                .rating div {
                                    display: inline-block;
                                    font-size: 24px;
                                }

                                .rating .fa-star {
                                    color: #ccc;
                                    /* Warna default bintang (gelap) */
                                    cursor: pointer;
                                }

                                .rating .fa-star.active {
                                    color: var(--color-eight);
                                    /* Warna default bintang (gelap) */
                                    cursor: pointer;
                                }

                                .rating .fa-star.hovered {
                                    color: var(--color-eight);
                                    /* Warna bintang saat dihover */
                                }
                            </style>
                            @endpush

                            @push('js')
                            <script>
                                $(document).ready(function() {
                                    // Saat salah satu radio button dipilih
                                    $(":radio").change(function() {
                                        // Menghapus kelas "hovered" dari semua label bintang
                                        $(".rating label span").removeClass("hovered");

                                        // Menemukan indeks radio button yang dipilih
                                        var selectedIndex = $(":radio").index(this);

                                        // Menambahkan kelas "hovered" ke label bintang yang sesuai
                                        $(".rating label span:lt(" + (selectedIndex + 1) + ")").addClass("hovered");
                                        $(".input-review").show();
                                    });

                                    // Saat mouse meninggalkan area rating
                                    $(".review-card").mouseleave(function() {
                                        // Menghapus kelas "hovered" dari semua label bintang
                                        // jika fokus tidak di texarea maka hilangkan input review
                                        if($(".input-review textarea").is(":focus") == false) {
                                            $(".rating label span").removeClass("hovered");
                                            $(":radio").prop("checked", false);
                                            $(".input-review").hide();
                                        }
                                        // $(".rating label span").removeClass("hovered");
                                        // $(":radio").prop("checked", false);
                                        // $(".input-review").hide();
                                    });
                                });
                            </script>
                            @endpush
                            <div class="tab-content" id="nav-tabContent">
                                @if($reviews->count() > 0)
                                <div class="tab-pane fade show active" id="nav-review" role="tabpanel"
                                    aria-labelledby="nav-review-tab">
                                    <div class="row py-4 gy-3">
                                        @foreach ($reviews as $review)
                                        <div class="col-12">
                                            <div class="card rounded-0 border-thinner review-card">
                                                <div class="card-header">
                                                    <div class="d-md-flex justify-content-between">
                                                        <h6 class="fs-6">
                                                            No Invoice : <span class="text-secondary">{{ $review->transaction->invoice }}</span>
                                                        </h6>
                                                        <h6 class="fs-6 text-md-end">
                                                            Tgl transaksi selesai : <span class="text-secondary">{{ $review->transaction->updated_at }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="d-md-flex">
                                                        <img src="{{ $review->product->thumbnail }}"
                                                            style="max-height: 100px" alt="" class="img-fluid rounded">
                                                        <div class="ms-md-3 w-100">
                                                            <h6 class="mb-2">{{ $review->product->name }}</h6>
                                                            <form action="{{ route('user.review.update', $review->id) }}" class="" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="rating mb-2">
                                                                    <div>
                                                                        <input type="radio" name="rating" value="1" id="star-1" class="d-none">
                                                                        <label for="star-1"><span
                                                                                class="fa fa-star"></span></label>
                                                                    </div>
                                                                    <div>
                                                                        <input type="radio" name="rating" value="2" id="star-2" class="d-none">
                                                                        <label for="star-2"><span
                                                                                class="fa fa-star"></span></label>
                                                                    </div>
                                                                    <div>
                                                                        <input type="radio" name="rating" value="3" id="star-3" class="d-none">
                                                                        <label for="star-3"><span
                                                                                class="fa fa-star"></span></label>
                                                                    </div>
                                                                    <div>
                                                                        <input type="radio" name="rating" value="4" id="star-4" class="d-none">
                                                                        <label for="star-4"><span
                                                                                class="fa fa-star"></span></label>
                                                                    </div>
                                                                    <div>
                                                                        <input type="radio" name="rating" value="5" id="star-5" class="d-none">
                                                                        <label for="star-5"><span
                                                                                class="fa fa-star"></span></label>
                                                                    </div>
                                                                </div>
                                                                <div class="input-review" style="display: none">
                                                                    <textarea name="review" id="" rows="3"
                                                                        class="form-control"
                                                                        placeholder="Gimana produknya? Tulis ulasanmu disini"></textarea>
                                                                    <div class="d-flex justify-content-end">
                                                                        <button class="btn btn-sm btn-dark mt-2">
                                                                            Kirim Review
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                <div class="tab-pane fade {{ $reviews->count() > 0 ? '':'show active' }}" id="nav-last-review" role="tabpanel"
                                    aria-labelledby="nav-last-review-tab">
                                    <div class="row py-4 gy-3">
                                        @forelse ($lastReviews as $review)
                                        <div class="col-12">
                                            <div class="card rounded-0 border-thinner review-card">
                                                <div class="card-header">
                                                    <div class="d-md-flex justify-content-between">
                                                        <h6 class="fs-6">
                                                            No Invoice : <span class="text-secondary">{{ $review->transaction->invoice }}</span>
                                                        </h6>
                                                        <h6 class="fs-6 text-md-end">
                                                            Tgl transaksi selesai : <span class="text-secondary">{{ $review->transaction->updated_at }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="d-md-flex">
                                                        <img src="{{ $review->product->thumbnail }}"
                                                            style="max-height: 100px" alt="" class="img-fluid rounded">
                                                        <div class="ms-md-3 w-100">
                                                            <h6 class="mb-2">{{ $review->product->name }}</h6>
                                                            <div class="">
                                                                <div class="rating mb-2">
                                                                    @for ($i = 0; $i < 5; $i++)
                                                                    <div>
                                                                        {{-- <input type="radio" id="star-1" class="d-none"> --}}
                                                                        <label for="star-1"><span
                                                                                class="fa fa-star {{ $i < $review->rating ? 'active':''}}"></span></label>
                                                                    </div>
                                                                    @endfor
                                                                </div>
                                                                <div class="">
                                                                    <textarea name="" id="" style="background: white!important"
                                                                        class="form-control" disabled>{{ $review->review }}</textarea>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="col-12">
                                            <div class="card rounded-0 border-thinner">
                                                <div class="card-body">
                                                    Belum ada produk yang sudah kamu review
                                                </div>
                                            </div>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shoping Cart Section -->

    <!-- Gallery Section -->
    <x-shop.gallery />
    <!-- End Gallery Section -->
</x-shop-layout>
