<!DOCTYPE html>
<html>
<head>
    <title>Freetuts.net - xử lý form với POST</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .wrapper {
            max-width: 900px;
            margin: 20px auto;
            display: flex;
        }

        h3 {
            text-align: center;
            padding-bottom: 10px;
        }

        h5 {
            color: green;
            padding-bottom: 10px;
        }

        .col-6 {
            flex: 1;
        }

        td, th {
            padding: 2px 16px;
        }

        table, th, td {
            border: 1px solid coral;
            border-collapse: collapse;
        }

        form input {
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

        button, input[type=submit] {
            border: none;
            background: coral;
            color: white;
            padding: 2px 8px;
        }

        input[type=submit] {
            width: 100px;
        }

        a {
            text-decoration: none;
            padding: 2px 8px;
            display: inline-block;
            border: 1px solid coral;
        }
    </style>
</head>

<body>

<?php
//thực hiện kết nối

$conn = mysqli_connect('localhost', 'root', '654321', 'may3') or die ('Không thể kết nối tới database');
$data = laytatcadulieu($conn);
$dataCompany = laytatcadulieuCompany($conn);
// Câu truy vấn lấy tất cả phone
function laytatcadulieu($conn)
{
    $data = array();
    $sql1 = "select * from phone";
    // Thực hiện câu truy vấn
    $query1 = mysqli_query($conn, $sql1);
    if ($query1) {
        while ($row = mysqli_fetch_assoc($query1)) {
            $data[] = $row;
        }
    }
    return $data;
}

function laytatcadulieuCompany($conn)
{
    $data = array();
    $sql1 = "select * from company";
    // Thực hiện câu truy vấn
    $query1 = mysqli_query($conn, $sql1);
    if ($query1) {
        while ($row = mysqli_fetch_assoc($query1)) {
            $data[] = $row;
        }
    }
    return $data;
}

if (isset($_POST['add_phone'])) {

//     Lay data
    $Pname = isset($_POST['Pname']) ? $_POST['Pname'] : '';
    $Pfunction = isset($_POST['Pfunction']) ? $_POST['Pfunction'] : '';
    $Price = isset($_POST['Price']) ? $_POST['Price'] : '';
    $Category = isset($_POST['Category']) ? $_POST['Category'] : '';
    $Detail = isset($_POST['Detail']) ? $_POST['Detail'] : '';

    // Câu SQL Insert

    $sql = "INSERT INTO phone (Pname, Pfunction, Price, Category, Detail)
        VALUES ('$Pname','$Pfunction','$Price', '$Category', '$Detail') ";

    // Thực hiện câu truy vấn
    $query = mysqli_query($conn, $sql);
    $data = laytatcadulieu($conn);
    mysqli_close($conn);
}


?>


<div class="wrapper">
    <div class="col-6">

        <form action="index.php" method="post" onsubmit="return validateForm()">
            <table>

                <tr>
                    <td>
                        <label>Pname</label>
                    </td>
                    <td>
                        <input type="text" id="Pname" name="Pname" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Pfunction</label>
                    </td>
                    <td>
                        <input type="text" id="Pfunction" name="Pfunction" >
                    </td>
                </tr>


                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="number" id="Price" name="Price" >
                    </td>
                </tr>


                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <input type="text" id="Category" name="Category" >
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Company</label>
                    </td>
                    <td>
                        <select name="pty_select" >
                            <?php foreach($dataCompany as $key => $value){ ?>
                                <option value="<?php echo $value['IDCompany'];?>"><?php echo $value['CName'];  ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Detail</label>
                    </td>
                    <td>
                        <input type="text" id="Detail" name="Detail" >
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="text-center">
                        <input type="submit" name="add_phone" value="Submit" />
                    </td>
                </tr>

            </table>

        </form>

    </div>
    <div class="col-6">
        <table>
            <tr>
                <td>IDPhone</td>
                <td>Pname</td>
                <td>Pfunction</td>
                <td>Price</td>
                <td>Category</td>
                <td>Detail</td>
            </tr>


            <?php foreach ($data as $item) { ?>
                <tr>

                    <td><?php echo $item['IDPhone']; ?></td>
                    <td><?php echo $item['Pname']; ?></td>
                    <td><?php echo $item['Pfunction']; ?></td>
                    <td><?php echo $item['Category']; ?></td>
                    <td><?php echo $item['Price']; ?></td>
                    <td><a target="_blank" href="<?php echo $item['Detail']; ?>"><?php echo $item['Detail']; ?></a></td>
                </tr>
            <?php } ?>
        </table>

    </div>
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
        if (document.getElementById("Detail").value == "") {
            alert("Detail khong duoc de trong");
            return false;
        }
    }

</script>
</body>
</html>
