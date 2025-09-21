<?php
class PageLayout {

    // Renders the HTML <head> section
    public function renderHeader(array $config) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="Custom Bootstrap Template">
            <title><?= htmlspecialchars($config['site_name']); ?></title>
            <link rel="stylesheet" href="<?= $config['site_url']; ?>/css/bootstrap.min.css">
        </head>
        <body>
        <?php
    }

    // Renders the navigation bar
    public function renderNavbar(array $config) {
        $currentPage = basename($_SERVER['PHP_SELF']);
        ?>
        <header class="mb-4">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./"><?= htmlspecialchars($config['site_name']); ?></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarMenu">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link <?= $currentPage === 'index.php' ? 'active' : ''; ?>" href="./">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $currentPage === 'signup.php' ? 'active' : ''; ?>" href="signup.php">Sign Up</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $currentPage === 'signin.php' ? 'active' : ''; ?>" href="signin.php">Sign In</a>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <?php
    }

    // Renders the hero/banner section
    public function renderBanner(array $config) {
        ?>
        <section class="p-4 mb-4 bg-light rounded-3">
            <div class="container-fluid py-2">
                <h1 class="display-5 fw-bold">Welcome to <?= htmlspecialchars($config['site_name']); ?></h1>
                <p class="lead">This is a customizable Bootstrap template. Tweak it to fit your needs.</p>
                <a href="signup.php" class="btn btn-primary btn-lg">Get Started</a>
            </div>
        </section>
        <?php
    }

    // Example content area
    public function renderContent() {
        ?>
        <section class="row g-3">
            <div class="col-md-6">
                <div class="p-4 bg-dark text-white rounded">
                    <h2>Dark Theme Box</h2>
                    <p>Customize background colors and text utilities to build unique designs.</p>
                    <button class="btn btn-outline-light">Learn More</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 border rounded bg-body-tertiary">
                    <h2>Light Theme Box</h2>
                    <p>Add borders and spacing utilities for a clean, structured layout.</p>
                    <button class="btn btn-outline-secondary">Explore</button>
                </div>
            </div>
        </section>
        <?php
    }

    // Renders the sign-up/sign-in form container
    public function renderFormSection(array $config, $formHandler, $helperFunctions) {
        ?>
        <section class="row g-3">
            <div class="col-md-6">
                <div class="p-4 bg-dark text-white rounded">
                    <?php
                    $currentPage = basename($_SERVER['PHP_SELF']);
                    if ($currentPage === 'signup.php') {
                        $formHandler->signup($config, $helperFunctions);
                    } else {
                        $formHandler->signin($config, $helperFunctions);
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 border rounded bg-body-tertiary">
                    <h2>Extra Info</h2>
                    <p>This area can be used for tips, guidance, or promotional content.</p>
                    <button class="btn btn-outline-secondary">Read More</button>
                </div>
            </div>
        </section>
        <?php
    }

    // Renders the footer
    public function renderFooter(array $config) {
        ?>
        <footer class="pt-3 mt-4 border-top text-center text-muted">
            &copy; <?= date("Y") . " " . htmlspecialchars($config['site_name']); ?>
        </footer>

        <script src="<?= $config['site_url']; ?>/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>
        <?php
    }
}
