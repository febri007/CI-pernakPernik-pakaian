<?php  
include '../../config/class.php';
include '../../config/fungsi.php';
$id_transaksi = $_GET['id'];
$data = $transaksi->detail($id_transaksi);
$tanggal = date('Y-m-d', strtotime($data['tgl_transaksi']));
$tgl_ambil = date('Y-m-d', strtotime($data['tgl_ambil']));
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style type="text/css">
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr.top table td.invoice {
            float: right;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.information table .informasi {
            float: right;
        }

        .invoice-box table tr.heading th {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item th{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
        .table1 {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
        }

        .table1, th, td {
            padding: 8px 20px;
        }
    </style>
</head>

<body onload="print()">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="../../upload/img-invoice/laundry.png" style="width:100%; max-width:150px;">
                            </td>
                            
                            <td class="invoice">
                                Invoice #<?= $data['nomor_order'] ?><br>
                                +628981189598 <br>
                                amalialaundry@gmail.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>

                            <td>
                                Nama : <?= $data['nama'] ?><br>
                                Telepon : <?= $data['telepon'] ?><br>
                                Alamat : <?= $data['alamat'] ?>
                            </td>
                            
                            <td class="informasi">
                                No. Order : <?= $data['nomor_order'] ?><br>
                                Tgl. Transaksi : <?= tanggal_indo($tanggal, true) ?><br>
                                Tgl. Ambil :  <?= tanggal_indo($tgl_ambil, true) ?> | <?= $data['jam_ambil'] ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            
        </table>
        <table class="table1">
            <tr class="heading">
                <th>Paket Laundry</th>
                <th>Berat</th>
                <th>Harga / Kg</th>
                <th>Subtotal</th>
            </tr>
            <tr class="item">
                <th><?= $data['jenis'] ?> | <?= $data['nama_paket_sub'] ?> / <?= $data['lama_hari'] ?></th>
                <th><?= $data['berat'] ?> Kg</th>
                <th>Rp. <?= number_format($data['harga']) ?></th>
                <th>Rp. <?= number_format($data['total']) ?></th>
            </tr>
            <tfoot>
               <tr>
                <th colspan="2"></th>
                <th>Total</th>
                <th>Rp. <?= number_format($data['total']) ?></th>
            </tr>
        </tfoot>
    </table> 
    <div class="notes-block">
        <div class="editable-area" id="notes" style=""><b>Keterangan:</b></div>
        <div class="notice">1. Pengambilan cucian harus membawa nota</div>
        <div class="notice">2. Cucian Luntur bukan tanggung jawab kami</div>
        <div class="notice">3. Hitung dan periksa sebelum pergi</div>
        <div class="notice">4. klaim kekurangan/kehilangan cucian setelah meninggalkan laundri tidak dilayani</div>
        <div class="notice">5. Cucian yang rusak/mengkerut karena sifat kain tidak dapat kami ganti</div>
        <div class="notice">6. Cucian yang tidak diambil lebih dari 1 bulan bukan tanggung jawab kami</div>
        <div class="notice">7. Maximal penggantian 10x dari total invoice dan barang menjadi milik kami</div>
    </div>      
</div>
</body>
</html>