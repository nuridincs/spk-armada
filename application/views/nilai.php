<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url()?>">Dashboard</a></li>
    <li class="breadcrumb-item">Nilai</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Kriteria
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable2" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kriteria</th>
                        <th>Keterangan</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    $sum=0;
                    $dataArr = [];
                    foreach ($kriteria as $data) {
                        $sum += $data->bobot;
                    }

                    foreach ($kriteria as $data) { 
                        $no++;
                        $dataArr[] = $data->bobot/$sum;
                ?>
                    <tr>
                        <td><?=$no ?></td>
                        <td><?=$data->kriteria ?></td>
                        <td><?=$data->keterangan ?></td>
                        <td><?=$data->bobot ?></td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div> 
</div>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Armada
        <button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#myModal">Tambah Armada</button>
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Type Armada</th>
                        <th>Harga Beli</th>
                        <th>Biaya Pajak Tahunan</th>
                        <th>Biaya Perawatan</th>
                        <th>Banyak Sewa</th>
                        <th>Harga Sewa</th>
                        <th>Tonase</th>
                        <th>Harga Jual</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($armada as $data) { 
                        $no++;
                ?>
                    <tr>
                        <td><?=$no ?></td>
                        <td><?=$data->type_armada ?></td>
                        <td><?=$data->harga_beli ?></td>
                        <td><?=$data->biaya_pajak_tahunan ?></td>
                        <td><?=$data->biaya_perawatan ?></td>
                        <td><?=$data->banyak_sewa ?></td>
                        <td><?=$data->harga_sewa ?></td>
                        <td><?=$data->tonase ?></td>
                        <td><?=$data->harga_jual ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" onclick="getDetail(<?= $data->id ?>)">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete" onclick="getID('<?= $data->id ?>')">Hapus</button>
                        </td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div> 
</div>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Normalisasi Bobot
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable2" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($dataArr as $data) { 
                        $no++;
                ?>
                    <tr>
                        <td><?=$no ?></td>
                        <td><?= round($data, 9) ?></td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div> 
</div>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Nilai Kriteria
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                        <th>C6</th>
                        <th>C7</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $dataVektorArr = [];
                    for ($i=0; $i < count($nilai_kriteria); $i++) {
                        $dataVektorC1 = array(
                            'c1' => $nilai_kriteria[$i]->c1,
                            'vektor' => round($dataArr[0], 9),
                            'bobot' => round(pow($nilai_kriteria[$i]->c1, -($dataArr[0])), 9),
                        );
                        $dataVektorC2 = array(
                            'c2' => $nilai_kriteria[$i]->c2,
                            'vektor' => round($dataArr[1], 9),
                            'bobot' => round(pow($nilai_kriteria[$i]->c2, -($dataArr[1])), 9)
                        );

                        if ($i === 5) {
                            $dataC3 = ($dataArr[2]);
                        } else {
                            $dataC3 = -($dataArr[2]);
                        }

                        $dataVektorC3 = array(
                            'c3' => $nilai_kriteria[$i]->c3,
                            'vektor' => round($dataArr[2], 9),
                            'bobot' => round(pow($nilai_kriteria[$i]->c3, $dataC3), 9)
                        );
                        $dataVektorC4 = array(
                            'c4' => $nilai_kriteria[$i]->c4,
                            'vektor' => round($dataArr[3], 9),
                            'bobot' => round(pow($nilai_kriteria[$i]->c4, ($dataArr[3])), 9)
                        );
                        $dataVektorC5 = array(
                            'c5' => $nilai_kriteria[$i]->c5,
                            'vektor' => round($dataArr[4], 9),
                            'bobot' => round(pow($nilai_kriteria[$i]->c5, ($dataArr[4])), 9)
                        );
                        $dataVektorC6 = array(
                            'c6' => $nilai_kriteria[$i]->c6,
                            'vektor' => round($dataArr[5], 9),
                            'bobot' => round(pow($nilai_kriteria[$i]->c6, ($dataArr[5])), 9)
                        );
                        $dataVektorC7 = array(
                            'c7' => $nilai_kriteria[$i]->c7,
                            'vektor' => round($dataArr[6], 9),
                            'bobot' => round(pow($nilai_kriteria[$i]->c7, ($dataArr[6])), 9)
                        );

                        $countVektor = $dataVektorC1['bobot'] * $dataVektorC2['bobot'] * $dataVektorC3['bobot'] * $dataVektorC4['bobot'] * $dataVektorC5['bobot'] * $dataVektorC6['bobot'] * $dataVektorC7['bobot'];

                        $dataVektorArr[] = array(
                            'vektor' => round($countVektor, 9),
                            // 'type_armada' => $nilai_kriteria[$i]->type_armada
                        );
                    }

                    $no=0;
                    foreach ($nilai_kriteria as $data) {
                        $no++;
                ?>
                    <tr>
                        <td><?=$no ?></td>
                        <td><?=$data->c1 ?></td>
                        <td><?=$data->c2 ?></td>
                        <td><?=$data->c3 ?></td>
                        <td><?=$data->c4 ?></td>
                        <td><?=$data->c5 ?></td>
                        <td><?=$data->c6 ?></td>
                        <td><?=$data->c7 ?></td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div> 
</div>

<?php
    $vektor = $dataVektorArr;
?>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Vektor
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable2" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    $countVektor=0;
                    $dataVektor = [];
                    $sumVektor = 0;
                    for ($ii=0; $ii < count($vektor); $ii++) { 
                        $sumVektor += $vektor[$ii]['vektor'];
                    }

                    foreach ($vektor as $key=>$data) { 
                        $no++;
                        $dataVektor[] = array(
                            'bobot' => round($data['vektor']/($sumVektor), 9)
                        );
                ?>
                    <tr>
                        <td><?=$no ?></td>
                        <td><?= round($data['vektor'], 9) ?></td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div> 
</div>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Normalisasi Vektor
    </div>
    <div class="card-block">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" id="dataTable2" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    $vektorMax=[];
                    foreach ($dataVektor as $data) { 
                        $no++;
                        $vektorMax[] += $data['bobot'];
                ?>
                    <tr>
                        <td><?=$no ?></td>
                        <td><?= round($data['bobot'], 9) ?></td>
                    </tr>
                <?php } ?> 
                </tbody>
            </table>
        </div>
    </div> 
</div>

<div>
    <h3 align="center">HASIL TERTINGGI VEKTOR <br><?= max($vektorMax) ?></h3>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah/Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <form class="form-armada" method="POST">
                <input type="hidden" id="action" name="action">
                <div class="modal-body">
                    <label for="">Nama Armada</label>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="type_armada" id="type_armada">
                        </div>
                    </div>
                    <label for="">Harga Beli</label>
                    <div class="row">
                        <div class="col">
                            <select class="form-control" name="kriteria_harga_beli" id="kriteria_harga_beli">
                                <option value="0">--Silahkan Pilih--</option>
                                <?php foreach($kriteria_harga_beli as $data): ?>
                                    <option data-id="<?= $data->keterangan ?>" value="<?= $data->id.'~'.$data->keterangan ?>"><?= $data->keterangan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Biaya Pajak Tahunan</label>
                            <input type="number" class="form-control" name="pajak_tahunan" id="pajak_tahunan">
                        </div>
                        <div class="col">
                            <label for="">Kriteria</label>
                            <select class="form-control" name="kriteria_pajak_tahunan" id="kriteria_pajak_tahunan">
                                <option value="0">--Silahkan Pilih--</option>
                                <?php foreach($kriteria_pajak_tahunan as $data): ?>
                                    <option value="<?= $data->id ?>"><?= $data->keterangan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Biaya Perawatan</label>
                            <input type="number" class="form-control" name="biaya_perawatan" id="biaya_perawatan">
                        </div>
                        <div class="col">
                            <label for="">Kriteria</label>
                            <select class="form-control" name="kriteria_biaya_perawatan" id="kriteria_biaya_perawatan">
                                <option value="0">--Silahkan Pilih--</option>
                                <?php foreach($kriteria_biaya_perawatan as $data): ?>
                                    <option value="<?= $data->id ?>"><?= $data->keterangan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Banyak Sewa</label>
                            <input type="number" class="form-control" name="banyak_sewa" id="banyak_sewa">
                        </div>
                        <div class="col">
                            <label for="">Kriteria</label>
                            <select class="form-control" name="kriteria_banyak_sewa" id="kriteria_banyak_sewa">
                                <option value="0">--Silahkan Pilih--</option>
                                <?php foreach($kriteria_banyak_sewa as $data): ?>
                                    <option value="<?= $data->id ?>"><?= $data->keterangan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Harga Sewa</label>
                            <input type="number" class="form-control" name="harga_sewa" id="harga_sewa">
                        </div>
                        <div class="col">
                            <label for="">Kriteria</label>
                            <select class="form-control" name="kriteria_harga_sewa" id="kriteria_harga_sewa">
                                <option value="0">--Silahkan Pilih--</option>
                                <?php foreach($kriteria_harga_sewa as $data): ?>
                                    <option value="<?= $data->id ?>"><?= $data->keterangan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Tonase</label>
                            <input type="number" class="form-control" name="tonase" id="tonase">
                        </div>
                        <div class="col">
                            <label for="">Kriteria</label>
                            <select class="form-control" name="kriteria_tonase" id="kriteria_tonase">
                                <option value="0">--Silahkan Pilih--</option>
                                <?php foreach($kriteria_tonase as $data): ?>
                                    <option value="<?= $data->id ?>"><?= $data->keterangan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Harga Jual</label>
                            <input type="number" class="form-control" name="harga_jual" id="harga_jual">
                        </div>
                        <div class="col">
                            <label for="">Kriteria</label>
                            <select class="form-control" name="kriteria_harga_jual" id="kriteria_harga_jual">
                                <option value="0">--Silahkan Pilih--</option>
                                <?php foreach($kriteria_harga_jual as $data): ?>
                                    <option value="<?= $data->id ?>"><?= $data->keterangan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm" id="submit">Submit</button>
                    <!-- <button type="button" class="btn btn-primary btn-sm" id="submit">Submit</button> -->
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="del_id" names="del_id">
                Apa Anda yakin ingin menghapus data ini?
            </div>
                
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm" id="deleteData">Hapus</button>
            </div>

        </div>
    </div>
</div>

<script src="<?=base_url()?>resources/vendor/jquery/jquery.min.js"></script>
<script>
    $('#deleteData').click(function() {
        const id = $('#del_id').val();
        
        $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Start/delete'); ?>',
            data: {id: id}
        })
        .done(function(data) {
            window.location.reload();
        })
    });

    $('.form-armada').submit(function(e) {
        const id = $('#action').val();
        const data = $(this).serialize();
        let actionUrl = '<?php echo base_url('Start/add'); ?>';
        if (id) {
            actionUrl = '<?php echo base_url('Start/update'); ?>';
        }
        
        $.ajax({
            method: 'POST',
            url: actionUrl,
            data: data
        })
        .done(function(data) {
            window.location.reload();
        })
        
        e.preventDefault();
    });

    function getDetail(id) {
        $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Start/getDtlData'); ?>',
            data: {id: id}
        })
        .done(function(response) {
            const data = jQuery.parseJSON(response);
            const dataArmada = data.armada;
            const dataNilaiKriteria = data.nilai_kriteria;
            $('#action').val(dataArmada.id);

            $('#type_armada').val(dataArmada.type_armada);
            $('#kriteria_harga_beli option[value="'+dataNilaiKriteria.c1+'~'+dataArmada.harga_beli+'"]').attr('selected','selected');

            $('#pajak_tahunan').val(dataArmada.biaya_pajak_tahunan);
            $('#kriteria_pajak_tahunan option[value='+dataNilaiKriteria.c2+']').attr('selected','selected');

            $('#biaya_perawatan').val(dataArmada.biaya_perawatan);
            $('#kriteria_biaya_perawatan option[value='+dataNilaiKriteria.c3+']').attr('selected','selected');

            $('#banyak_sewa').val(dataArmada.banyak_sewa);
            $('#kriteria_banyak_sewa option[value='+dataNilaiKriteria.c4+']').attr('selected','selected');

            $('#harga_sewa').val(dataArmada.harga_sewa);
            $('#kriteria_harga_sewa option[value='+dataNilaiKriteria.c5+']').attr('selected','selected');

            $('#tonase').val(dataArmada.tonase);
            $('#kriteria_tonase option[value='+dataNilaiKriteria.c6+']').attr('selected','selected');

            $('#harga_jual').val(dataArmada.harga_jual);
            $('#kriteria_harga_jual option[value='+dataNilaiKriteria.c7+']').attr('selected','selected');
        })
    };

    function getID(id) {
        $('#del_id').val(id);
    };

    // function deleteData() {
    //     console.log('id delete');
    //     const id = $('#del_id').val();
    //     console.log('id', id);
    //     // return false;
    //     // $.ajax({
    //     //     method: 'POST',
    //     //     url: <?php //echo base_url('Start/delete'); ?>,
    //     //     data: {id: id}
    //     // })
    //     // .done(function(data) {
    //     //     window.location.reload();
    //     // })
    // };
</script>