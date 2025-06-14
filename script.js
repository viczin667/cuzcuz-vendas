document.addEventListener('DOMContentLoaded', function() {
    // --- JavaScript para Submenus no Sidebar ---
const submenuToggles = document.querySelectorAll('.submenu-toggle');

submenuToggles.forEach(toggle => {
    toggle.addEventListener('click', function(e) {
        e.preventDefault(); // Evita que o link # no HTML mude a URL

        const parentLi = this.closest('.has-submenu'); // Pega o <li> pai
        
        // Fecha qualquer outro submenu aberto, exceto o clicado
        document.querySelectorAll('.has-submenu.active').forEach(openSubmenu => {
            if (openSubmenu !== parentLi) {
                openSubmenu.classList.remove('active');
            }
        });

        // Alterna a classe 'active' no <li> pai
        parentLi.classList.toggle('active');
    });
});
    // --- JavaScript para o Menu Lateral (Sidebar) ---
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const closeSidebarBtn = document.getElementById('closeSidebar');
    const overlay = document.getElementById('overlay');
    const siteContent = document.getElementById('siteContent');

    function openSidebar() {
        sidebar.classList.add('active');
        overlay.classList.add('active');
        // A linha abaixo é opcional se você não quiser que o conteúdo principal se mova
        siteContent.classList.add('shifted');
    }

    function closeSidebar() {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
        // A linha abaixo é opcional se você não quiser que o conteúdo principal se mova
        siteContent.classList.remove('shifted');
    }

    // Adiciona os event listeners para o menu
    if (menuToggle) { // Verifica se o elemento existe antes de adicionar o listener
        menuToggle.addEventListener('click', openSidebar);
    }
    if (closeSidebarBtn) {
        closeSidebarBtn.addEventListener('click', closeSidebar);
    }
    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }

    // --- JavaScript para o Sistema de Estrelas ---
    const starsContainer = document.querySelector('.stars-rating');

    // Verifica se o container de estrelas existe na página atual
    if (starsContainer) {
        const stars = starsContainer.querySelectorAll('.fa-star');
        const ratingInput = document.getElementById('rating_value');

        let currentRating = 0; // Armazena a avaliação atual

        // Função para preencher as estrelas até um certo valor
        function fillStars(ratingValue) {
            stars.forEach((star, index) => {
                if (index < ratingValue) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            });
        }

        // Lógica de click (seleciona a avaliação)
        stars.forEach(star => {
            star.addEventListener('click', function() {
                const value = parseInt(this.dataset.value);
                currentRating = value; // Define a avaliação atual
                ratingInput.value = currentRating; // Atualiza o input hidden
                fillStars(currentRating); // Preenche as estrelas até a avaliação selecionada
            });
        });

        // Lógica de hover (efeito visual antes de clicar)
        starsContainer.addEventListener('mouseover', function(e) {
            if (e.target.classList.contains('fa-star')) {
                const hoverValue = parseInt(e.target.dataset.value);
                fillStars(hoverValue); // Preenche até a estrela sob o mouse
            }
        });

        // Lógica para quando o mouse sai do contêiner de estrelas
        starsContainer.addEventListener('mouseout', function() {
            fillStars(currentRating); // Volta para a avaliação selecionada
        });

        // Opcional: Inicializa as estrelas caso haja um valor predefinido (útil para edição)
        // Se o ratingInput já tiver um valor ao carregar a página, as estrelas serão preenchidas.
        // if (ratingInput.value && parseInt(ratingInput.value) > 0) {
        //     currentRating = parseInt(ratingInput.value);
        //     fillStars(currentRating);
        // }
    }
});