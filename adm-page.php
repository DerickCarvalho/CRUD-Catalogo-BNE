<?php 
    include("connection.php"); 

    $pageToShow = $_REQUEST['page'];
    $adm_id = base64_decode($_REQUEST['id']);
    $initialQuery = "SELECT * FROM adm_info WHERE id=$adm_id";
    $exeQuery = $connect->query($initialQuery);
    $resUserInfo = $exeQuery->fetch_object();
?>

<?php if($resUserInfo->first_adm == 1) { ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./assets/img/little-logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/adm.css">
        <title>Dom of Music - ADM</title>
    </head>
    <body>
        <header class="flex-row-space-between space">
            <img src="./assets/img/big-logo.png" alt="">
            <a class="link-as-pic flex-row-space-between" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=profile">
                <p style="margin: 0 10px;" class="profile-name"><?php print $resUserInfo->usu_name; ?></p>
                <img class="profile-pic" src="<?php print $resUserInfo->profile_img ?>" alt="">
            </a>
        </header>    

        <?php if($pageToShow == 'profile') { ?>
            <main class="flex-row-left-top">
                <section style="width: 20%;" class="menu-aside">
                    <nav class="flex-column-left">                
                        <a style="padding: 20px 0;" class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=home"><img src="https://simpleicon.com/wp-content/uploads/dashboard.png" alt=""> Dashboard</a>
                        <p class="line"></p>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=all-sugests"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Todas as Sugestões</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=noread"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Sugestões Não Lidas</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Adicionar Produtos</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Visualizar Produtos</a>
                        <a class="adm-category flex-row-center" href="./index.php"><img src="https://www.jacui.mg.leg.br/imagens/site.png/image_preview" alt="">Ver site principal</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-adm"><img src="./assets/img/profile-adm.png" alt="">Adicionar ADM</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-adms"><img src="./assets/img/profile-adm.png" alt="">Vizualizar ADM's</a>
                        <a class="adm-category flex-row-center" href="./login-adm.html"><img src="./assets/img/exit.png" alt="">Sair</a>
                    </nav>
                </section>

                <form class="flex-column-center-top width-100" action="./adm-update.php?id=<?php print $resUserInfo->id ?>&action=update" method="POST">
                    <h1>Editar dados de <?php print $resUserInfo->usu_name ?></h1>
                    <input class="default-input" type="text" name="name" id="name" maxlength="100" placeholder="Digite o nome">
                    <input class="default-input" type="text" name="nick" id="nick" maxlength="100" placeholder="Digite o nick">
                    <input class="default-input" type="text" name="number" id="number" maxlength="50" placeholder="Digite o número de celular">
                    <input class="default-input" type="text" name="profile_img" id="profile_img" maxlength="300" placeholder="Link para nova foto de perfil">
                    <input class="default-input" type="password" name="pass" id="pass" maxlength="100" placeholder="Nova senha">
                    <input class="default-input" type="password" name="confirm_pass" id="confirm_pass" maxlength="100" placeholder="Confirmar nova senha">
                    <input class="default-button" type="submit" value="Enviar">
                </form>
            </main>      
        
        <?php } else if($pageToShow == 'all-sugests') { ?>
            <main class="flex-row-left-top">
                <section style="width: 20%;" class="menu-aside">
                    <nav class="flex-column-left">                
                        <a style="padding: 20px 0;" class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=home"><img src="https://simpleicon.com/wp-content/uploads/dashboard.png" alt=""> Dashboard</a>
                        <p class="line"></p>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=noread"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Sugestões Não Lidas</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Adicionar Produtos</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Visualizar Produtos</a>
                        <a class="adm-category flex-row-center" href="./index.php"><img src="https://www.jacui.mg.leg.br/imagens/site.png/image_preview" alt="">Ver site principal</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-adm"><img src="./assets/img/profile-adm.png" alt="">Adicionar ADM</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-adms"><img src="./assets/img/profile-adm.png" alt="">Vizualizar ADM's</a>
                        <a class="adm-category flex-row-center" href="./login-adm.html"><img src="./assets/img/exit.png" alt="">Sair</a>
                    </nav>
                </section>

                <?php 
                    $sugestsSearch = "SELECT * FROM sugests";
                    $exeSearchSugests = $connect->query($sugestsSearch);
                ?>

                <section class="flex-column-center width-100">
                <h1>Visualizar Sugestões</h1>

                    <table style="margin: 30px" class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Sugestão</th>
                                <th scope="col">Situação</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                        while($loadSugests = $exeSearchSugests->fetch_object()) { 
                        
                        $situation = "";

                        if ($loadSugests->situation == 0) {
                            $situation = "Não Lida"; ?>
                            <tr>
                                <th scope="row"><?php print $loadSugests->id ?></th>
                                <td><?php print $loadSugests->user_name ?></td>
                                <td><?php print $loadSugests->user_sugest ?></td>
                                <td><?php print $situation ?></td>
                                <td><a class="btn btn-primary" href="./mark-read.php?id=<?php print base64_encode($adm_id) ?>&sug_id=<?php print $loadSugests->id ?>&local=all">Marcar como Lida</a></td>
                            </tr>
                        <?php } else {
                            $situation = "Lida"; ?>
                            <tr>
                                <th scope="row"><?php print $loadSugests->id ?></th>
                                <td><?php print $loadSugests->user_name ?></td>
                                <td><?php print $loadSugests->user_sugest ?></td>
                                <td><?php print $situation ?></td>
                                <td></td>
                            </tr>
                        <?php }} ?>
                        </tbody>
                    </table>
                </section>
            </main>

            <?php } else if($pageToShow == 'noread') { ?>
            <main class="flex-row-left-top">
                <section style="width: 20%;" class="menu-aside">
                    <nav class="flex-column-left">                
                        <a style="padding: 20px 0;" class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=home"><img src="https://simpleicon.com/wp-content/uploads/dashboard.png" alt=""> Dashboard</a>
                        <p class="line"></p>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=all-sugests"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Todas as Sugestões</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Adicionar Produtos</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Visualizar Produtos</a>
                        <a class="adm-category flex-row-center" href="./index.php"><img src="https://www.jacui.mg.leg.br/imagens/site.png/image_preview" alt="">Ver site principal</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-adm"><img src="./assets/img/profile-adm.png" alt="">Adicionar ADM</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-adms"><img src="./assets/img/profile-adm.png" alt="">Vizualizar ADM's</a>
                        <a class="adm-category flex-row-center" href="./login-adm.html"><img src="./assets/img/exit.png" alt="">Sair</a>
                    </nav>
                </section>

                <?php 
                    $sugestsSearch = "SELECT * FROM sugests WHERE situation=0";
                    $exeSearchSugests = $connect->query($sugestsSearch);
                ?>

                <section class="flex-column-center width-100">
                <h1>Visualizar Sugestões</h1>

                    <table style="margin: 30px" class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Sugestão</th>
                                <th scope="col">Situação</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                        while($loadSugests = $exeSearchSugests->fetch_object()) { 
                        
                        $situation = "";

                        if ($loadSugests->situation == 0) {
                            $situation = "Não Lida"; ?>
                            <tr>
                                <th scope="row"><?php print $loadSugests->id ?></th>
                                <td><?php print $loadSugests->user_name ?></td>
                                <td><?php print $loadSugests->user_sugest ?></td>
                                <td><?php print $situation ?></td>
                                <td><a class="btn btn-primary" href="./mark-read.php?id=<?php print base64_encode($adm_id) ?>&sug_id=<?php print $loadSugests->id ?>&local=nor">Marcar como Lida</a></td>
                            </tr>
                        <?php } else {
                            $situation = "Lida"; ?>
                            <tr>
                                <th scope="row"><?php print $loadSugests->id ?></th>
                                <td><?php print $loadSugests->user_name ?></td>
                                <td><?php print $loadSugests->user_sugest ?></td>
                                <td><?php print $situation ?></td>
                                <td></td>
                            </tr>
                        <?php }} ?>
                        </tbody>
                    </table>
                </section>
            </main>

        <?php } else if($pageToShow == 'add-products') { ?>
            <main class="flex-row-left-top">
                <section style="width: 20%;" class="menu-aside">
                    <nav class="flex-column-left">                
                        <a style="padding: 20px 0;" class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=home"><img src="https://simpleicon.com/wp-content/uploads/dashboard.png" alt=""> Dashboard</a>
                        <p class="line"></p>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=all-sugests"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Todas as Sugestões</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=noread"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Sugestões Não Lidas</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Visualizar Produtos</a>
                        <a class="adm-category flex-row-center" href="./index.php"><img src="https://www.jacui.mg.leg.br/imagens/site.png/image_preview" alt="">Ver site principal</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-adm"><img src="./assets/img/profile-adm.png" alt="">Adicionar ADM</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-adms"><img src="./assets/img/profile-adm.png" alt="">Vizualizar ADM's</a>
                        <a class="adm-category flex-row-center" href="./login-adm.html"><img src="./assets/img/exit.png" alt="">Sair</a>
                    </nav>
                </section>

                <form class="flex-column-center-top width-100" action="./add-product.php?id=<?php print base64_encode($adm_id) ?>&action=add" method="POST">
                    <h1>Adicionar Produto</h1>
                    <input class="default-input" type="text" name="name" id="name" maxlength="300" placeholder="Nome do produto" required>
                    <input class="default-input" type="text" name="url_img" id="url_img" maxlength="300" placeholder="URL imagem do produto" required>
                    <input class="default-input" type="text" name="price" id="price" placeholder="Digite o valor do produto" required>
                    <input class="default-input" type="text" name="parcel_price" id="parcel_price" placeholder="Valor parcela do produto" required>
                    <select class="default-input" name="brand" id="brand" required>
                        <option value="">Marca</option>
                        <option value="crafter">Crafter</option>
                        <option value="strinberg">Strinberg</option>
                        <option value="yamaha">Yamaha</option>
                        <option value="tagima">Tagima</option>
                        <option value="outra">Outras</option>
                    </select>
                    <select class="default-input" name="category" id="category" required>
                        <option value="">Categoria</option>
                        <option value="acustic_guitar">Violões</option>
                        <option value="guitar">Guitarras</option>
                        <option value="keyboard_instruments">Instrumentos de Teclas</option>
                        <option value="drums">Baterias</option>
                        <option value="accessories">Acessórios</option>
                    </select>
                    <textarea class="default-input" name="specs" id="specs" cols="30" rows="3" required placeholder="Especificações"></textarea>
                    <textarea class="default-input" name="desc" id="desc" cols="30" rows="3" required placeholder="Descrição"></textarea>
                    <input class="default-button" type="submit" value="Enviar">
                </form>
            </main>
        <?php } else if($pageToShow == 'add-adm') { ?>

            <main class="flex-row-left-top">
                <section style="width: 20%;" class="menu-aside">
                    <nav class="flex-column-left">                
                        <a style="padding: 20px 0;" class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=home"><img src="https://simpleicon.com/wp-content/uploads/dashboard.png" alt=""> Dashboard</a>
                        <p class="line"></p>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=all-sugests"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Todas as Sugestões</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=noread"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Sugestões Não Lidas</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Adicionar Produtos</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Visualizar Produtos</a>
                        <a class="adm-category flex-row-center" href="./index.php"><img src="https://www.jacui.mg.leg.br/imagens/site.png/image_preview" alt="">Ver site principal</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-adms"><img src="./assets/img/profile-adm.png" alt="">Vizualizar ADM's</a>
                        <a class="adm-category flex-row-center" href="./login-adm.html"><img src="./assets/img/exit.png" alt="">Sair</a>
                    </nav>
                </section>

                <form class="flex-column-center-top width-100" action="./adm-update.php?id=<?php print $resUserInfo->id ?>&action=add" method="POST">
                    <h1>Adicionar novo ADM</h1>
                    <input class="default-input" type="text" name="name" id="name" maxlength="100" placeholder="Digite o nome" required>
                    <input class="default-input" type="text" name="nick" id="nick" maxlength="100" placeholder="Digite o nick" required> 
                    <input class="default-input" type="text" name="number" id="number" maxlength="50" placeholder="Digite o número de celular">
                    <input class="default-input" type="text" name="profile_img" id="profile_img" maxlength="300" placeholder="URL da foto de perfil">
                    <input class="default-input" type="password" name="pass" id="pass" maxlength="100" placeholder="Nova senha" required>
                    <input class="default-input" type="password" name="confirm_pass" id="confirm_pass" maxlength="100" placeholder="Confirmar nova senha" required>
                    <input class="default-button" type="submit" value="Enviar">
                </form>
            </main>
        <?php } else if($pageToShow == 'view-adms') { ?>
            <main class="flex-row-left-top">
                <section style="width: 20%;" class="menu-aside">
                    <nav class="flex-column-left">                
                        <a style="padding: 20px 0;" class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=home"><img src="https://simpleicon.com/wp-content/uploads/dashboard.png" alt=""> Dashboard</a>
                        <p class="line"></p>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=all-sugests"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Todas as Sugestões</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=noread"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Sugestões Não Lidas</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Adicionar Produtos</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Visualizar Produtos</a>
                        <a class="adm-category flex-row-center" href="./index.php"><img src="https://www.jacui.mg.leg.br/imagens/site.png/image_preview" alt="">Ver site principal</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-adm"><img src="./assets/img/profile-adm.png" alt="">Adicionar ADM</a>
                        <a class="adm-category flex-row-center" href="./login-adm.html"><img src="./assets/img/exit.png" alt="">Sair</a>
                    </nav>
                </section>

                <?php 
                    $admSeachQuery = "SELECT * FROM adm_info WHERE first_adm=0";
                    $exeSearchAdmQuery = $connect->query($admSeachQuery);
                ?>

                <section class="flex-column-center width-100">
                <h1>Visualizar ADM's</h1>

                    <table style="margin: 30px" class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Nick</th>
                                <th scope="col">Número</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php while($loadAdmResults = $exeSearchAdmQuery->fetch_object()) { ?>
                            <tr>
                                <th scope="row"><?php print $loadAdmResults->id ?></th>
                                <td><img style="width:100px" src="<?php print $loadAdmResults->profile_img ?>" alt=""></td>
                                <td><?php print $loadAdmResults->usu_name ?></td>
                                <td><?php print $loadAdmResults->nick ?></td>
                                <td><?php print $loadAdmResults->cell_number ?></td>
                                <td><a class="btn btn-danger" href="./delet-adm.php?delid=<?php print $loadAdmResults->id ?>&id=<?php print $adm_id ?>&confirmation=null">Excluir</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </section>
            </main>
        <?php } else if($pageToShow == 'view-products') { ?>
            <main class="flex-row-left-top">
                <section style="width: 20%;" class="menu-aside">
                    <nav class="flex-column-left">                
                        <a style="padding: 20px 0;" class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=home"><img src="https://simpleicon.com/wp-content/uploads/dashboard.png" alt=""> Dashboard</a>
                        <p class="line"></p>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=all-sugests"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Todas as Sugestões</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=noread"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Sugestões Não Lidas</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Adicionar Produtos</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Visualizar Produtos</a>
                        <a class="adm-category flex-row-center" href="./index.php"><img src="https://www.jacui.mg.leg.br/imagens/site.png/image_preview" alt="">Ver site principal</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-adm"><img src="./assets/img/profile-adm.png" alt="">Adicionar ADM</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-adms"><img src="./assets/img/profile-adm.png" alt="">Vizualizar ADM's</a>
                        <a class="adm-category flex-row-center" href="./login-adm.html"><img src="./assets/img/exit.png" alt="">Sair</a>
                    </nav>
                </section>

                <?php 
                    $prodSearchQuery = "SELECT * FROM products";
                    $exeSearchProds = $connect->query($prodSearchQuery);
                ?>

                <section class="flex-column-center width-100">
                    <h1>Visualizar Produtos</h1>

                        <table style="margin: 30px" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Parcelas</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php while($loadProdResults = $exeSearchProds->fetch_object()) { ?>
                                <tr>
                                    <th scope="row"><?php print $loadProdResults->id ?></th>
                                    <td><img style="width:100px" src="<?php print $loadProdResults->img_url ?>" alt=""></td>
                                    <td><?php print $loadProdResults->prod_name ?></td>
                                    <td>R$ <?php print $loadProdResults->prod_price ?></td>
                                    <td>10x de R$ <?php print $loadProdResults->parcel_price ?></td>
                                    <td><?php print $loadProdResults->prod_category ?></td>
                                    <td><?php print $loadProdResults->brand ?></td>
                                    <td><a class="btn btn-danger" href="./add-product.php?id=<?php print base64_encode($adm_id) ?>&prod_id=<?php print $loadProdResults->id ?>&action=delete$confirm=false">Excluir</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                </section>
            </main>
        <?php } else if($pageToShow == 'home') { ?>
            <main class="flex-row-left-top">
            <section style="width: 20%;" class="menu-aside">
                <nav class="flex-column-left">                
                    <a style="padding: 20px 0;" class="adm-category flex-row-center" href=""><img src="https://simpleicon.com/wp-content/uploads/dashboard.png" alt="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=home"> Dashboard</a>
                    <p class="line"></p>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=all-sugests"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Todas as Sugestões</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=noread"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Sugestões Não Lidas</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Adicionar Produtos</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Visualizar Produtos</a>
                    <a class="adm-category flex-row-center" href="./index.php"><img src="https://www.jacui.mg.leg.br/imagens/site.png/image_preview" alt="">Ver site principal</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-adm"><img src="./assets/img/profile-adm.png" alt="">Adicionar ADM</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-adms"><img src="./assets/img/profile-adm.png" alt="">Vizualizar ADM's</a>
                    <a class="adm-category flex-row-center" href="./login-adm.html"><img src="./assets/img/exit.png" alt="">Sair</a>
                </nav>
            </section>

            <?php
                $searchProd = "SELECT * FROM products";
                $exeSearchProd = $connect->query($searchProd);
                $qntProds = $exeSearchProd->num_rows;

                $searchSugests = "SELECT * FROM sugests";
                $exeSearchSugests = $connect->query($searchSugests);
                $qntSugests = $exeSearchSugests->num_rows;

                $searchNoReadSugests = "SELECT * FROM sugests WHERE situation=0";
                $exeSearchNoReadSugests = $connect->query($searchNoReadSugests);
                $qntNoReadSugests = $exeSearchNoReadSugests->num_rows;

                $searchAdms = "SELECT * FROM adm_info";
                $exeSearchAdms = $connect->query($searchAdms);
                $qntAdms = $exeSearchAdms->num_rows;
            ?>
            
            <section class="content width-100">
                <h1 style="margin-left: 50px;">Dashboad</h1>
                <div class="cards flex-row-space-between">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Produtos Cadastrados</h5>
                            <p class="card-text">Quntidade total de produtos cadastrados no site</p>
                            <p class="card-text"><strong><?php print $qntProds ?></strong> Produtos</p>
                        </div>
                    </div>
        
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Sugestões Não Lidas</h5>
                            <p class="card-text">Quntidade total de sugestões não lidas no site</p>
                            <p class="card-text"><strong><?php print $qntNoReadSugests ?></strong> Sugestões</p>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Sugestões Recebidas</h5>
                            <p class="card-text">Quntidade total de sugestões recebidas no site</p>
                            <p class="card-text"><strong><?php print $qntSugests ?></strong> Sugestões</p>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">ADM's do Sistema</h5>
                            <p class="card-text">Quntidade total de ADM's cadastrados no sistema</p>
                            <p class="card-text"><strong><?php print $qntAdms ?></strong> ADM's</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php } ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>
<?php } else { ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./assets/img/little-logo.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/adm.css">
        <title>Dom of Music - ADM</title>
    </head>
    <body>
        <header class="flex-row-space-between space">
            <img src="./assets/img/big-logo.png" alt="">
            <a class="link-as-pic flex-row-space-between" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=profile">
                <p style="margin: 0 10px;" class="profile-name"><?php print $resUserInfo->usu_name; ?></p>
                <img class="profile-pic" src="<?php print $resUserInfo->profile_img ?>" alt="">
            </a>
        </header>    

        <?php if($pageToShow == 'profile') { ?>
            <main class="flex-row-left-top">
                <section style="width: 20%;" class="menu-aside">
                    <nav class="flex-column-left">                
                        <a style="padding: 20px 0;" class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=home"><img src="https://simpleicon.com/wp-content/uploads/dashboard.png" alt=""> Dashboard</a>
                        <p class="line"></p>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=all-sugests"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Todas as Sugestões</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=noread"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Sugestões Não Lidas</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Adicionar Produtos</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Visualizar Produtos</a>
                        <a class="adm-category flex-row-center" href="./index.php"><img src="https://www.jacui.mg.leg.br/imagens/site.png/image_preview" alt="">Ver site principal</a>
                        <a class="adm-category flex-row-center" href="./login-adm.html"><img src="./assets/img/exit.png" alt="">Sair</a>
                    </nav>
                </section>

                <form class="flex-column-center-top width-100" action="./adm-update.php?id=<?php print $resUserInfo->id ?>&action=update" method="POST">
                    <h1>Editar dados de <?php print $resUserInfo->usu_name ?></h1>
                    <input class="default-input" type="text" name="name" id="name" maxlength="100" placeholder="Digite o nome">
                    <input class="default-input" type="text" name="nick" id="nick" maxlength="100" placeholder="Digite o nick">
                    <input class="default-input" type="text" name="number" id="number" maxlength="50" placeholder="Digite o número de celular">
                    <input class="default-input" type="text" name="profile_img" id="profile_img" maxlength="300" placeholder="Link para nova foto de perfil">
                    <input class="default-input" type="password" name="pass" id="pass" maxlength="100" placeholder="Nova senha">
                    <input class="default-input" type="password" name="confirm_pass" id="confirm_pass" maxlength="100" placeholder="Confirmar nova senha">
                    <input class="default-button" type="submit" value="Enviar">
                </form>
            </main>

            <?php } else if($pageToShow == 'noread') { ?>
            <main class="flex-row-left-top">
                <section style="width: 20%;" class="menu-aside">
                    <nav class="flex-column-left">                
                        <a style="padding: 20px 0;" class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=home"><img src="https://simpleicon.com/wp-content/uploads/dashboard.png" alt=""> Dashboard</a>
                        <p class="line"></p>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=all-sugests"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Todas as Sugestões</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Adicionar Produtos</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Visualizar Produtos</a>
                        <a class="adm-category flex-row-center" href="./index.php"><img src="https://www.jacui.mg.leg.br/imagens/site.png/image_preview" alt="">Ver site principal</a>
                        <a class="adm-category flex-row-center" href="./login-adm.html"><img src="./assets/img/exit.png" alt="">Sair</a>
                    </nav>
                </section>

                <?php 
                    $sugestsSearch = "SELECT * FROM sugests WHERE situation=0";
                    $exeSearchSugests = $connect->query($sugestsSearch);
                ?>

                <section class="flex-column-center width-100">
                <h1>Visualizar Sugestões</h1>

                    <table style="margin: 30px" class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Sugestão</th>
                                <th scope="col">Situação</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                        while($loadSugests = $exeSearchSugests->fetch_object()) { 
                        
                        $situation = "";

                        if ($loadSugests->situation == 0) {
                            $situation = "Não Lida"; ?>
                            <tr>
                                <th scope="row"><?php print $loadSugests->id ?></th>
                                <td><?php print $loadSugests->user_name ?></td>
                                <td><?php print $loadSugests->user_sugest ?></td>
                                <td><?php print $situation ?></td>
                                <td><a class="btn btn-primary" href="./mark-read.php?id=<?php print base64_encode($adm_id) ?>&sug_id=<?php print $loadSugests->id ?>&local=nor">Marcar como Lida</a></td>
                            </tr>
                        <?php } else {
                            $situation = "Lida"; ?>
                            <tr>
                                <th scope="row"><?php print $loadSugests->id ?></th>
                                <td><?php print $loadSugests->user_name ?></td>
                                <td><?php print $loadSugests->user_sugest ?></td>
                                <td><?php print $situation ?></td>
                                <td></td>
                            </tr>
                        <?php }} ?>
                        </tbody>
                    </table>
                </section>
            </main>

            <?php } else if($pageToShow == 'all-sugests') { ?>
            <main class="flex-row-left-top">
                <section style="width: 20%;" class="menu-aside">
                    <nav class="flex-column-left">                
                        <a style="padding: 20px 0;" class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=home"><img src="https://simpleicon.com/wp-content/uploads/dashboard.png" alt=""> Dashboard</a>
                        <p class="line"></p>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=noread"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Sugestões Não Lidas</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Adicionar Produtos</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Visualizar Produtos</a>
                        <a class="adm-category flex-row-center" href="./index.php"><img src="https://www.jacui.mg.leg.br/imagens/site.png/image_preview" alt="">Ver site principal</a>
                        <a class="adm-category flex-row-center" href="./login-adm.html"><img src="./assets/img/exit.png" alt="">Sair</a>
                    </nav>
                </section>

                <?php 
                    $sugestsSearch = "SELECT * FROM sugests";
                    $exeSearchSugests = $connect->query($sugestsSearch);
                ?>

                <section class="flex-column-center width-100">
                <h1>Visualizar Sugestões</h1>

                    <table style="margin: 30px" class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Sugestão</th>
                                <th scope="col">Situação</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                        while($loadSugests = $exeSearchSugests->fetch_object()) { 
                        
                        $situation = "";

                        if ($loadSugests->situation == 0) {
                            $situation = "Não Lida"; ?>
                            <tr>
                                <th scope="row"><?php print $loadSugests->id ?></th>
                                <td><?php print $loadSugests->user_name ?></td>
                                <td><?php print $loadSugests->user_sugest ?></td>
                                <td><?php print $situation ?></td>
                                <td><a class="btn btn-primary" href="./mark-read.php?id=<?php print base64_encode($adm_id) ?>&sug_id=<?php print $loadSugests->id ?>&local=all">Marcar como Lida</a></td>
                            </tr>
                        <?php } else {
                            $situation = "Lida"; ?>
                            <tr>
                                <th scope="row"><?php print $loadSugests->id ?></th>
                                <td><?php print $loadSugests->user_name ?></td>
                                <td><?php print $loadSugests->user_sugest ?></td>
                                <td><?php print $situation ?></td>
                                <td></td>
                            </tr>
                        <?php }} ?>
                        </tbody>
                    </table>
                </section>
            </main>

            <?php } else if($pageToShow == 'view-products') { ?>
            <main class="flex-row-left-top">
                <section style="width: 20%;" class="menu-aside">
                    <nav class="flex-column-left">                
                        <a style="padding: 20px 0;" class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=home"><img src="https://simpleicon.com/wp-content/uploads/dashboard.png" alt=""> Dashboard</a>
                        <p class="line"></p>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=all-sugests"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Todas as Sugestões</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=noread"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Sugestões Não Lidas</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Adicionar Produtos</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Visualizar Produtos</a>
                        <a class="adm-category flex-row-center" href="./index.php"><img src="https://www.jacui.mg.leg.br/imagens/site.png/image_preview" alt="">Ver site principal</a>
                        <a class="adm-category flex-row-center" href="./login-adm.html"><img src="./assets/img/exit.png" alt="">Sair</a>
                    </nav>
                </section>

                <?php 
                    $prodSearchQuery = "SELECT * FROM products";
                    $exeSearchProds = $connect->query($prodSearchQuery);
                ?>

                <section class="flex-column-center width-100">
                    <h1>Visualizar Produtos</h1>

                        <table style="margin: 30px" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Parcelas</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php while($loadProdResults = $exeSearchProds->fetch_object()) { ?>
                                <tr>
                                    <th scope="row"><?php print $loadProdResults->id ?></th>
                                    <td><img style="width:100px" src="<?php print $loadProdResults->img_url ?>" alt=""></td>
                                    <td><?php print $loadProdResults->prod_name ?></td>
                                    <td>R$ <?php print $loadProdResults->prod_price ?></td>
                                    <td>10x de R$ <?php print $loadProdResults->parcel_price ?></td>
                                    <td><?php print $loadProdResults->prod_category ?></td>
                                    <td><?php print $loadProdResults->brand ?></td>
                                    <td><a class="btn btn-danger" href="./add-product.php?id=<?php print base64_encode($adm_id) ?>&prod_id=<?php print $loadProdResults->id ?>&action=delete$confirm=false">Excluir</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                </section>
            </main>
                 
            <?php } else if($pageToShow == 'add-products') { ?>

                <main class="flex-row-left-top">
                    <section style="width: 20%;" class="menu-aside">
                        <nav class="flex-column-left">                
                            <a style="padding: 20px 0;" class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=home"><img src="https://simpleicon.com/wp-content/uploads/dashboard.png" alt=""> Dashboard</a>
                            <p class="line"></p>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=all-sugests"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Todas as Sugestões</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=noread"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Sugestões Não Lidas</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Visualizar Produtos</a>
                            <a class="adm-category flex-row-center" href="./index.php"><img src="https://www.jacui.mg.leg.br/imagens/site.png/image_preview" alt="">Ver site principal</a>
                            <a class="adm-category flex-row-center" href="./login-adm.html"><img src="./assets/img/exit.png" alt="">Sair</a>
                        </nav>
                    </section>

                    <form class="flex-column-center-top width-100" action="./add-product.php?id=<?php print base64_encode($adm_id) ?>&action=add" method="POST">
                        <h1>Adicionar Produto</h1>
                        <input class="default-input" type="text" name="name" id="name" maxlength="300" placeholder="Nome do produto" required>
                        <input class="default-input" type="text" name="url_img" id="url_img" maxlength="300" placeholder="URL imagem do produto" required>
                        <input class="default-input" type="text" name="price" id="price" placeholder="Digite o valor do produto" required>
                        <input class="default-input" type="text" name="parcel_price" id="parcel_price" placeholder="Valor parcela do produto" required>
                        <select class="default-input" name="brand" id="brand" required>
                            <option value="">Marca</option>
                            <option value="crafter">Crafter</option>
                            <option value="strinberg">Strinberg</option>
                            <option value="yamaha">Yamaha</option>
                            <option value="tagima">Tagima</option>
                            <option value="outra">Outras</option>
                        </select>
                        <select class="default-input" name="category" id="category" required>
                            <option value="">Categoria</option>
                            <option value="acustic_guitar">Violões</option>
                            <option value="guitar">Guitarras</option>
                            <option value="keyboard_instruments">Instrumentos de Teclas</option>
                            <option value="drums">Baterias</option>
                            <option value="accessories">Acessórios</option>
                        </select>
                        <textarea class="default-input" name="specs" id="specs" cols="30" rows="3" required placeholder="Especificações"></textarea>
                        <textarea class="default-input" name="desc" id="desc" cols="30" rows="3" required placeholder="Descrição"></textarea>
                        <input class="default-button" type="submit" value="Enviar">
                    </form>
                </main>
        
        <?php } else if($pageToShow == 'home') { ?>
            <main class="flex-row-left-top">
            <section style="width: 20%;" class="menu-aside">
                <nav class="flex-column-left">                
                    <a style="padding: 20px 0;" class="adm-category flex-row-center" href=""><img src="https://simpleicon.com/wp-content/uploads/dashboard.png" alt="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=home"> Dashboard</a>
                    <p class="line"></p>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=all-sugests"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Todas as Sugestões</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=noread"><img src="https://static.vecteezy.com/system/resources/previews/009/394/762/non_2x/bell-icon-transparent-notification-free-png.png" alt="">Sugestões Não Lidas</a>
                        <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=add-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Adicionar Produtos</a>
                    <a class="adm-category flex-row-center" href="./adm-page.php?id=<?php print base64_encode($adm_id) ?>&page=view-products"><img src="https://cdn-icons-png.flaticon.com/512/7105/7105841.png" alt="">Visualizar Produtos</a>
                    <a class="adm-category flex-row-center" href="./index.php"><img src="https://www.jacui.mg.leg.br/imagens/site.png/image_preview" alt="">Ver site principal</a>
                        <a class="adm-category flex-row-center" href="./login-adm.html"><img src="./assets/img/exit.png" alt="">Sair</a>
                </nav>
            </section>
            
            <?php
                $searchProd = "SELECT * FROM products";
                $exeSearchProd = $connect->query($searchProd);
                $qntProds = $exeSearchProd->num_rows;

                $searchSugests = "SELECT * FROM sugests";
                $exeSearchSugests = $connect->query($searchSugests);
                $qntSugests = $exeSearchSugests->num_rows;

                $searchNoReadSugests = "SELECT * FROM sugests WHERE situation=0";
                $exeSearchNoReadSugests = $connect->query($searchNoReadSugests);
                $qntNoReadSugests = $exeSearchNoReadSugests->num_rows;

                $searchAdms = "SELECT * FROM adm_info";
                $exeSearchAdms = $connect->query($searchAdms);
                $qntAdms = $exeSearchAdms->num_rows;
            ?>
            
            <section class="content width-100">
                <h1 style="margin-left: 50px;">Dashboad</h1>
                <div class="cards flex-row-space-between">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Produtos Cadastrados</h5>
                            <p class="card-text">Quntidade total de produtos cadastrados no site</p>
                            <p class="card-text"><strong><?php print $qntProds ?></strong> Produtos</p>
                        </div>
                    </div>
        
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Sugestões Não Lidas</h5>
                            <p class="card-text">Quntidade total de sugestões não lidas no site</p>
                            <p class="card-text"><strong><?php print $qntNoReadSugests ?></strong> Sugestões</p>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Sugestões Recebidas</h5>
                            <p class="card-text">Quntidade total de sugestões recebidas no site</p>
                            <p class="card-text"><strong><?php print $qntSugests ?></strong> Sugestões</p>
                        </div>
                    </div>

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">ADM's do Sistema</h5>
                            <p class="card-text">Quntidade total de ADM's cadastrados no sistema</p>
                            <p class="card-text"><strong><?php print $qntAdms ?></strong> ADM's</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php } ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>
<?php } ?>