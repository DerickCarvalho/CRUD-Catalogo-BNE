<?php
    include("connection.php");

    $admId = $_REQUEST['id'];
    $action = $_REQUEST['action'];

    if ($action == 'add') {
        $prodName = $_REQUEST['name'];
        $prodImg = $_REQUEST['url_img'];
        $prodBrand = $_REQUEST['brand'];
        $prodCategory = $_REQUEST['category'];
        $prodSpecs = $_REQUEST['specs'];
        $prodDesc = $_REQUEST['desc'];
        $prodPrice = floatval($_REQUEST['price']);
        $parcelPrice = floatval($_REQUEST['parcel_price']);

        $queryAddProd = "INSERT INTO products(prod_name, img_url, prod_price, parcel_price, prod_category, brand, prod_specs, prod_desc)
                        VALUES ('$prodName','$prodImg','$prodPrice','$parcelPrice','$prodCategory','$prodBrand','$prodSpecs','$prodDesc')";
            
        try {
            $exeProdAdd = $connect->query($queryAddProd);
            print "<script>alert('Produto adicionado com sucesso!');";
            print "location.href='./adm-page.php?id=$admId&page=add-products'</script>";
        } catch (\Throwable $th) {
            print "<script>alert('Problema ao adicionar o produto... Caso tenha utilizado virgula na declaração de valores, tente utilizar ponto!');";
            print "location.href='./adm-page.php?id=$admId&page=add-products'</script>";
        }
    } else {
        $confirmation = $_REQUEST['confirm'];
        $prodId = $_REQUEST['prod_id'];

        if($confirmation != false) {
            $queryDeleteProd = "DELETE FROM products WHERE id=$prodId";

            print $confirmation;

            try {
                $exeDelProd = $connect->query($queryDeleteProd);
                print "<script>alert('Produto deletado com sucesso!');";
                print "location.href='./adm-page.php?id=$admId&page=view-products'</script>";
            } catch (\Throwable $th) {
                print "<script>alert('Problema ao deletar o produto...');";
                print "location.href='./adm-page.php?id=$admId&page=view-products'</script>";
            }
        } else {
            print "<script>";
            print "let confirmation = confirm('Deseja realmente excluir este produto?');";
            print "if(confirmation == false) {location.href='./adm-page.php?id=$admId&page=view-products'}";
            print "else {location.href='./add-product.php?confirm='+confirmation+'&prod_id=$prodId&id=$admId'}";
            print "</script>";
        }
    }
?>