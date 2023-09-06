<?php
    include("connection.php");

    $prodId = $_REQUEST['id'];

    $query = "SELECT * FROM products WHERE id=$prodId";
    $search = $connect->query($query);
    $resSearch = $search->fetch_object();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/img/little-logo.png">
    <link rel="stylesheet" href="./assets/css/prod-info.css">
    <title>Dom of Music - Home</title>
</head>
<body>
    <!-- DESKTOP HEADER -->
    <header class="flex-colum-center">
        <div class="top-header flex-row-space-between space">
            <div id="button-logo" class="logo flex-row-center">
                <img src="./assets/img/big-logo.png" alt="">
            </div>
    
            <nav class="desktop-menu flex-row-space-around">
                <a class="transform-in-button" href="">
                    <img src="./assets/img/wpp-logo.png" alt=""> Atendimento
                </a>
            </nav>
    
            <div id="menu-hamburguer" class="menu-hamburguer flex-column-center">
                <div id="top" class="line"></div>
                <div id="mid" class="line"></div>
                <div id="fut" class="line"></div>
            </div>  
        </div>
        
        <div class="fut-header flex-center">
            <nav style="padding-top: 7px; padding-bottom: 7px;" class="flex-row-space-between space">
                <a href="./prod-view.php?brand=null&category=acustic_guitar&order=0" class="default-category">
                    Violões
                </a>

                <a href="./prod-view.php?brand=null&category=guitar&order=0" class="default-category">
                    Guitarras
                </a>

                <a href="./prod-view.php?brand=null&category=keyboard_instruments&order=0" class="default-category">
                    Instrumentos de Teclas
                </a>

                <a href="./prod-view.php?brand=null&category=drums&order=0" class="default-category">
                    Baterias
                </a>

                <a href="./prod-view.php?brand=null&category=accessories&order=0" class="default-category">
                    Acessórios
                </a>
            </nav>
        </div>
    </header>

    <!-- MOBILE HEADER -->
    <header class="mobile-header flex-row-right">
        <nav id="mobile-menu" class="mobile-menu flex-column-center menu-hidden">
            <div class="width-100 flex-row-right">
                <div style="background-color: #000; color: #FFF;" id="close-menu" class="close transform-in-button flex-row-center">
                    X
                </div>
            </div>

            <a class="transform-in-button width-100" href="">
                <img src="./assets/img/wpp-logo.png" alt=""> Atendimento
            </a>

            <p style="width: 100%; background-color: #868686; padding: 1px; margin: 5px 0;"></p>

            <a href="./prod-view.php?brand=null&category=acustic_guitar&order=0" class="transform-in-button flex-row-center width-100">
                Violões
            </a>

            <a href="./prod-view.php?brand=null&category=guitar&order=0" class="transform-in-button flex-row-center width-100">
                Guitarras
            </a>

            <a href="./prod-view.php?brand=null&category=keyboard_instruments&order=0" class="transform-in-button flex-row-center width-100">
                Instrumentos de Teclas
            </a>

            <a href="./prod-view.php?brand=null&category=drums&order=0" class="transform-in-button flex-row-center width-100">
                Baterias
            </a>

            <a href="./prod-view.php?brand=null&category=accessories&order=0" class="transform-in-button flex-row-center width-100">
                Acessórios
            </a>
        </nav>
    </header>

    <!-- ALL CONTENT -->
    <main class="flex-colum-center width-100">        
        <section class="prod-presentation flex-row-space-between">
            <div class="prod-container flex-row-center">
                <img src="<?php print $resSearch->img_url; ?>" alt="">
            </div>

            <div class="price-infos flex-column-left width-100">
                <h1><?php print $resSearch->prod_name; ?></h1>
                <p class="price">R$ <?php print $resSearch->prod_price; ?></p>
                <p class="price-desc">10x de R$ <?php print $resSearch->parcel_price; ?></p>
                <p class="price-desc">R$ <?php print $resSearch->prod_price; ?> no Boleto Bancário</p>
                <p class="price-desc">R$ <?php print $resSearch->prod_price; ?> no Pix</p>
                <input id="buy" class="buy-button" type="button" value="Verificar Disponibilidade">                    
                <p class="division-line"></p>                            
            </div>
        </section>
        
        <section class="description flex-column-left space">
            <h1 style="margin-bottom: 50px;" class="mid-title flex-row-left">Descrição</h1>
            <p class="desc-summary">
<?php print nl2br($resSearch->prod_desc); ?>
            </p>
            
            <h1 style="margin: 30px 0;" class="mid-title flex-row-left">Especificações</h1>

            <p class="especs">
<?php print nl2br($resSearch->prod_specs); ?>
            </p>
        </section>

        <h1 style="margin-bottom: 50px;" class="mid-title width-100 flex-row-center space">Produtos Semelhantes</h1>

        <?php 
            $simQuery = "SELECT * FROM products WHERE prod_category='$resSearch->prod_category' AND id!=$resSearch->id";
            $similar = $connect->query($simQuery);
            $resSim = $similar->num_rows;
        ?>

        <section class="other-prods flex-row-center">

            <?php if ($resSim == 0) { ?>

            <a href="./prod-info.html" class="prod flex-colum-center">
                <img src="./assets/img/guitar.jpg" alt="">
                <p class="prod-title">Guitarra Strinberg SGS250 Sunburst</p>
                <h3 class="price">R$ 1899,99</h3>
                <p class="price-desc">10x de 209,99</p>
            </a>
            
            <a href="./prod-info.html" class="prod flex-colum-center">
                <img src="./assets/img/guitar.jpg" alt="">
                <p class="prod-title">Guitarra Strinberg SGS250 Sunburst</p>
                <h3 class="price">R$ 1899,99</h3>
                <p class="price-desc">10x de 209,99</p>
            </a>

            <a href="./prod-info.html" class="prod flex-colum-center">
                <img src="./assets/img/guitar.jpg" alt="">
                <p class="prod-title">Guitarra Strinberg SGS250 Sunburst</p>
                <h3 class="price">R$ 1899,99</h3>
                <p class="price-desc">10x de 209,99</p>
            </a>

            <a href="./prod-info.html" class="prod flex-colum-center">
                <img src="./assets/img/guitar.jpg" alt="">
                <p class="prod-title">Guitarra Strinberg SGS250 Sunburst</p>
                <h3 class="price">R$ 1899,99</h3>
                <p class="price-desc">10x de 209,99</p>
            </a>

            <a href="./prod-info.html" class="prod flex-colum-center">
                <img src="./assets/img/guitar.jpg" alt="">
                <p class="prod-title">Guitarra Strinberg SGS250 Sunburst</p>
                <h3 class="price">R$ 1899,99</h3>
                <p class="price-desc">10x de 209,99</p>
            </a>

            <?php } else { while($showSimilars = $similar->fetch_object()) { ?>
                <a href="./prod-info.php?id=<?php print $showSimilars->id; ?>" class="prod flex-colum-center">
                    <img src="<?php print $showSimilars->img_url; ?>" alt="">
                    <p class="prod-title"><?php print $showSimilars->prod_name; ?></p>
                    <h3 class="price">R$ <?php print $showSimilars->prod_price ?></h3>
                    <p class="price-desc">10x de <?php print $showSimilars->parcel_price ?></p>
                </a>
            <?php }} ?>
        </section>       
    </main>

    <footer class="space flex-row-space-between">
        <div class="fut-infos flex-column-left width-100">
            <img src="./assets/img/big-logo.png" alt="">
            <p>&copy;2023.2 - Dom of Music</p>
            <p>Developed by <a href="https://github.com/DerickCarvalho">Derick Carvalho</a></p>
        </div>

        <?php
            if (isset($_POST['sugest'])) {
                $user_name = $_POST['name'];
                $user_sugest = $_POST['text_sugest'];

                if ($user_name != "" && $user_sugest != "") {
                    $sugQuery = "INSERT INTO sugests (user_name, user_sugest, status) VALUES ('$user_name','$user_sugest', 0)";
                    try {
                        $cadSugest = $connect->query($sugQuery);
                        print "<script>alert('Agradecemos sua sugestão!');</script>";
                    } catch (\Throwable $th) {
                        print "<script>alert('Não foi possível cadastrar sua sugestão!');</script>";
                    }
                } else {
                    print "<script>alert('Campos vazios não são permitidos!');</script>";
                }
            }
        ?>

        <form class="sugest-form flex-column-center" action="" method="post">
            <h3>Envie-nos uma sugestão</h3>
            <input type="text" name="name" id="name" placeholder="Digite seu nome" maxlength="30" required maxlength="30">
            <textarea name="text_sugest" id="text_sugest" cols="30" rows="5" placeholder="Digite sua sugestão" required maxlength="400"></textarea>
            <input style="width: 30%;" class="default-button" name="sugest" type="submit" value="Enviar">
        </form>
    </footer>
    <script>
        /* MENU HAMBURGUER FUNCIONALITY */
        let mobileMenu = document.getElementById('mobile-menu');

        document.getElementById('menu-hamburguer').addEventListener('click', () => {
                mobileMenu.classList.remove('menu-hidden');
        });

        document.getElementById('close-menu').addEventListener('click', () => {
            mobileMenu.classList.add('menu-hidden');
        });

        /* GENERAL FUNCIONALITY */
        document.getElementById('button-logo').addEventListener('click', () => {
            window.location.href = './index.php';
        });

        <?php
            $adminSearch = "SELECT * FROM adm_info WHERE first_adm=1";
            $exeAdmSearch = $connect->query($adminSearch);
            $loadAdmResults = $exeAdmSearch->fetch_object();
        ?>

        /* BUY BUTTOM */
        document.getElementById('buy').addEventListener('click', () => {
            location.href = 'https://api.whatsapp.com/send/?phone=55<?php print $loadAdmResults->cell_number; ?>&text=Vim através site Dom of Music, e gostaria de saber a disponibilidade do <?php print $resSearch->prod_name; ?>!&type=phone_number&app_absent=0';
        });
    </script>
</body>
</html>