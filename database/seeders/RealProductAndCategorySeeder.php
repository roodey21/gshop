<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RealProductAndCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['POT', 'VAS', 'PADASAN','WASTAFEL','BLENGKER','PENOPANG'];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'status' => true,
            ]);
        }
        $products = [
            [
                'name' => 'Pot Diameter 14cm',
                'sku' => 'P01',
                'description' => '<p>Haii para penggemar seni!!</p>
                <p>Ingin bercocok taman tapi bingung tempat yang cocok? Arsenik punya solusinya!!! Arsenik kembali hadir dengan bermacam-macam kerajinan seni gerabah lho! Kalian penasaran?? Yuk kepoin penjelasan dibahwa ini!!!</p>
                <p>Salah satu produk gerabah yang diproduksi yaitu pot. Pot merupakan kelompok gerabah fungsional. Pot dapat digunakan sebagai tempat menanam tanaman, seperti bunga, tanaman buah, tanaman sayur, dan sebagainya. Pot ini juga dapat mempercantik rumah Anda dengan designnya yang dilengkapi dengan ukiran-ukiran dan ornament yang menarik. Tidak hanya itu saja, tanaman Anda juga akan lebih tertata dengan rapi.</p>
                <p>Pot ini terbuat dari bahan tanah liat lokal dari daerah Kulon Progo. Bentuknya yang menawan menjadi daya tarik tersendiri. Kualitas barang tidak kalah dari produksi gerabah lainnya. Arsenik menghadirkan berbagai variasi pot dengan bermacam-macam ukiran dan dari berbagai macam ukuran dari yang kecil hingga besar. Ada juga pot set yang terdiri dari pot dan penopangnya lho!</p>
                ',
                'price' => 7000,
                'weight' => 500,
                'status' => true,
                'category_id' => Category::where('name', 'POT')->first()->id,
                'stock' => 100
            ],
            [
                'name' => 'Pot Diameter 20cm',
                'sku' => 'P02',
                'description' => '<p>Haii para penggemar seni!!</p>
                <p>Ingin bercocok taman tapi bingung tempat yang cocok? Arsenik punya solusinya!!! Arsenik kembali hadir dengan bermacam-macam kerajinan seni gerabah lho! Kalian penasaran?? Yuk kepoin penjelasan dibahwa ini!!!</p>
                <p>Salah satu produk gerabah yang diproduksi yaitu pot. Pot merupakan kelompok gerabah fungsional. Pot dapat digunakan sebagai tempat menanam tanaman, seperti bunga, tanaman buah, tanaman sayur, dan sebagainya. Pot ini juga dapat mempercantik rumah Anda dengan designnya yang dilengkapi dengan ukiran-ukiran dan ornament yang menarik. Tidak hanya itu saja, tanaman Anda juga akan lebih tertata dengan rapi.</p>
                <p>Pot ini terbuat dari bahan tanah liat lokal dari daerah Kulon Progo. Bentuknya yang menawan menjadi daya tarik tersendiri. Kualitas barang tidak kalah dari produksi gerabah lainnya. Arsenik menghadirkan berbagai variasi pot dengan bermacam-macam ukiran dan dari berbagai macam ukuran dari yang kecil hingga besar. Ada juga pot set yang terdiri dari pot dan penopangnya lho!</p>
                ',
                'price' => 9800,
                'weight' => 2000,
                'status' => true,
                'category_id' => Category::where('name', 'POT')->first()->id,
                'stock' => 100
            ],
            [
                'name' => 'Pot Diameter 27cm',
                'sku' => 'P03',
                'description' => '<p>Haii para penggemar seni!!</p>
                <p>Ingin bercocok taman tapi bingung tempat yang cocok? Arsenik punya solusinya!!! Arsenik kembali hadir dengan bermacam-macam kerajinan seni gerabah lho! Kalian penasaran?? Yuk kepoin penjelasan dibahwa ini!!!</p>
                <p>Salah satu produk gerabah yang diproduksi yaitu pot. Pot merupakan kelompok gerabah fungsional. Pot dapat digunakan sebagai tempat menanam tanaman, seperti bunga, tanaman buah, tanaman sayur, dan sebagainya. Pot ini juga dapat mempercantik rumah Anda dengan designnya yang dilengkapi dengan ukiran-ukiran dan ornament yang menarik. Tidak hanya itu saja, tanaman Anda juga akan lebih tertata dengan rapi.</p>
                <p>Pot ini terbuat dari bahan tanah liat lokal dari daerah Kulon Progo. Bentuknya yang menawan menjadi daya tarik tersendiri. Kualitas barang tidak kalah dari produksi gerabah lainnya. Arsenik menghadirkan berbagai variasi pot dengan bermacam-macam ukiran dan dari berbagai macam ukuran dari yang kecil hingga besar. Ada juga pot set yang terdiri dari pot dan penopangnya lho!</p>
                ',
                'price' => 28000,
                'weight' => 3500,
                'status' => true,
                'category_id' => Category::where('name', 'POT')->first()->id,
                'stock' => 100
            ],
            [
                'name' => 'Pot Diameter 50cm',
                'sku' => 'P04',
                'description' => '<p>Haii para penggemar seni!!</p>
                <p>Ingin bercocok taman tapi bingung tempat yang cocok? Arsenik punya solusinya!!! Arsenik kembali hadir dengan bermacam-macam kerajinan seni gerabah lho! Kalian penasaran?? Yuk kepoin penjelasan dibahwa ini!!!</p>
                <p>Salah satu produk gerabah yang diproduksi yaitu pot. Pot merupakan kelompok gerabah fungsional. Pot dapat digunakan sebagai tempat menanam tanaman, seperti bunga, tanaman buah, tanaman sayur, dan sebagainya. Pot ini juga dapat mempercantik rumah Anda dengan designnya yang dilengkapi dengan ukiran-ukiran dan ornament yang menarik. Tidak hanya itu saja, tanaman Anda juga akan lebih tertata dengan rapi.</p>
                <p>Pot ini terbuat dari bahan tanah liat lokal dari daerah Kulon Progo. Bentuknya yang menawan menjadi daya tarik tersendiri. Kualitas barang tidak kalah dari produksi gerabah lainnya. Arsenik menghadirkan berbagai variasi pot dengan bermacam-macam ukiran dan dari berbagai macam ukuran dari yang kecil hingga besar. Ada juga pot set yang terdiri dari pot dan penopangnya lho!</p>
                ',
                'price' => 220000,
                'weight' => 9500,
                'status' => true,
                'category_id' => Category::where('name', 'POT')->first()->id,
                'stock' => 100
            ],
            [
                'name' => 'Pot set (Pot Jumbo 50cm + penopang)',
                'sku' => 'P05',
                'description' => '<p>Haii para penggemar seni!!</p>
                <p>Ingin bercocok taman tapi bingung tempat yang cocok? Arsenik punya solusinya!!! Arsenik kembali hadir dengan bermacam-macam kerajinan seni gerabah lho! Kalian penasaran?? Yuk kepoin penjelasan dibahwa ini!!!</p>
                <p>Salah satu produk gerabah yang diproduksi yaitu pot. Pot merupakan kelompok gerabah fungsional. Pot dapat digunakan sebagai tempat menanam tanaman, seperti bunga, tanaman buah, tanaman sayur, dan sebagainya. Pot ini juga dapat mempercantik rumah Anda dengan designnya yang dilengkapi dengan ukiran-ukiran dan ornament yang menarik. Tidak hanya itu saja, tanaman Anda juga akan lebih tertata dengan rapi.</p>
                <p>Pot ini terbuat dari bahan tanah liat lokal dari daerah Kulon Progo. Bentuknya yang menawan menjadi daya tarik tersendiri. Kualitas barang tidak kalah dari produksi gerabah lainnya. Arsenik menghadirkan berbagai variasi pot dengan bermacam-macam ukiran dan dari berbagai macam ukuran dari yang kecil hingga besar. Ada juga pot set yang terdiri dari pot dan penopangnya lho!</p>
                ',
                'price' => 350000,
                'weight' => 20000,
                'status' => true,
                'category_id' => Category::where('name', 'POT')->first()->id,
                'stock' => 100
            ],
            [
                'name' => 'Vas Diameter 13cm',
                'sku' => 'V01',
                'description' => '<p>Haii para penggemar seni!!</p>
                <p>Ingin memperindah ruangan? Punya bunga tapi bingung tempatnya? Arsenik punya solusinya!!! Arsenik kembali hadir dengan bermacam-macam kerajinan seni gerabah lho! Kalian penasaran?? Yuk kepoin penjelasan dibahwa ini!!!</p>
                <p>Salah satu produk gerabah yang diproduksi yaitu vas. Vas merupakan kelompok gerabah nonfungsional. Vas dapat digunakan sebagai barang hiasan ruangan. Vas ini didesign dengan sangat elegan. Tanaman bunga Anda akan lebih menarik jika ditempatkan dalam vas tersebut.</p>
                <p>Vas ini terbuat dari bahan tanah liat lokal dari daerah Kulon Progo. Bentuknya yang sangat klasik menjadi daya tarik tersendiri. Kualitas barang tidak kalah dari produksi gerabah lainnya. Arsenik menghadirkan berbagai variasi vas dari ukuran kecil hingga besar lho!</p>
                ',
                'price' => 25000,
                'weight' => 1100,
                'status' => true,
                'category_id' => Category::where('name', 'VAS')->first()->id,
                'stock' => 100
            ],
            [
                'name' => 'Vas Diameter 25cm',
                'sku' => 'V02',
                'description' => '<p>Haii para penggemar seni!!</p>
                <p>Ingin memperindah ruangan? Punya bunga tapi bingung tempatnya? Arsenik punya solusinya!!! Arsenik kembali hadir dengan bermacam-macam kerajinan seni gerabah lho! Kalian penasaran?? Yuk kepoin penjelasan dibahwa ini!!!</p>
                <p>Salah satu produk gerabah yang diproduksi yaitu vas. Vas merupakan kelompok gerabah nonfungsional. Vas dapat digunakan sebagai barang hiasan ruangan. Vas ini didesign dengan sangat elegan. Tanaman bunga Anda akan lebih menarik jika ditempatkan dalam vas tersebut.</p>
                <p>Vas ini terbuat dari bahan tanah liat lokal dari daerah Kulon Progo. Bentuknya yang sangat klasik menjadi daya tarik tersendiri. Kualitas barang tidak kalah dari produksi gerabah lainnya. Arsenik menghadirkan berbagai variasi vas dari ukuran kecil hingga besar lho!</p>
                ',
                'price' => 28000,
                'weight' => 1900,
                'status' => true,
                'category_id' => Category::where('name', 'VAS')->first()->id,
                'stock' => 100
            ],
            [
                'name' => 'Padasan',
                'sku' => 'N01',
                'description' => '<p>Haii para penggemar seni!!</p>
                <p>Ingin memperindah rumah? Arsenik punya solusinya!!! Arsenik kembali hadir dengan bermacam-macam kerajinan seni gerabah lho! Kalian penasaran?? Yuk kepoin penjelasan dibahwa ini!!!</p>
                <p>Salah satu produk gerabah yang diproduksi yaitu padasan. Padasan merupakan kelompok gerabah fungsional. Padasan dapat digunakan sebagai tempat penampungan yang nantinya dapat digunakan hanya dengan membuka penutup saluran air. Selain itu, padasan juga dapat digunakan sarana untuk cuci tangan. Padasan ini merupakan salah satu produk tradisional yang didesign sangat elegan dengan ukiran dan ornament tambahan yang menambah keindahan dari produk ini. </p>
                <p>Padasan terbuat dari bahan tanah liat lokal dari daerah Kulon Progo. Bentuknya yang menarik dan elegan menjadi daya tarik tersendiri. Kualitas barang tidak kalah dari produksi gerabah lainnya. Arsenik juga menghadirkan produk padasan set lho! Terdiri dari padasan dan juga penopangnya.                </p>
                ',
                'price' => 250000,
                'weight' => 12000,
                'status' => true,
                'category_id' => Category::where('name', 'PADASAN')->first()->id,
                'stock' => 100
            ],
            [
                'name' => 'Padasan set (Padasan + penopang)',
                'sku' => 'N02',
                'description' => '<p>Haii para penggemar seni!!</p>
                <p>Ingin memperindah rumah? Arsenik punya solusinya!!! Arsenik kembali hadir dengan bermacam-macam kerajinan seni gerabah lho! Kalian penasaran?? Yuk kepoin penjelasan dibahwa ini!!!</p>
                <p>Salah satu produk gerabah yang diproduksi yaitu padasan. Padasan merupakan kelompok gerabah fungsional. Padasan dapat digunakan sebagai tempat penampungan yang nantinya dapat digunakan hanya dengan membuka penutup saluran air. Selain itu, padasan juga dapat digunakan sarana untuk cuci tangan. Padasan ini merupakan salah satu produk tradisional yang didesign sangat elegan dengan ukiran dan ornament tambahan yang menambah keindahan dari produk ini. </p>
                <p>Padasan terbuat dari bahan tanah liat lokal dari daerah Kulon Progo. Bentuknya yang menarik dan elegan menjadi daya tarik tersendiri. Kualitas barang tidak kalah dari produksi gerabah lainnya. Arsenik juga menghadirkan produk padasan set lho! Terdiri dari padasan dan juga penopangnya.                </p>
                ',
                'price' => 400000,
                'weight' => 22000,
                'status' => true,
                'category_id' => Category::where('name', 'PADASAN')->first()->id,
                'stock' => 100
            ],
            [
                'name' => 'Wastafel Diameter 40cm',
                'sku' => 'W01',
                'description' => '<p>Haii para penggemar seni!!</p>
                <p>Ingin memperindah rumah? Bingung model tempat cuci tangan? Arsenik punya solusinya!!! Arsenik kembali hadir dengan bermacam-macam kerajinan seni gerabah lho! Kalian penasaran?? Yuk kepoin penjelasan dibahwa ini!!!</p>
                <p>Salah satu produk gerabah yang diproduksi yaitu wastafel. wastafel merupakan kelompok gerabah fungsional. Wastafel dapat digunakan sebagai tempat untuk cuci tangan. Apalagi di masa saat ini. walaupun Indonesia telah bebas daro Covid-19, namun kita harus tetap waspada dengan selalu cuci tangan. Wastafel ini merupakan tempat cuci tangan yang didesign dengan ukiran dan ornament tambahan yang sangat mempercantik produk ini. </p>
                <p>Wastafel terbuat dari bahan tanah liat lokal dari daerah Kulon Progo. Bentuknya yang menarik menjadi daya tarik tersendiri. Kualitas barang tidak kalah dari produksi gerabah lainnya. Arsenik juga menghadirkan produk wastafel set lho! Terdiri dari wastafel dan juga penopangnya.</p>
                ',
                'price' => 230000,
                'weight' => 9500,
                'status' => true,
                'category_id' => Category::where('name', 'WASTAFEL')->first()->id,
                'stock' => 100
            ],
            [
                'name' => 'Wastafel set (Wastafel + penopang)',
                'sku' => 'W02',
                'description' => '<p>Haii para penggemar seni!!</p>
                <p>Ingin memperindah rumah? Bingung model tempat cuci tangan? Arsenik punya solusinya!!! Arsenik kembali hadir dengan bermacam-macam kerajinan seni gerabah lho! Kalian penasaran?? Yuk kepoin penjelasan dibahwa ini!!!</p>
                <p>Salah satu produk gerabah yang diproduksi yaitu wastafel. wastafel merupakan kelompok gerabah fungsional. Wastafel dapat digunakan sebagai tempat untuk cuci tangan. Apalagi di masa saat ini. walaupun Indonesia telah bebas daro Covid-19, namun kita harus tetap waspada dengan selalu cuci tangan. Wastafel ini merupakan tempat cuci tangan yang didesign dengan ukiran dan ornament tambahan yang sangat mempercantik produk ini. </p>
                <p>Wastafel terbuat dari bahan tanah liat lokal dari daerah Kulon Progo. Bentuknya yang menarik menjadi daya tarik tersendiri. Kualitas barang tidak kalah dari produksi gerabah lainnya. Arsenik juga menghadirkan produk wastafel set lho! Terdiri dari wastafel dan juga penopangnya.</p>
                ',
                'price' => 430000,
                'weight' => 20000,
                'status' => true,
                'category_id' => Category::where('name', 'WASTAFEL')->first()->id,
                'stock' => 100
            ],
            [
                'name' => 'Blengker Diameter 35cm',
                'sku' => 'B01',
                'description' => '<p>Haii para penggemar seni!!</p>
                <p>Arsenik kembali hadir dengan bermacam-macam kerajinan seni gerabah lho! Kalian penasaran?? Yuk kepoin penjelasan dibahwa ini!!!</p>
                <p>Salah satu produk gerabah yang diproduksi yaitu blengker. Blengker merupakan kelompok gerabah fungsional. Blengker dapat digunakan sebagai media untuk mengganjal benda-benda panas dari kompor. Blengker ini merupakan salah satu produk tradisional yang didesign dengan klasik. </p>
                <p>Blengker terbuat dari bahan tanah liat lokal dari daerah Kulon Progo. Bentuknya yang klasik menjadi daya tarik tersendiri. Kualitas barang tidak kalah dari produksi gerabah lain lho!</p>
                ',
                'price' => 8400,
                'weight' => 1000,
                'status' => true,
                'category_id' => Category::where('name', 'BLENGKER')->first()->id,
                'stock' => 100
            ],
            [
                'name' => 'Penopang',
                'sku' => 'C01',
                'description' => '<p>Haii para penggemar seni!!</p>
                <p>Ingin mempercantik rumah? Arsenik kembali hadir dengan bermacam-macam kerajinan seni gerabah lho! Kalian penasaran?? Yuk kepoin penjelasan dibahwa ini!!!</p>
                <p>Salah satu produk gerabah yang diproduksi yaitu penopang. Penopang merupakan kelompok gerabah fungsional. Penopang dapat digunakan sebagai tempat untuk mengganjal barang seperti wastafel, padasan, maupun pot. Dengan penopang barang tersebut akan terlihat lebih tinggi dan menarik. Design penopang yang sangat unik dengan ukiran dan ornamen tambahan, sangat cocok untuk mempercantik rumah Anda. </p>
                <p>Penopang terbuat dari bahan tanah liat lokal dari daerah Kulon Progo. Bentuknya yang cantik menjadi daya tarik tersendiri. Kualitas barang tidak kalah dari produksi gerabah lain lho!</p>
                ',
                'price' => 260000,
                'weight' => 9500,
                'status' => true,
                'category_id' => Category::where('name', 'PENOPANG')->first()->id,
                'stock' => 100
            ],
        ];
        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
