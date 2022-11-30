<!DOCTYPE html>
<html>
<head>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            background: url("https://i1-dulich.vnecdn.net/2022/09/14/5-1663171484.jpg?w=0&h=0&q=100&dpr=2&fit=crop&s=sj1OXpFIUG3qUbuBQ-zCrg");
            background-position: center;
            background-size: 100%;
        }

        .wrapper {
            max-width: 900px;
            margin: 20px auto;
            text-align: center;
            font-weight: bold;
        }


        h3, h1 {
            text-align: center;
            margin-bottom: 30px;
            color: coral;
        }

        h5 {
            color: green;
            padding-bottom: 10px;
        }

        .col-6 {
            display: inline-block;
        }

        td, th {
            padding: 2px 16px;
        }

        table, th, td {
            /*border: 1px solid coral;*/
            /*border-collapse: collapse;*/
        }

        table{
            color: white;
            width: 700px;
            padding: 10px;
            background-image: linear-gradient(120deg, #000 , #F9C5D1);
            opacity: 0.9;

        }

        form input, form select {
            width: 100%;
            outline-width: 0;
            border: 1px solid coral;
        }

        .text-red {
            color: red;
        }

        .text-center {
            text-align: center;
        }


        button, input[type=submit], .buttonCss {
            border: none;
            background: coral;
            color: white;
            padding: 2px 8px;
        }

        input[type=submit] {
            width: 100px;
        }

        a {
            color: coral;
            text-decoration: none;
            padding: 2px 8px;
            display: inline-block;
            border: 1px solid coral;
        }
    </style>
</head>

<body>


<?php


$conn = mysqli_connect('localhost', 'root', '', 'mphone') or die ('Không thể kết nối tới database');


function laytatcadulieu($conn)
{
    $data = array();
    $sql1 = "select * from phone";
    
    $query1 = mysqli_query($conn, $sql1);
    if ($query1) {
        while ($row = mysqli_fetch_assoc($query1)) {
            $data[] = $row;
        }
    }
    return $data;
}

$data = laytatcadulieu($conn);

mysqli_close($conn);

?>

<div class="wrapper">
    <h1>DATA</h1>
    <div class="col-6">
        <table>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Function</td>
                <td>Price</td>
                <td>Category</td>
                <td>Detail</td>
            </tr>

           
            <?php foreach ($data as $item) { ?>
                <tr>

                    <td><?php echo $item['IDPhone']; ?></td>
                    <td><?php echo $item['Pname']; ?></td>
                    <td><?php echo $item['Pfunction']; ?></td>
                    <td><?php echo $item['Price']; ?></td>
                    <td><?php echo $item['Category']; ?></td>
                    <td><a target="_blank" href="detail.php">xem chi tiet</a></td>
                </tr>
            <?php } ?>
            
        </table>

    </div>
</div>

<div>
    <a class="buttonCss" href="/">Back</a>
</div>


<script >

    function validateForm(){
        if (document.getElementById("Pname").value == "") {
            alert("Pname khong duoc de trong");
            return false;
        }

        if (document.getElementById("Pfunction").value == "") {
            alert("Pfunction khong duoc de trong");
            return false;
        }

        if (document.getElementById("Price").value == "") {
            alert("Price khong duoc de trong");
            return false;
        }

        if (document.getElementById("Category").value == "") {
            alert("Category khong duoc de trong");
            return false;
        }

    }

</script>

</body>
</html>
