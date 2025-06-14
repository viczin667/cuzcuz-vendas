<?php
require_once 'database.php'; // Inclui o arquivo de conexão com o banco de dados

// Recupera todos os produtos do banco de dados
$pdo = getDbConnection();
$products = $pdo->query("SELECT * FROM products ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuscuz Vendas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="menu-toggle" id="menuToggle">
        <i class="fas fa-bars"></i>
    </div>

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h3>Catálogo de Vendas</h3>
            <button class="close-btn" id="closeSidebar">&times;</button>
        </div>
        <ul class="sidebar-menu">
            <li class="has-submenu">
                <a href="#" class="submenu-toggle">
                    <i class="fas fa-crosshairs"></i> Contas de Free Fire
                    <i class="fas fa-chevron-down submenu-arrow"></i>
                </a>
                <ul class="submenu">
                    <li><a href="#contas-baixas"><i class="fas fa-tag"></i> A partir de R$10,00</a></li>
                    <li><a href="#contas-medias"><i class="fas fa-tags"></i> A partir de R$50,00</a></li>
                    <li><a href="#contas-altas"><i class="fas fa-dollar-sign"></i> A partir de R$150,00</a></li>
                    <li><a href="#contas-raras"><i class="fas fa-gem"></i> Contas Raras</a></li>
                </ul>
            </li>

            <li><a href="#produtos-digitais"><i class="fas fa-laptop-code"></i> Outros Produtos Digitais</a></li>
            <li><a href="#promocoes"><i class="fas fa-tags"></i> Promoções do Dia</a></li>
            <li><a href="#novidades"><i class="fas fa-gift"></i> Novidades</a></li>
            <li><a href="#suporte"><i class="fas fa-headset"></i> Suporte</a></li>
            </ul>
    </aside>

    <div class="overlay" id="overlay"></div>

    <div class="site-content" id="siteContent">
        <div class="container">
            <nav>
                <ul>
                    <li>
                        <a href="index.php">Sobre a Nossa Loja</a> </li>
                    <li>
                        <a href="referencs.html">Referências</a>
                    </li>           
                    <li>
                        <a href="avaliacoes.html">Avaliações</a>
                    </li>
                </ul>
            </nav>
            <header>
                <div class="center">
                    <img src="./img/cuscuz.png" alt="Logo Cuscuz Vendas">
                </div>
                <h1>Cuscuz Vendas</h1>
                <h2>Vendas de contas de Free fire e outros produtos digitais. </h2> 
            </header>
            <main>
                <section>
                    <h3>Sobre a Nossa Loja</h3>
                    <p>
                        Vendemos produtos digitais, fazemos design
                        e sempre estamos trazendo diversas inovações.
                    </p>
                </section>
                <section>
                    <h3>Reputação</h3>
                    <p>
                        Vendemos há mais de 2 anos,
                        buscamos a confiança de nossos clientes e
                        sempre o melhor atendimento possível.
                    </p>
                </section>

                <section class="products-display-section">
                    <h2>Nossos Produtos</h2>
                    <div class="products-grid">
                        <?php if (empty($products)): ?>
                            <p class="center">Nenhum produto disponível no momento.</p>
                        <?php else: ?>
                            <?php foreach ($products as $product): ?>
                                <div class="product-card">
                                    <?php if (!empty($product['image_url'])): ?>
                                        <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/150/000000/FFFFFF?text=Sem+Imagem" alt="Sem Imagem">
                                    <?php endif; ?>
                                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                                    <p class="product-description"><?php echo htmlspecialchars(substr($product['description'], 0, 100)) . (strlen($product['description']) > 100 ? '...' : ''); ?></p>
                                    <p class="product-price">R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></p>
                                    <button class="buy-button">Comprar</button>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </section>

                </main>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>