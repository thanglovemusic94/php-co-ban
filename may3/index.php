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
            background: url("https://data.webnhiepanh.com/wp-content/uploads/2020/11/12095508/puzzle-cube-floating-with-shadow-pink-background.jpg");
            background-position: center;
            background-size: cover;
        }
        .wrapper {
            max-width: 900px;
            margin: 20px auto;
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
            width: 500px;
            padding: 10px;
            background-image: linear-gradient(120deg, #000 , #F9C5D1);
            opacity: 0.9;
        }

        label{
            text-align: left;
        }

        form input, form select {
            width: 100%;
            outline-width: 0;
            border: 1px solid coral;
            line-height: 30px;
            background: transparent;
            color: white;
        }

        tr>td{
            text-align: left;
        }



        .text-red {
            color: red;
        }

        .text-center {
            text-align: center;
        }

        form input, select{
            margin: 10px;
            text-align: center;
        }

        select{
           padding: 8px 0;
        }

        option {
            background: coral;
        }

        button, input[type=submit], .buttonCss {
            border: none;
            background: coral;
            color: white;
            padding: 2px 8px;
        }

        input[type=submit] {
            margin-top: 30px;
            width: 100px;
        }

        a {
            text-decoration: none;
            padding: 2px 8px;
            display: inline-block;
            border: 1px solid coral;
        }

        form{
            display: inline-block;
        }
    </style>
</head>

<body>

<?php

$conn = mysqli_connect('localhost', 'root', '', 'mphone') or die ('Không thể kết nối tới database');


function laytatcadulieuCompany($conn)
{
    $data = array();
    $sql1 = "select * from company";
    
    $query1 = mysqli_query($conn, $sql1);
    if ($query1) {
        while ($row = mysqli_fetch_assoc($query1)) {
            $data[] = $row;
        }
    }
    return $data;
}

$dataCompany = laytatcadulieuCompany($conn);


if (isset($_POST['add_phone'])) {


    $IDPhone = isset($_POST['IDPhone']) ? $_POST['IDPhone'] : '';
    $Pname = isset($_POST['Pname']) ? $_POST['Pname'] : '';
    $Pfunction = isset($_POST['Pfunction']) ? $_POST['Pfunction'] : '';
    $Price = isset($_POST['Price']) ? $_POST['Price'] : '';
    $Category = isset($_POST['Category']) ? $_POST['Category'] : '';

   

    $sql = "INSERT INTO phone (IDPhone, Pname, Pfunction, Price, Category)
        VALUES ('$IDPhone','$Pname','$Pfunction','$Price', '$Category') ";

    
    $query = mysqli_query($conn, $sql);

    
    header("location: /");

    
    mysqli_close($conn);
}

?>


<div class="wrapper">
    <h1>PRODUCT</h1>
    <div class="col-6 text-center">

        <form action="index.php" method="post" onsubmit="return validateForm()">
            <table>

                <tr>
                   <td>
                        <label>ID</label>
                    </td>
                   <td>
                        <input type="text" id="IDPhone" name="IDPhone" >
                    </td>
               </tr>

                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>

                        <input type="text" id="Pname" name="Pname" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Function</label>
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
                    <td colspan="2" class="text-center">
                        <input type="submit" name="add_phone" value="Submit" />
                    </td>
                </tr>

            </table>

        </form>

    </div>

</div>

<div>
    <a class="buttonCss" href="table.php" target="_blank">Check List</a>
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
