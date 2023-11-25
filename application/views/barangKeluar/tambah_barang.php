
<?php
        $a = $kode['max_code'];
        $b = $in['inisal'];
        $c = $in['id_cabang'];
        $hari = date('y');
        $urutan = (int)substr($a,4,4);
        $urutan++;
        $kd = $b.$hari.sprintf("%04s, $urutan");

        ?>

        <?= form_open();?>
        <table>
            <tr>
                <td>NO Asset</td>
                <td><input type="text" name="id" id="" value="<?= $cb; ?>"></td>
                <td>Nama Asset</td>
                <td>
                    <input type="text" name="nama">
                    <input type="text" name="cb" value="<?= $c; ?> hidden">
                </td>
                <td>Tanggal Beli</td>
                <td>Lokasi</td>
                <td>Cabang</td>
                <td>Keterangan</td>
            </tr>
        </table>