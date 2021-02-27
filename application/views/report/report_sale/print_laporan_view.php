<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <thead>
        <tr>
            <th>#</th>
            <th>Invoice</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Discount</th>
            <th>Grand Total</th>
            <th>Detail</th>
        
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        foreach($row as $key=> $data){
         ?>
        <tr>
            <td style="width: 5%;"><?=$no++?>.</td>
            <td><?=$data->invoice?></td>
            <td><?=$data->date?></td>
            <td><?=$data->customer_name?></td>
            <td><?=$data->total_price?></td>
            <td><?=$data->discount?></td>
            <td><?=$data->final_price?></td>
            <td><?=$data->note?></td>
        </tr>
       
        <?php } ?>
        </tbody>
    </table>
</body>
</html>