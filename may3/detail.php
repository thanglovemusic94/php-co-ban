<!DOCTYPE html>
<html>
<head>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }



        .wrapper {
            max-width: 900px;
            margin: 20px auto;

        }

        .content{
            display: flex;
            text-align: center;
            justify-content: space-around;
        }
        .image{
            height: 200px;
            width: 200px;
            padding: 10px;
            border: 3px solid pink;
            border-radius: 10px;
            box-shadow: 5px 5px lightgrey;
        }

        .image img{
            height: 100%;
            width: 100%;
            border-radius: 10px;
        }

        .image:hover{
            box-shadow: 5px 5px cadetblue;
            background: darkseagreen;
        }

        h3, h1 {
            text-align: center;
            margin-bottom: 30px;
            color: coral;
        }

        .buttonCss {
            border: none;
            background: coral;
            color: white;
            padding: 2px 8px;
        }


    </style>
</head>

<body>


<div class="wrapper">
    <h1>DETAIL</h1>
    <div class="content">
        <div class="image">
            <img src="https://cdn.tgdd.vn/Products/Images/42/262650/samsung-galaxy-a23-cam-thumb-600x600.jpg" alt="">
        </div>
        <div class="image">
            <img src="https://cdn.tgdd.vn/Products/Images/42/274360/samsung-galaxy-a13-xanh-thumb-1-600x600.jpg" alt="">
        </div>
        <div class="image">
            <img src="https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(5):fill(white)/fptshop.com.vn/Uploads/Originals/2021/8/22/637652436818507220_samsung-a03s-den-1.jpg" alt="">
        </div>
    </div>



</div>

<div>
    <a class="buttonCss" href="/table.php">Back</a>
</div>
</body>
</html>
