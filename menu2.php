<?php 
$datakategori1 = $kategori->tampil();
?>
<style>
.breadcrumb {
    margin-top: 20px;
}

.panel-body {
    margin-top: 20px;
    background-color: #e5e7e9;
}

.preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: #fff;
}

.preloader .loading {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    font: 14px arial;
}

.galeriproduksi {
    width: 200px;
    height: 160px;
}
</style>
<div class="panel panel-body">
    <div class="container">
        <div class="billing-details">
            <div class="section-title">
                <center>
                    <h3 class="title">Keunggulan Kami</h3>
                </center>
                <div class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-xs-6">
                                <div class="footer">
                                    <h3 class="footer-title">
                                        <center>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="120"
                                                fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
                                            </svg>
                                        </center>
                                        Bahan berkualitas dan higienis
                                    </h3>
                                    <ul class="footer-links">
                                        Bahan yang digunakan dalam proses pembuatan produk ialah bahan dengan kualitas
                                        tinggi,
                                        serta proses pembuatan dilakukan dengan higienis
                                    </ul>


                                </div>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <div class="footer">
                                    <h3 class="footer-title">
                                        <center>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="120"
                                                fill="currentColor" class="bi bi-cloud-check" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                                <path
                                                    d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z" />
                                            </svg>
                                        </center>
                                        Layanan 24 jam
                                    </h3>
                                    <ul class="footer-links">
                                        Kami memprioritaskan pelayanan kepada pelanggan, sehingga pelanggan dapat
                                        menghubungi customer service kapanpun.
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-6">
                                <div class="footer">
                                    <h3 class="footer-title">
                                        <center>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="120"
                                                fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>
                                        </center>
                                        Layanan Delivery
                                    </h3>
                                    <ul class="footer-links">
                                        Kami menyediakan pengantaran kepada pelanggan, tanpa repot untuk mengambil
                                        pesanan atau karna adanya kesibukan lainnya
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix visible-xs"></div>
                            <div class="col-md-3 col-xs-6">
                                <div class="footer">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>