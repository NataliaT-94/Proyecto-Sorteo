<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo  pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : '' ?>" >
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">Inicio</span>
        </a>
        <a href="/admin/productos" class="dashboard__enlace <?php echo  pagina_actual('/productos') ? 'dashboard__enlace--actual' : '' ?>" >
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">Productos</span>
        </a>
        <a href="/admin/sorteos" class="dashboard__enlace <?php echo  pagina_actual('/sorteos') ? 'dashboard__enlace--actual' : '' ?>" >
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">Sorteos</span>
        </a>

        <a href="/admin/registrados" class="dashboard__enlace <?php echo  pagina_actual('/registrados') ? 'dashboard__enlace--actual' : '' ?>" >
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">Registrados</span>
        </a>
        <a href="/admin/balance" class="dashboard__enlace <?php echo  pagina_actual('/balance') ? 'dashboard__enlace--actual' : '' ?>" >
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">Balance</span>
        </a>
        
    </nav>
</aside>