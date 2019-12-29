<?php
    defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<!-- Breadcrumbs -->
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
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kriteria</th>
                        <th>Keterangan</th>
                        <th>Bobot</th>
                    </tr>
                </tfoot>
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
                <?php } //echo "sum ".$sum." "; print_r($dataArr); ?> 
                </tbody>
            </table>
        </div>
    </div> 
</div>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Data Armada
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
                    </tr>
                </thead>
                <tfoot>
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
                    </tr>
                </tfoot>
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
                <?php } //echo "pangkat ". round(pow(1,-0.129032258), 9);//round(pow(6,-0.161290323), 9);?> 
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
                    // for ($i=0; $i < count($dataArr); $i++) { 
                    //     $countIndex = $i + 1;
                    //     $cIndex = 'c'.$countIndex;

                    //     $dataVektorArr[] = array(
                    //         $cIndex => $nilai_kriteria[$i]->$cIndex,
                    //         'bobot' => round($dataArr[$i], 9)
                    //     );
                    // }

                    // round(pow(1,-0.129032258), 9);

                    for ($i=0; $i < count($nilai_kriteria); $i++) { 
                        $countIndex = $i + 1;
                        $cIndex = 'c'.$countIndex;

                        $dataVektorC1 = array(
                            'c1' => $nilai_kriteria[$i]->c1,
                            'vektor' => round($dataArr[0], 9),
                            'bobot' => round(pow($nilai_kriteria[$i]->c1, -($dataArr[0])), 9),
                        );
                        $dataVektorC2 = array(
                            'c2' => $nilai_kriteria[$i]->c2,
                            'vektor' => round($dataArr[1], 9),
                            'bobot' => round(pow($nilai_kriteria[$i]->c1, -($dataArr[1])), 9)
                        );
                        $dataVektorC3 = array(
                            'c3' => $nilai_kriteria[$i]->c3,
                            'vektor' => round($dataArr[2], 9),
                            'bobot' => round(pow($nilai_kriteria[$i]->c1, -($dataArr[2])), 9)
                        );
                        $dataVektorC4 = array(
                            'c4' => $nilai_kriteria[$i]->c4,
                            'vektor' => round($dataArr[3], 9),
                            'bobot' => round(pow($nilai_kriteria[$i]->c1, -($dataArr[3])), 9)
                        );
                        $dataVektorC5 = array(
                            'c5' => $nilai_kriteria[$i]->c5,
                            'vektor' => round($dataArr[4], 9),
                            'bobot' => round(pow($nilai_kriteria[$i]->c1, -($dataArr[4])), 9)
                        );
                        $dataVektorC6 = array(
                            'c6' => $nilai_kriteria[$i]->c6,
                            'vektor' => round($dataArr[5], 9),
                            'bobot' => round(pow($nilai_kriteria[$i]->c1, -($dataArr[5])), 9)
                        );
                        $dataVektorC7 = array(
                            'c7' => $nilai_kriteria[$i]->c7,
                            'vektor' => round($dataArr[6], 9),
                            'bobot' => round(pow($nilai_kriteria[$i]->c1, -($dataArr[6])), 9)
                        );

                        $countC1 = $dataVektorC1['bobot'] * $dataVektorC2['bobot'] * $dataVektorC3['bobot'] * $dataVektorC4['bobot'] * $dataVektorC5['bobot'] * $dataVektorC6['bobot'] * $dataVektorC7['bobot'];

                        $dataVektorArr[] = array(
                            'c1' => $countC1,
                            'c2' => $dataVektorC2,
                            'c3' => $dataVektorC3,
                            'c4' => $dataVektorC4,
                            'c5' => $dataVektorC5,
                            'c6' => $dataVektorC6,
                            'c7' => $dataVektorC7,
                        );
                    }
                    // echo "<pre>";
                    // print_r($dataVektorArr);die;

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
    $vektor = [
        0.680542545,
        0.70964339,
        0.799729922,
        1.402230072,
        1.257942192,
        0.888846845,
        0.603178437,
        1.297190467,
        1.061870147,
        0.663602826,
        0.878265555,
        0.921525545,
        0.721324972
    ];
?>

<!-- <div class="row">
    <div class="col-md-6">test</div>
    <div class="col-md-6">test</div>
</div> -->

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
                    foreach ($vektor as $data) { 
                        $countVektor += $data;
                    }

                    foreach ($vektor as $data) { 
                        $no++;
                        $dataVektor[] = array('bobot' => $data/$countVektor);
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

                    foreach ($dataVektor as $data) { 
                        $no++;
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
<h1 align="center">Laporan Penilaian</h1>
  <table border=1 class="table table-bordered table-striped" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Nilai</th>
        <th>Ranking</th>
      </tr>
    </thead>
    <tbody>
    <?php
        $data = $dataVektor; 
        $nilai = array();
        foreach ($data as $idx => $dataInd) {
          $nilai[$dataInd['bobot']] = $dataInd['bobot'];
        }
        
        rsort($nilai);
        
        foreach ($data as $idx => $dataInd) {
          $data[$idx]['rank'] = array_search($dataInd['bobot'], $nilai) + 1; 
        }

        $no=0;
        
        foreach($data as $value) {
            $no++;
          $color = "";
            if ($value['rank'] == 1) {
              $color = "style='background-color: #3c8dbc; color: white; font-weight: bold;opacity: 0.5;'";
            }
          ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $value['bobot']; ?></td>
            <td <?php echo $color ?> ><?php echo $value['rank']; ?></td>
          </tr>
          <?php
        }
    ?>
    </tbody>
  </table>
</div>