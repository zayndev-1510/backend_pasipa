<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ public_path('assets/css/bootstrap.min.css') }}" media="screen">
    <title>Data Transkip Nilai Mahasiswa</title>
</head>
<style>
    .td-10{
        width: 10%;
    }
    .td-25 {
        width: 25%;
    }

    .td-50 {
        width: 50%;
    }

    .td-75 {
        width: 75%;
    }

    .td-100 {
        width: 100%;
    }
</style>

<body>

    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <tr>
                    <td class="td-10">
                        <img src="{{ public_path('other/logo.jpg') }}" style="width: 70px;height:70px;">
                    </td>
                    <td class="td-100">
                        <p style="text-align: center;font-style: bold;">UNIVERSITAS DAYANU IKSHANUDDIN</p>
                        <p style="text-align: center;font-style: bold;margin-top: -20px;">FAKULTAS TEKNIK</p>
                        <p style="text-align: center;font-style: bold;margin-top: -20px;">PROGRAM STUDI TEKNIK INFORMATIKA</p>
                    </td>
                </tr>
            </table>

                <hr style="border: 2px solid black;width: 100%;margin-top: -20px;"></hr>
            <h3 style="text-align: center;font-size: 20px;">TRANSKIP AKADEMIK</h3>
        </div>
        <div class="col-12" style="margin-top: 50px;">
            <table class="table table-bordered">
                <thead class="bg-light" style="font-size: 12px;">
                    <tr style="text-align: center;">
                        <th>No</th>
                        <th>Matakuliah</th>
                        <th>Grade</th>
                        <th>Nilai</th>
                        <th>SKS</th>
                        <th>Nilai * SKS</th>
                    </tr>
                </thead>
            </table>
            <table class="table table-bordered">

                <tbody>
                    <tr>
                        <td style="text-align: right;" colspan="6">
                            <p style="">Ketua Program Studi</p>
                            <p style="margin-top: 80px;">Ery Muchyar S.Kom., M.Kom</p>
                            <hr>
                            <p style="margin-top: -30px;">NIDN. 0910096701</p>
                        </td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>

    <script></script>
</body>

</html>
