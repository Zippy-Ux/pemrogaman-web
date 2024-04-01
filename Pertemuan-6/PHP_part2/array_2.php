<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
        $Dosen = [
            'nama' => 'Elok Nur Hamdana',
            'domisili' => 'Malang',
            'jenis_kelamin' => 'Perempuan'
        ];
    ?>

    <h2>Data Dosen</h2>
    <table>
        <tr>
            <th>Field</th>
            <th>Nilai</th>
        </tr>
        <?php foreach ($Dosen as $field => $nilai): ?>
            <tr>
                <td><?php echo $field; ?></td>
                <td><?php echo $nilai; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
