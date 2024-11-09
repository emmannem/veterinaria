<!-- resources/views/layouts/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f8f9fa; border-bottom: 2px solid #6c757d;">
    <div class="container">
        <a class="navbar-brand fw-bold text-success" href="{{ route('home') }}">
            <i class="fas fa-paw text-success"></i> PetCare
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="{{ route('mascotas.index') }}">
                        <i class="fas fa-dog"></i> Mascotas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="{{ route('servicios.index') }}">
                        <i class="fas fa-clinic-medical"></i> Servicios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="{{ route('citas.index') }}">
                        <i class="fas fa-calendar-alt"></i> Citas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="#">
                        <i class="fas fa-envelope"></i> Contacto
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>