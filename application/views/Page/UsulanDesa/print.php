<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <!-- Fonts -->

    <style>
        .root-container {
            width: 100%;
            height: 100%;
        }

        table {
            font-size: .8em;
            font-family: Arial, Helvetica, sans-serif;
        }

        th,
        td {
            padding-left: 5px;
            padding-right: 5px;
        }

        @media print {
            @page {
                size: landscape;
                margin: 0;
            }

            body {
                padding: 1cm;
            }


        }
    </style>
</head>

<body>

    <div class="root-container">
        <div style="display: flex; justify-content: space-between; align-items: center">
            <div style="">
                <!-- <img src="" style="width: 50px"> -->
            </div>
            <div style="" style="display: flex; justify-content: center;align-items: center">
                <center>
                    <h2 style="margin: 0;padding: 0; text-align: center"><?= strtoupper("Rekapitulasi  Musrenbang Desa/Kelurahan") ?>
                        <br> <?= !empty($_GET['tahun']) ? "TAHUN " . $_GET['tahun'] : "" ?>
                        <br> <?= strtoupper($user['jenis']) ?> <?= strtoupper($user['nama_desa']) ?>
                    </h2>
                    <h2 style="margin: 0;padding: 0; text-align: center"></h2>
                </center>
                <br>
            </div>
            <div style=""></div>
        </div>
        <hr>
        <br />
        <br />
        <table class="table" border="1" style="width: 100%;border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="width: 30px;">NO</th>
                    <th style="width: 100px;">Tanggal Usulan</th>
                    <th style="width: 100px;">Tahun Usulan</th>
                    <th>Prioritas</th>
                    <th>Arah Kebijakan</th>
                    <th>Usulan/Kamus Usulan</th>
                    <th>Permasalahan yang dihadapi</th>
                    <th>Volume</th>
                    <th>Lokasi</th>
                    <th>Data Dukungan Foto</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($usulan as  $value) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= tgl_i($value['tanggal']) ?></td>
                        <td><?= $value['tahun'] ?></td>
                        <td><?= $value['prioritas'] ?></td>
                        <td><?= $value['arah_kebijakan'] ?></td>
                        <td><?= $value['kamus_usulan'] ?></td>
                        <td><?= $value['permasalahan'] ?></td>
                        <td><?= $value['volume'] ?></td>
                        <td><?= $value['lokasi'] ?></td>
                        <td>
                            <a href="<?= base_url("assets/foto_lokasi/" . $value['foto_lokasi']) ?>">
                                <img src="<?= base_url("assets/foto_lokasi/" . $value['foto_lokasi']) ?>" style="width: 100px;" alt="">
                            </a>
                        </td>
                        <td><?=
                            $value['status_kirim'] == "proses" ? "PREVIEW" : ($value['status_kirim'] == "send-kecamatan" ? "TERKIRIM KE KECAMATAN" : ($value['status_kirim'] == "send-bapeda" ? "TERKIRIM KE BAPEDA" : ($value['status_kirim'] == "tolak-kecamatan" ? "USULAN DI TOLAK KECAMATAN" : ($value['status_kirim'] == "hapus-kecamatan" ? "USULAN DI TOLAK KECAMATAN" : $value['status_kirim'])))) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div style="width: 100%; margin-top: 100px;">
        <table style="width: 100%;">
            <tr>
                <td style="width: 60%;"></td>
                <td style="width: 40%;">
                    <div style="width: 100%; display: flex; justify-content: flex-end;">
                        <div style="margin-right: 30px;">
                            <div><?= $user['nama_desa'] ?>, <?= tgl_i(date("Y-m-d")) ?></div>
                            <strong>Kepala <?= ucwords($user['jenis']) ?></strong>
                            <br />
                            <br />
                            <br />
                            <br />
                            <div>
                                <u><?= strtoupper($user['nama_kepala_desa']) ?></u>
                                <br>
                                </small>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>


    <script>
        window.print()
    </script>

</body>

</html>